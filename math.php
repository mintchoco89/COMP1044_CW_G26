<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Categories</title>
	
	<style>
	.search-result {
		width: 35%;
		margin: auto;
		font-size: 110%;
		line-height: 40px;
	}
		
	#bookTable {
		width: 80%;
		margin: auto;
		padding: 0px;
		font-size: 110%;
	}
	
	#bookTable th {
		padding-bottom: 10px;
		text-decoration: underline;
	}
	
	#bookTable td {
		padding: 5px;
		line-height: 25px;
		text-align: center;
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
	
	<br><br>
	
	<h2 class="page-title-heading">Math</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>

	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	$sql = "SELECT * from `book` WHERE book.category_id = 3";
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		
		if($result->num_rows == 1) {
			echo "<div class='search-result' style='text-align: center'>";
			echo "1 result found.";
			echo "</div><br><br>";
		} else {
			echo "<div class='search-result' style='text-align: center'>";
			echo $result->num_rows." results found.";
			echo "</div><br><br>";
		}
		
		echo "<table id='bookTable'><tr><th>Book ID</th><th>Book Title</th><th>Author</th><th>Book Copies</th><th>Status</th></tr>";
		 
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["book_id"]."</td><td>".$row["book_title"]."</td><td>".$row["author"]."</td><td>".$row["book_copies"]."</td><td>".$row["status"]."</td></tr>";
		}
		echo "</table>";
		
	} else {
		echo "<div class='search-result' style='text-align: center'>";
		echo "No book in current category.";
		echo "</div>";
	}
		
	$conn->close();
	
	?>
	
	<br><br><br><br>
	<br><br><br><br>

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





