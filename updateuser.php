<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Update User Details</title>
</head>

<body>

	<nav>
		<ul>
			<li><a href="home.html">Home</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="categories.html">Categories</a></li>
			<li><a href="#contact-link">Contact Us</a></li>
			<li><a class="active" href="profile.php">My Profile</a></li>
			<li><a href="login.html">Log Out</a></li>
		</ul>
	</nav>
	
	<br><br>
	
	<h2 class="page-title-heading">Update User Details</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	$sql = "SELECT * FROM `users` WHERE users.user_id = '".$_SESSION['user_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();	
	
	?>
	
	<form class="forms" id="updateuser-form" action="http://localhost/updateuserdetails.php" method="post">
		<div class="left-side">
			<label for="update-user-first-name">First Name: &ensp;</label>
				<input name="update-user-first-name" type="text" value="<?php echo $row['firstname']?>" required></input><br>
			<label for="update-user-last-name">Last Name: &ensp;</label>
				<input name="update-user-last-name" type="text" value="<?php echo $row['lastname']?>" required></input><br>
			<label for="update-user-username">Username: &ensp;</label>
				<input name="update-user-username" type="text" value="<?php echo $row['username']?>" required></input><br>
			<label for="update-user-password">New Password: &ensp;</label>
				<input name="update-user-password" type="password" required></input><br>
			<label for="update-user-password-confirm">Confirm New Password: &ensp;</label>
				<input name="update-user-password-confirm" type="password" required></input><br>
		</div>
		
		<button type="submit" form="updateuser-form" name="update" onclick="checkPassword()">Update</button>
	
	</form>
	
	<script>
	function checkPassword() {
		let password1 = document.forms["updateuser-form"]["update-user-password"].value;
		let password2 = document.forms["updateuser-form"]["update-user-password-confirm"].value;
		
		if (password1 != password2) {
			alert("The password confirmation does not match.");
			document.forms["updateuser-form"]["update-user-password"].value = "";
			document.forms["updateuser-form"]["update-user-password-confirm"].value = "";
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