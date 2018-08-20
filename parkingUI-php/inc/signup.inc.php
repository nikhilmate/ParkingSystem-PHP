<?php
session_start();
if (isset($_POST['submit-register'])) {
	include 'dbc.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['fname']);
	$last = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	//header("location: ../signup.php?first='$first'&last='$last'&phone='$phone'");
	//Error handlers
	if (empty($first)) {
		header("location: ../signup.php?registerFirst=empty");
		exit();				
	} else if (empty($country)) {
		header("location: ../signup.php?registerCountry=empty");
		exit();	
	} else if (empty($phone)) {
		header("location: ../signup.php?registerPhone=empty");
		exit();	
	} else if (empty($email)) {
		header("location: ../signup.php?registerEmail=empty");
		exit();	
	} else if (empty($last)) {
		header("location: ../signup.php?registerLast=empty");
		exit();	
	}
	else {
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[0-9]*$/", $phone)) {
			header("location: ../signup.php?register=invalid");
			exit();	
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("location: ../signup.php?register=invalid");
				exit();
			} else {
				$sql = "SELECT * FROM user_info WHERE user_email='$email' OR user_phone='$phone'";
				$query = mysqli_query($conn, $sql);
				$result = mysqli_num_rows($query);
				if ($result > 0) {
					header("location: ../signup.php?register=uidExists");
					exit();	
				} else {
					$_SESSION['guest_email'] = $email;
					$sql = "INSERT INTO `user_info` (user_first, user_last, user_email, user_country, user_phone) VALUES ('$first', '$last', '$email', '$country', '$phone');";
					$result = mysqli_query($conn, $sql);
					if ($result) {
						header("location: ../setup.php?processOne=success");
						exit();
					} else {
						header("location: ../signup.php?processOne=failed");
						exit();
					}	
				}
			}
		}
	}


} else {
	header("location: ../signup.php");
	exit();
}



?>