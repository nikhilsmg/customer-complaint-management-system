<?php
	//connect to database please change "localhost" "root" "" "form_save" with your
	//mysql server, user name, password, database name.
	include_once ("connection.php");
	//checking if submit button is clicked
	if(isset($_POST["submit"])){
		if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["depart"]) && !empty($_POST["desc"])){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$depart = $_POST["depart"];
			$desc = $_POST["desc"];
			$name = mysqli_real_escape_string($connection,$name);
			$email = mysqli_real_escape_string($connection,$email);
			$phone = mysqli_real_escape_string($connection,$phone);
			$depart = mysqli_real_escape_string($connection,$depart);
			$desc = mysqli_real_escape_string($connection,$desc);
			$add_result = "INSERT INTO `form_details` (`name`, `email`, `phone`, `depart`, `descrip`) VALUES ('{$name}', '{$email}', '{$phone}', '{$depart}', '{$desc}') ";
			$add_query = mysqli_query($connection,$add_result);
			if(!$add_query){
				die(mysqli_error($connection));
			}else{
				echo "<center>Congrats! Added to our database!</center>";
				$lastid = mysqli_insert_id($connection);
	$name = str_replace(" ","+",$name);
	$pass = $lastid."+".$name;
	$pass_cry = crypt($pass, 'complaint');
	$add_pass = "UPDATE `form_details` SET `complaint_pass` = '{$pass_cry}' WHERE `id` = {$lastid};";
	$pass_query = mysqli_query($connection,$add_pass);
	if(!$pass_query){
		die(mysqli_error($connection));
	}else{
		echo "<center>
				<big>
					<font color='red'>
						<strong>Alert! Please Save this key, for checking updates on this compliant:</strong>
					</font>
					<font color='green'>
					<b>$pass_cry</b>
					</font>
				</big>
			</center>
				";
	}
			}
		}else{
			echo "All Fields are required!";
		}
	}else{
		echo "No Details recieved!";
	}
?>