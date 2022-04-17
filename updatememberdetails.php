<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Update Member Details</title>
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
	
	<h2 class="page-title-heading">Update Member Details</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>
	
	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	if(isset($_POST['submit'])) {

		$firstname = $_POST['update-member-first-name'];
		$lastname = $_POST['update-member-last-name'];
		$gender = $_POST['update-member-gender'];
		$address = $_POST['update-member-address'];
		$contact = $_POST['update-member-contact'];
		$type_id = $_POST['update-member-type'];
		$year_level = $_POST['update-member-year-level'];
		$status = $_POST['update-member-status'];
		
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
		
		$sql = "UPDATE member SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', address = '$address', contact = '$contact', type_id = '$type_id', year_level = '$year_level', status = '$status' WHERE member_id = '".$_SESSION['member_id']."'";
		
		if($conn->query($sql) === TRUE) {
			echo "<p style='text-align: center; font-size: 150%; letter-spacing: 1px;'>Member details updated.</p>";
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