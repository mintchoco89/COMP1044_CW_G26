<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Add a New Book</title>
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
	
	<h2 class="page-title-heading">Add a New Book</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>

	<?php 

	$conn = new mysqli("localhost","root","","library");

	if(isset($_POST['submit'])) {
		
		$book_title = $_POST['add-book-title'];
		$category_id = $_POST['add-book-category'];
		$author = $_POST['add-book-author'];
		$book_copies = $_POST['add-book-copies'];
		$book_publisher = $_POST['add-book-publisher'];
		$publisher_city = $_POST['add-book-publisher-city'];
		$isbn = $_POST['add-book-isbn'];
		$copyright_year = $_POST['add-book-copyright-year'];
		$date_receive = $_POST['add-book-date-receive'];
		$date_added = $_POST['add-book-date-added'];
		$status = $_POST['add-book-status'];
		
		$sql = "SELECT MAX(book_id) FROM book";
		$book_id = $conn->query($sql);
		$book_id = $book_id->fetch_array();
		$book_id = intval($book_id[0]);
		$book_id += 1;
		
		$sql = "INSERT INTO book (book_id, book_title, category_id, author, book_copies, book_publisher, publisher_city, isbn, copyright_year, date_receive, date_added, status) VALUES ('$book_id','$book_title','$category_id','$author','$book_copies','$book_publisher','$publisher_city','$isbn','$copyright_year','$date_receive','$date_added','$status')";
		
		if($conn->query($sql) === TRUE) {
			echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>New book added to library.</p>";
		} else {
			echo "Error: ".$sql."<br>".$conn->error;
		}
		
		$conn->close();
	}

	?>

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