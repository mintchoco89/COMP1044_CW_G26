<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Update Book Details</title>
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
	
	<h2 class="page-title-heading">Update Book Details</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	$sql = "SELECT * FROM `book` WHERE book.book_id = '".$_SESSION['book_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();	
	
	?>
	
	<form class="forms" id="updatebook-form" action="http://localhost/updatebookdetails.php" method="post">
		<div class="left-side">
			<label for="update-book-title">Book Title: &ensp;</label>
				<input name="update-book-title" type="text" value="<?php echo $row['book_title']?>" required></input><br>
			<label for="update-book-category">Category: &ensp;</label>
				<select name="update-book-category" form="updatebook-form" required>
					<option value="1" <?php if($row['category_id'] == "1") echo 'selected="selected"';?>>Periodical</option>
					<option value="2" <?php if($row['category_id'] == "2") echo 'selected="selected"';?>>English</option>
					<option value="3" <?php if($row['category_id'] == "3") echo 'selected="selected"';?>>Math</option>
					<option value="4" <?php if($row['category_id'] == "4") echo 'selected="selected"';?>>Science</option>
					<option value="5" <?php if($row['category_id'] == "5") echo 'selected="selected"';?>>Encyclopedia</option>
					<option value="6" <?php if($row['category_id'] == "6") echo 'selected="selected"';?>>Filipiniana</option>
					<option value="7" <?php if($row['category_id'] == "7") echo 'selected="selected"';?>>Newspaper</option>
					<option value="8" <?php if($row['category_id'] == "8") echo 'selected="selected"';?>>General</option>
					<option value="9" <?php if($row['category_id'] == "9") echo 'selected="selected"';?>>References</option>
				</select><br>
			<label for="update-book-author">Author: &ensp;</label>
				<input name="update-book-author" type="text" value="<?php echo $row['author']?>" required></input><br>
			<label for="update-book-copies">Number of Copies: &ensp;</label>
				<input name="update-book-copies" type="number" value="<?php echo $row['book_copies']?>" required></input><br>
			<label for="update-book-publisher">Book Publisher: &ensp;</label>
				<input name="update-book-publisher" type="text" value="<?php echo $row['book_publisher']?>" required></input><br>
			<label for="update-book-publisher-city">Publisher City: &ensp;</label>
				<input name="update-book-publisher-city" type="text" value="<?php echo $row['publisher_city']?>" required></input><br>
		</div>
		<div class="right-side">
			<label for="update-book-isbn">ISBN: &ensp;</label>
				<input name="update-book-isbn" type="text" value="<?php echo $row['isbn']?>" required></input><br>
			<label for="update-book-copyright-year">Copyright Year: &ensp;</label>
				<input name="update-book-copyright-year" type="text" maxlength="4"value="<?php echo $row['copyright_year']?>" required></input><br>
			<label for="update-book-date-receive">Date Received: &ensp;</label>
				<input name="update-book-date-receive" type="date" value="<?php echo $row['date_receive']?>" required></input><br>
			<label for="update-book-date-added">Date Added: &ensp;</label>
				<input name="update-book-date-added" type="date" value="<?php echo $row['date_added']?>" required></input><br>
			<label for="update-book-status">Status: &ensp;</label>
				<select name="update-book-status" form="updatebook-form" required>
					<option value="New" <?php if($row['status'] == "New") echo 'selected="selected"';?>>New</option>
					<option value="Old" <?php if($row['status'] == "Old") echo 'selected="selected"';?>>Old</option>
					<option value="Damage" <?php if($row['status'] == "Damage") echo 'selected="selected"';?>>Damage</option>
					<option value="Lost" <?php if($row['status'] == "Lost") echo 'selected="selected"';?>>Lost</option>
					<option value="Archive" <?php if($row['status'] == "Archive") echo 'selected="selected"';?>>Archive</option>
				</select><br>
		</div>
		
		<button type="submit" form="updatebook-form" name="submit" onclick="checkCopies()">Submit</button>
	
	</form>
	
	<script>
	function checkCopies() {
		let copies = document.forms["updatebook-form"]["update-book-copies"].value;
		if (copies < 1) {
			alert("Number of copies cannot be less than 1.");
			document.forms["updatebook-form"]["update-book-copies"].value = "";
		}
	}
	</script>
	
	<?php
		$conn->close();
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