<?php include_once("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Admin Panel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="styless.css" />
	<style>
	table {
    border-collapse: collapse;
    width: 100%;
	}

	th, td {
    text-align: left;
    padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
    background-color: #4CAF50;
    color: white;
	}
</style>
</head>

<body>
<div class="content">

	<?php
		ini_set('display_errors', 0);
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 
		if(isset($_SESSION["admin"])){
		?>
		<a href="admin.php?logout=1">Logout</a>
		<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Department</th>
			<th>Description</th>
			<th>Complaint No.</th>
			<th>Update</th>
			<th>Status</th>
			<th>Delete</th>
		</tr>
			<?php
			$select = "SELECT * FROM form_details ORDER BY id ASC ";
			$query = mysqli_query($connection,$select);
			while($results = mysqli_fetch_assoc($query)){
				$id = $results["id"];
				$name = $results["name"];
				$email = $results["email"];
				$phone = $results["phone"];
				$depart = $results["depart"];
				$descrip = $results["descrip"];
				$complaint_pass = $results["complaint_pass"];
				$update = $results["update"];
				$status = $results["status"];
				if($status == "unresolved"){
					$change_s = "resolved";
				}else{
					$change_s = "unresolved";
				}
				$del = "Delete";
			?>
			<tr>
				<td><?php echo $id;?></td>
				<td><?php echo $name;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $phone;?></td>
				<td><?php echo $depart;?></td>
				<td><?php echo $descrip;?></td>
				<td><?php echo $complaint_pass;?></td>
				<td><?php echo $update;?></td>
				<td><a href="admin.php?status=<?php echo $change_s;?>&id=<?php echo $id;?>"><?php echo $status;?></a></td>
				<td><a href="admin.php?del=<?php echo 1;?>&id=<?php echo $id;?>"><?php echo $del;?></a></td>
			</tr>
<?php
			}
			?>
		</table>
		<br/>
		<form method="post">
		<ul class="form-style-1">
		 <li>
        <select name="cp" class="field-select">
		<?php
			$select = "SELECT * FROM form_details ORDER BY id ASC ";
			$query = mysqli_query($connection,$select);
			while($results = mysqli_fetch_assoc($query)){
				$complaint_pass = $results["complaint_pass"];
		?>
			<option value="<?php echo $complaint_pass;?>">Update Complaint No: <?php echo $complaint_pass; ?> </option>
			<?php } ?>
		</select>
		</li>
		<li>
        <textarea name="update" id="field5" class="field-long field-textarea"></textarea>
		</li>
			<li>
        <input type="submit" value="Submit" name="upda"/>
		</li>
		</ul>
		</form>
		<?php
			if(isset($_POST["upda"]) && !empty($_POST["update"])){
				$cp = $_POST["cp"];
				echo $cp;
				$update_s = "UPDATE form_details SET `update` = '{$_POST["update"]}' WHERE complaint_pass = '{$cp}' ";
				$update_q = mysqli_query($connection,$update_s);
				header("Location: admin.php");
			}
			if($_GET["status"] && $_GET["id"]){
				$news = $_GET["status"];
				$nid = $_GET["id"];
				$statu = "UPDATE form_details SET status = '{$news}' WHERE id = '{$nid}' ";
				$status_query = mysqli_query($connection,$statu);
				header("Location: admin.php");
			}
			if($_GET["del"] && $_GET["id"]){
				$nid = $_GET["id"];
				$statu = "DELETE from form_details WHERE id = '{$nid}' ";
				$status_query = mysqli_query($connection,$statu);
				header("Location: admin.php");
			}
			if($_GET["logout"]==1){
				session_destroy();
				header("Location: main.html");
			}
		?>
<?php
		}else{
			?>
			<div class="bubble0" align="center">
			<br><br><br><br><br><br><br><br>
			<h1>ADMIN LOGIN</h1>
			<br>
			<form method="post">
				<input type="password" name="pass"/>
				&nbsp;&nbsp;&nbsp;
				<input type="submit" name="submit" value="Login to Admin"/>
				<br><br>
			</form>
<?php
			if(isset($_POST["submit"])){
				$pass = $_POST["pass"];
				$pass = mysqli_real_escape_string($connection,$pass);
				echo $pass;
				if($pass == "1234"){
					$_SESSION["admin"] = 'admin';
					header("Location: admin.php");
				}else{
					echo "Password Mismatch";
				}
			}else{
				echo "All Fields Required!";
			}
		}
	?>
</div>
</body>
</html>
