<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="form-template.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>G26 Library - Search Member by ID</title>
	
	<style>
	.search-result {
		width: 35%;
		margin: auto;
		font-size: 110%;
		line-height: 40px;
	}
	
	.update-member-button, .delete-member-button {
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
	
	.update-member-button:hover, .delete-member-button:hover {
		text-decoration: underline;
		border-style: ridge;
	}
	
	.update-member-button a, .delete-member-button a {
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
	
	<h2 class="page-title-heading">Search for a Member (by ID)</h2>
	<hr class="page-heading-horizontal-line">
	
	<br><br>

	<?php 
	
	session_start();

	$conn = new mysqli("localhost","root","","library");

	if(isset($_POST['submit'])) {
		
		$member_id = $_POST['search-member-id'];
		$_SESSION['member_id'] = $member_id;
		
		$sql = "SELECT * FROM `member`,`type` WHERE member.member_id = '".$member_id."' AND member.type_id = type.type_id";
		$result = $conn->query($sql);

		if($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				echo "<div class='search-result'>";
				echo "<b>Member ID:</b> &ensp;".$row["member_id"]."<br>";
				echo "<b>First Name:</b> &ensp;".$row["firstname"]."<br>";
				echo "<b>Last Name:</b> &ensp;".$row["lastname"]."<br>";
				echo "<b>Gender:</b> &ensp;".$row["gender"]."<br>";
				echo "<b>Address:</b> &ensp;".$row["address"]."<br>";
				echo "<b>Contact:</b> &ensp;".$row["contact"]."<br>";
				echo "<b>Type:</b> &ensp;".$row["borrowtype"]."<br>";
				echo "<b>Year Level:</b> &ensp;".$row["year_level"]."<br>";
				echo "<b>Status:</b> &ensp;".$row["status"]."<br>";
				echo "</div>";
				echo "<br><button class='update-member-button' name='update-member-button'><a href='updatemember.php'>Update Member Details</a></button><br><br><button class='delete-member-button' name='delete-member-button'><a href='deletememberid.php'>Delete This Member</a></button>";
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