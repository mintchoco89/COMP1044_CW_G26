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

	$sql = "SELECT * FROM `member` WHERE member.member_id = '".$_SESSION['member_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();	
	
	?>
	
	<form class="forms" id="updatemember-form" action="http://localhost/updatememberdetails.php" method="post">
		<div class="left-side">
			<label for="update-member-first-name">First Name: &ensp;</label>
				<input name="update-member-first-name" type="text" value="<?php echo $row['firstname']?>" required></input><br>
			<label for="update-member-last-name">Last Name: &ensp;</label>
				<input name="update-member-last-name" type="text" value="<?php echo $row['lastname']?>" required></input><br>
			<label for="update-member-gender">Gender: &ensp;</label>
				<select name="update-member-gender" form="updatemember-form" required>
					<option value="Male" <?php if($row['gender'] == "Male") echo 'selected="selected"';?>>Male</option>
					<option value="Female" <?php if($row['gender'] == "Female") echo 'selected="selected"';?>>Female</option>
					<option value="Other" <?php if($row['gender'] == "Other") echo 'selected="selected"';?>>Other</option>
				</select><br>
			<label for="update-member-year-level">Year Level: &ensp;</label>
				<select name="update-member-year-level" form="updatemember-form" required>
					<option value="1" <?php if($row['year_level'] == "First Year") echo 'selected="selected"';?>>First Year</option>
					<option value="2" <?php if($row['year_level'] == "Second Year") echo 'selected="selected"';?>>Second Year</option>
					<option value="3" <?php if($row['year_level'] == "Third Year") echo 'selected="selected"';?>>Third Year</option>
					<option value="4" <?php if($row['year_level'] == "Fourth Year") echo 'selected="selected"';?>>Fourth Year</option>
					<option value="5" <?php if($row['year_level'] == "Faculty") echo 'selected="selected"';?>>Faculty</option>
					<option value="6" <?php if($row['year_level'] == "Others") echo 'selected="selected"';?>>Others</option>
				</select><br>
		</div>
		<div class="right-side">
			<label for="update-member-address">Address: &ensp;</label>
				<input name="update-member-address" type="text" value="<?php echo $row['address']?>" required></input><br>
			<label for="update-member-contact">Contact Number: &ensp;</label>
				<input name="update-member-contact" type="text" value="<?php echo $row['contact']?>" required></input><br>
			<label for="update-member-type">Type: &ensp;</label>
				<select name="update-member-type" form="updatemember-form" required>
					<option value="19" <?php if($row['type_id'] == "19") echo 'selected="selected"';?>>Teacher</option>
					<option value="20" <?php if($row['type_id'] == "20") echo 'selected="selected"';?>>Employee</option>
					<option value="21" <?php if($row['type_id'] == "21") echo 'selected="selected"';?>>Non-Teaching</option>
					<option value="22" <?php if($row['type_id'] == "22") echo 'selected="selected"';?>>Student</option>
					<option value="23" <?php if($row['type_id'] == "23") echo 'selected="selected"';?>>Construction</option>
				</select><br>
			<label for="update-member-status">Status: &ensp;</label>
				<select name="update-member-status" form="updatemember-form" required>
					<option value="Active" <?php if($row['status'] == "Active") echo 'selected="selected"';?>>Active</option>
					<option value="Banned" <?php if($row['status'] == "Banned") echo 'selected="selected"';?>>Banned</option>
				</select><br>
		</div>
		
		<button type="submit" form="updatemember-form" name="submit" onclick="allNum()">Submit</button>
	
	</form>
	
	<script>
	function allNum() {
		var numbers = /^[0-9]+$/;
		let contact = document.forms["updatemember-form"]["update-member-contact"].value;
		
		if(/^[0-9]+$/.test(contact))
		{
			return true;
		} else {
			alert("Please fill in Contact Number with digits only.");
			document.forms["updatemember-form"]["update-member-contact"].value = "";
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