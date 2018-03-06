<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Managment System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
 <div id="left">
    <label>CUSTOMER COMPLAINT PORTAL</label>
    </div>
    <div id="right">
     <div id="content">
         hi' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
</body>
</html>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Complaint Managment System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<a href="complaint-updates.php" class="coms">Check Complaint Status</a>
<div class="logo"></div>
<div class="form-style-5">
	<form method="post" action="form_process.php">
		<fieldset>
			<legend><span class="number">1</span> Customer Info</legend>
			<input type="text" name="name" placeholder="Your Name"/>
			<input type="email" name="email" placeholder="Your Email"/>
			<input type="number" min="1000000000" max="9999999999" name="phone" placeholder="Your Mobile Number Without Country Code"/>
			<!--<textarea name="field3" placeholder="About yourself"></textarea>-->
			<label for="job">Department:</label>
			<select id="job" name="depart">
				<optgroup label="Technical">
					<option value="Domain">Domain</option>
					<option value="Hosting">Hosting</option>
					<option value="SSL Certificate">SSL Certificate</option>
					<option value="VPS">VPS</option>
				</optgroup>
				<optgroup label="General">
					<option value="Account Info">Account Info</option>
					<option value="Renewal">Renewal</option>
					<option value="Others">Others</option>
				</optgroup>
			</select>      
		</fieldset>
		<fieldset>
			<legend><span class="number">2</span> Description</legend>
			<textarea name="desc" placeholder="Description"></textarea>
		</fieldset>
		<input type="submit" name="submit" value="Submit" />
	</form>
</div>
</body>
</html>
