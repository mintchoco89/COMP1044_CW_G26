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
	
	#search-result-table {
		width: 80%;
		margin: auto;
		font-size: 100%;
		line-height: 20px;
		table-layout: fixed;
		text-align: center;
	}
	
	#search-result-table td {
		padding: 10px;
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
	
	<h2 class="page-title-heading">Return a Book</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php
	
	session_start();
	
	$conn = new mysqli("localhost","root","","library");
	
	if(isset($_POST['returncheck'])) {
		
		$member_id = $_POST['return-book-member-id'];
		$_SESSION['member_id'] = $member_id;
		
		$sql = "SELECT * FROM `member` WHERE member.member_id = '".$member_id."'";
		$result = $conn->query($sql);
		
		if($result->num_rows == 0) {
				echo "<div class='search-result'>";
				echo "There is no member with id ".$member_id.".";
				echo "</div>";
				
		} else {
		
			$sql = "SELECT * FROM `borrow`, `book`, `borrowdetails` WHERE borrow.member_id = '".$member_id."' AND borrow.member_id = '".$member_id."' AND borrowdetails.borrow_id = borrow.borrow_id AND book.book_id = borrowdetails.book_id AND borrowdetails.borrow_status = 'pending'";
			
			$result = $conn->query($sql);
			
			if ($result->num_rows == 0) {
				echo "<div class='search-result'>";
				echo "No book borrowed by member with ID ".$member_id.".";
				echo "</div>";
				
			} else {
				echo "<table id='search-result-table'><tr><th>Borrow ID</th><th>Book Title</th><th>Date Borrowed</th><th>Due Date</th>";
				// output data of each row 
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["borrow_id"]."</td><td>".$row["book_title"]."</td><td>".$row["date_borrow"]."</td><td>".$row["due_date"]."</td></tr>";
				}
				echo "</table><br><br><br><br>";
				
	?>

		<form class="forms" id="returnbook-form" action="http://localhost/returnbook.php" method="post">
			<div class="left-side">
				<label for="return-book-borrow-id">Borrow ID: &ensp;</label>
					<input name="return-book-borrow-id" type="text" required></input><br>
			</div>
			<div class="right-side">
				<label for="return-book-date">Date Returned: &ensp;</label>
					<input name="return-book-date" type="date" required></input><br>
			</div>
			
			<button type="submit" form="returnbook-form" name="return">Return Book</button>
				
		</form>
	
	<?php			
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