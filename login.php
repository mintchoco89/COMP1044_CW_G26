<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Login</title>
	
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
			<li><a class="active" href="login.html">Log In</a></li>
			<li><a>About Us</a></li>
			<li><a>Categories</a></li>
			<li><a href="#contact-link">Contact Us</a></li>
		</ul>
	</nav>
	
	<?php
	
	session_start();
	
	$conn = new mysqli("localhost","root","","library");
	
	if(isset($_POST['login'])) {
		
		$username = $_POST['login-username'];
		$password = $_POST['login-password'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		
		$sql = "SELECT * FROM `users` WHERE users.username = '".$_SESSION['username']."' AND users.password = '".$_SESSION['password']."'";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			
			$row = $result->fetch_assoc();
			
			$_SESSION['user-firstname'] = $row["firstname"];
			$_SESSION['user_id'] = $row['user_id'];
			
			echo "<br><h2 class='website-title-heading'>Welcome, ".$row["firstname"]."</h2><hr class='heading-horizontal-line'><br><br>";
			echo "<div class='search-result' style='text-align: center; font-size: 120%;'>";
			echo "You will be redirected to the home page in 3 seconds.";
			echo "</div>";
			
			header("Refresh: 3; url=home.html");
			
		} else {
			echo "<br><h2 class='website-title-heading'>LOGIN ERROR</h2><hr class='heading-horizontal-line'><br><br>";
			echo "<div class='search-result'>";
			echo "Incorrect username or password.<br>Please try again.";
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
			<td><i class="fa fa-whatsapp"></i>+6012-345 6789<br><i class="fa fa-google"></i>g26_library@gmail.com<br><i class="fa fa-facebook"></i> g26_library<br><i class="fa fa-instagram"></i>g26_library<br><i class="fa fa-twitter"></i>g26_library</td>
		</tr>
	</table>
	<p>&copy; 2022 COMP1044 Coursework 2 Group 26</p>
	</footer>

</body>

</html>