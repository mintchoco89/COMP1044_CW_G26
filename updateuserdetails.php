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

	if(isset($_POST['update'])) {
		
		$username = $_POST['update-user-username'];
		$firstname = $_POST['update-user-first-name'];
		$lastname = $_POST['update-user-last-name'];
		$password = $_POST['update-user-password'];
		
		$sql = "SELECT * FROM `users` WHERE users.username = '".$username."'";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>Username already exists.<br>Update unsuccessful.<br>Redirecting to user profile in 3 seconds.</p>";
			header("Refresh: 3; url=profile.php");
			
		} else {
			$sql = "UPDATE users SET username = '$username', firstname = '$firstname', lastname = '$lastname', password = '$password' WHERE user_id = '".$_SESSION['user_id']."'";
		
			if($conn->query($sql) === TRUE) {
				echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>User details updated.</p>";
			} else {
				echo "Error: ".$sql."<br>".$conn->error;
			}
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