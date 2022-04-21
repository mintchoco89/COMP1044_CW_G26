<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Delete Book by Title</title>
	
	<style>
	.search-result {
		width: 35%;
		margin: auto;
		font-size: 110%;
		line-height: 40px;
	}
	
	.update-book-button, .delete-book-button {
		margin-left: 32.5%;
		padding: 10px;
		width: 35%;
		background-color: white;
		cursor: pointer;
		border-style: 1px groove;
		border-color: #e6e5da;
		letter-spacing: 1px;
		text-transform: uppercase;
		font-size: 90%;
	}
	
	.update-book-button:hover, .delete-book-button:hover {
		text-decoration: underline;
		border-style: ridge;
	}
	
	.update-book-button a, .delete-book-button a {
		text-decoration: none;
		color: black;
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
	
	<h2 class="page-title-heading">Search for a Book (by Title)</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>

	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	if(isset($_POST['submit'])) {
		
		$book_title = $_POST['search-book-title'];
		
		$sql = "SELECT * FROM `book`,`category` WHERE book.book_title = '".$book_title."' AND book.category_id = category.category_id";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
 
			while($row = $result->fetch_assoc()) {
				
				$_SESSION['book_id'] = $row["book_id"];
				
				echo "<div class='search-result'>";
				echo "<b>Book ID:</b> &ensp;".$row["book_id"]."<br>";
				echo "<b>Book Title:</b> &ensp;".$row["book_title"]."<br>";
				echo "<b>Category:</b> &ensp;".$row["classname"]."<br>";
				echo "<b>Author:</b> &ensp;".$row["author"]."<br>";
				echo "<b>Book Copies:</b> &ensp;".$row["book_copies"]."<br>";
				echo "<b>Book Publisher:</b> &ensp;".$row["book_publisher"]."<br>";
				echo "<b>Publisher City:</b> &ensp;".$row["publisher_city"]."<br>";
				echo "<b>ISBN:</b> &ensp;".$row["isbn"]."<br>";
				echo "<b>Copyright Year:</b> &ensp;".$row["copyright_year"]."<br>";
				echo "<b>Date Receive:</b> &ensp;".$row["date_receive"]."<br>";
				echo "<b>Date Added:</b> &ensp;".$row["date_added"]."<br>";
				echo "<b>Status:</b> &ensp;".$row["status"]."<br>";
				echo "</div>";
				echo "<br><button class='update-book-button' name='update-book-button'><a href='updatebook.php'>Update Book Details</a></button><br><br><button class='delete-book-button' name='delete-book-button'><a href='deletebookid.php'>Delete This Book</a></button>";
			}
		} else {
			echo "<div class='search-result' style='text-align: center'>";
			echo "0 results";
			echo "</div>";
		}
		
		$conn->close();
	}
	
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