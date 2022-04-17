<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Add a New Member</title>
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
	
	<h2 class="page-title-heading">Add a New Member</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php 

	$conn = new mysqli("localhost","root","","library");

	if(isset($_POST['submit'])) {

		$firstname = $_POST['add-member-first-name'];
		$lastname = $_POST['add-member-last-name'];
		$username = $_POST['add-member-username'];
		$password = $_POST['add-member-password'];
		$gender = $_POST['add-member-gender'];
		$address = $_POST['add-member-address'];
		$contact = $_POST['add-member-contact'];
		$type_id = $_POST['add-member-type'];
		$year_level = $_POST['add-member-year-level'];
		$status = $_POST['add-member-status'];
		
		$sql = "SELECT * FROM `users` WHERE users.username = '".$username."'";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>Username already exists.<br>Member not added.</p>";	
			
		} else {
			$sql = "SELECT MAX(member_id) FROM member";
			$member_id = $conn->query($sql);
			$member_id = $member_id->fetch_array();
			$member_id = intval($member_id[0]);
			$member_id += 1;
			
			$sql = "SELECT MAX(user_id) FROM users";
			$user_id = $conn->query($sql);
			$user_id = $user_id->fetch_array();
			$user_id = intval($user_id[0]);
			$user_id += 1;
			
			switch($year_level) {
				case 1:
					$year_level = "First Year";
					break;
				case 2:
					$year_level = "Second Year";
					break;
				case 3:
					$year_level = "Third Year";
					break;
				case 4:
					$year_level = "Fourth Year";
					break;
				case 5:
					$year_level = "Faculty";
					break;
				case 6:
					$year_level = "Others";
					break;
			}
			
			$sql = "INSERT INTO member (member_id, firstname, lastname, gender, address, contact, type_id, year_level, status) VALUES ('$member_id','$firstname','$lastname','$gender','$address','$contact','$type_id','$year_level','$status')";
			$conn->query($sql);
			
			$sql = "INSERT INTO users (user_id, username, password, firstname, lastname) VALUES ('$user_id','$username','$password','$firstname','$lastname')";
			
			if($conn->query($sql) === TRUE) {
				echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>New member added to library.<br>User account created.</p>";
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