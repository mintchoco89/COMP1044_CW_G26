<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Return a Book</title>
	
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
	
	<h2 class="page-title-heading">Return Book</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php
	
	session_start();
	
	$conn = new mysqli("localhost","root","","library");
	
	if(isset($_POST['return'])) {
		
		$borrow_id = $_POST['return-book-borrow-id'];
		$date_return = $_POST['return-book-date'];
		
		$sql = "SELECT * FROM `borrow`, `borrowdetails` WHERE borrow.borrow_id = '".$borrow_id."' AND borrowdetails.borrow_id = '".$borrow_id."' AND borrowdetails.borrow_status = 'pending' AND borrow.member_id = '".$_SESSION['member_id']."'";
		$result = $conn->query($sql);

		if ($result->num_rows == 0) {
			echo "<div class='search-result'>";
			echo "Invalid borrow ID.";
			echo "</div>";
			
		} else {
			$row = $result->fetch_assoc();
			
			$book_id = $row['book_id'];
			
			$sql = "UPDATE `borrowdetails` SET borrow_status = 'returned', date_return = '$date_return' WHERE borrowdetails.borrow_id = '".$borrow_id."'";
			
			if ($conn->query($sql) != TRUE) {
				echo "Error: ".$sql."<br>".$conn->error;
			}
			
			$sql = "SELECT * FROM `book` WHERE book.book_id = '".$book_id."'";
			$result = $conn->query($sql);
			
			if ($result->num_rows == 0) {
				echo "Book not found.";
			} else {
				$row = $result->fetch_assoc();
				
				$sql = "UPDATE book SET book_copies = '".($row["book_copies"] + 1)."' WHERE book_id = '".$book_id."'";
				
				if($conn->query($sql) != TRUE) {
					echo "Error: ".$sql."<br>".$conn->error;
				} else {
					echo "<div class='search-result'>";
					echo "Book ".$row['book_title']." is returned.";
					echo "</div>";
				}
			}			
		}
		
		$conn->close();
	}
	
	?>
	
	<br><br><br><br><br><br><br><br>

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