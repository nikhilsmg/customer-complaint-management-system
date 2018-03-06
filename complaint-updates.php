<?php
error_reporting(E_ERROR);
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
<title>Complaint Status</title>
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




<?php include_once ("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Complaint Status</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
	<div class="form-style-5">
	<form method="post">
		<fieldset>
			<legend><span class="number">1</span> Your Complaint Security Code</legend>
			<input type="text" name="security" placeholder="Your Security Code, ex: co01kYu95fCb2"/>
		</fieldset>
		<input type="submit" name="submit" value="Check Status" />
	</form>
	<br/>
	<?php
		if(isset($_POST["submit"])){
			$code = $_POST["security"];
			$select = "SELECT * FROM form_details WHERE complaint_pass = '{$code}' ";
			$query = mysqli_query($connection,$select);
			if(!$query){
				die(mysqli_error($connection));
			}
			while($results = mysqli_fetch_assoc($query)){
				$name = $results["name"];
				$email = $results["email"];
				$phone = $results["phone"];
				$depart = $results["depart"];
				$descrip = $results["descrip"];
				$update = $results["update"];
				$status = $results["status"];
				?>
				<div class="updates">
					<span><big>Status: </big><small><?php echo $status?></small></span><br/>
					<span><big>Your Name: </big><small><?php echo $name?></small></span><br/>
					<span><big>Your Email: </big><small><?php echo $email?></small></span><br/>
					<span><big>Your phone: </big><small><?php echo $phone?></small></span><br/>
					<span><big>Complaint Department: </big><small><?php echo $depart?></small></span><br/>
					<span><big>Description: </big><br/><small><?php echo $descrip?></small></span><br/><br/>
					<div class="au"><span><big>Update From Team:</big></span><br/><br/><small><?php echo $update?><small></div>
				</div>
				<?php
			}
		}
	?>
	</div>
</body>
</html>