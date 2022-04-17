<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Borrow a Book</title>
	
	<style>
	.search-result {
		width: 35%;
		margin: auto;
		text-align: center;
		font-size: 120%;
		line-height: 40px;
	}
	</style>
</head>

<body>

	<nav>
		<ul>
			<li><a href="home.html">Home</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="categories.html">Categories</a></li>
			<li><a href="#contact-link">Contact Us</a></li>
			<li><a href="profile.php">My Profile</a></li>
			<li><a href="login.html">Log Out</a></li>
		</ul>
	</nav>
	
	<br></br>
	
	<h2 class="page-title-heading">Borrow Book</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php
	
	session_start();
	
	$conn = new mysqli("localhost","root","","library");
	
	if(isset($_POST['borrow'])) {
		
		$member_id = $_POST['borrow-book-member-id'];
		$book_id = $_POST['borrow-book-id'];
		$date_borrow = $_POST['borrow-book-date'];
		
		$sql = "SELECT * FROM `book` WHERE book.book_id = '".$book_id."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		if ($result->num_rows == 0) {
			echo "<div class='search-result'>";
			echo "Book not found in library.";
			echo "</div>";
			
		} else if($row["book_copies"] == 0) {
			echo "<div class='search-result'>";
			echo "There are no more copies of '".$row["book_title"]."' left.";
			echo "</div>";

		} else {
			
			$book_title = $row["book_title"];
			
			$sql = "SELECT * FROM `member` WHERE member.member_id = '".$member_id."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		
			if($result->num_rows == 0) {
				echo "<div class='search-result'>";
				echo "There is no member with ID ".$member_id.".";
				echo "</div>";
				
			} else if ($row["status"] == "Banned") {
				echo "<div class='search-result'>";
				echo "Member with ID ".$member_id." has been banned from borrowing books.<br>Please contact us to reactivate the member's account.";
				echo "</div>";
				
			} else {
				//update borrow_details & borrow tables
				$sql = "SELECT MAX(borrow_id) FROM borrow";
				$borrow_id = $conn->query($sql);
				$borrow_id = $borrow_id->fetch_array();
				$borrow_id = intval($borrow_id[0]);
				$borrow_id += 1;
				
				$sql = "SELECT DATE_ADD('$date_borrow', INTERVAL 14 DAY)";
				$due_date = $conn->query($sql);
				$due_date = $due_date->fetch_array();
				$due_date = $due_date[0];
				
				$sql = "INSERT INTO borrow (borrow_id, member_id, date_borrow, due_date) VALUES ('$borrow_id', '$member_id', '$date_borrow', '$due_date')";
			
				if($conn->query($sql) != TRUE) {
					echo "Error: ".$sql."<br>".$conn->error;
				}

				$sql = "SELECT MAX(borrow_details_id) FROM borrowdetails";
				$borrow_details_id = $conn->query($sql);
				$borrow_details_id = $borrow_details_id->fetch_array();
				$borrow_details_id = intval($borrow_details_id[0]);
				$borrow_details_id += 1;
				
				$sql = "SELECT * FROM `book` WHERE book.book_id = '".$book_id."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				
				$borrow_status = "pending";
				
				$sql = "INSERT INTO borrowdetails (borrow_details_id, book_id, borrow_id, borrow_status) VALUES ('$borrow_details_id', '$book_id', '$borrow_id', '$borrow_status')";
			
				if($conn->query($sql) != TRUE) {
					echo "Error: ".$sql."<br>".$conn->error;
				}
				
				echo "<div class='search-result'>";
				echo "You have borrowed a copy of ".$book_title;
				echo "</div>";
				
				$sql = "UPDATE book SET book_copies = '".($row["book_copies"] - 1)."' WHERE book_id = '".$book_id."'";
			
				if($conn->query($sql) != TRUE) {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			} 			
		}
		
		$conn->close();
	}
	
	?>
	
	<br><br><br><br><br><br><br><br><br><br>

	<footer id="contact-link">
	<table class="footerTable">
		<tr>
			<th>Address</th>
			<th>Contact Us</th>
		</tr>
		<tr>
			<td>University of Nottingham Malaysia<br>Jalan Broga<br>43500 Semenyih<br>Selangor Darul Ehsan<br>Malaysia<br><br></td>
			<td><i class="fa fa-whatsapp"></i>+6012-345 6789<br><i class="fa fa-google"></i>g26library@gmail.com<br><i class="fa fa-facebook"></i> G26 Library<br><i class="fa fa-instagram"></i>g26_library<br><i class="fa fa-twitter"></i>g26_library</td>
		</tr>
	</table>
	<p>&copy; 2022 COMP1044 Coursework 2 Group 26</p>
	</footer>

</body>

</html>