<?php
	session_start();


	if (isset($_POST['submit-login'])) {

		include 'dbc.inc.php';
		$uid = mysqli_real_escape_string($conn, $_POST['username']);
		$pwd = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($uid) || empty($pwd)) {
		header("location: ../Login.php?login=empty");
		exit();
		} 
		else {
			$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
			$query = mysqli_query($conn, $sql);
			$result = mysqli_num_rows($query);
			if ($result < 1 && $result > 1) {
				header("location: ../Login.php?login=NotExists");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($query)) {
					//De-Hashing the password
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['u_email'] = $row['user_email'];

						header("location: ../park.php?login=success");
						exit();
				} else {
					header("location: ../signup.php?login=NotFetched");
					exit();
				}
			}
		}
	} else {
		header("location:../login.php");
		exit();
	}





?>