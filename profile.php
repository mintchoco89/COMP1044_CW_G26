<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library</title>
	
	<style>
	.display-profile {
		width: 35%;
		margin: auto;
		font-size: 110%;
		line-height: 40px;
	}
	
	.update-user-button {
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
	
	.update-user-button:hover {
		text-decoration: underline;
		border-style: ridge;
	}
	
	.update-user-button a {
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
			<li><a class="active" href="profile.php">My Profile</a></li>
			<li><a href="login.html">Log Out</a></li>
		</ul>
	</nav>
	
	<br>
	<h2 class="page-title-heading">MY PROFILE</h2>
	<hr class="page-heading-horizontal-line"><br>
	<br>
	
	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");
		
	$sql = "SELECT * FROM `users` WHERE users.user_id = '".$_SESSION['user_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	echo "<div class='display-profile'>";
	echo "<b>User ID:</b> &ensp;".$row["user_id"]."<br>";
	echo "<b>Username:</b> &ensp;".$row["username"]."<br>";
	echo "<b>First Name:</b> &ensp;".$row["firstname"]."<br>";
	echo "<b>Last Name:</b> &ensp;".$row["lastname"]."<br>";
	echo "</div>";
	echo "<br><button class='update-user-button' name='update-user-button'><a href='updateuser.php'>Update User Details</a></button>";

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
			<td><i class="fa fa-whatsapp"></i>+6012-345 6789<br><i class="fa fa-google"></i>g26_library@gmail.com<br><i class="fa fa-facebook"></i> g26_library<br><i class="fa fa-instagram"></i>g26_library<br><i class="fa fa-twitter"></i>g26_library</td>
		</tr>
	</table>
	<p>&copy; 2022 COMP1044 Coursework 2 Group 26</p>
	</footer>

</body>

</html>