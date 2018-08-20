<?php
	session_start();

	if (isset($_POST['submit-setup'])) {

		include 'dbc.inc.php';
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
		$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

		if (empty($username) || empty($pass1) || empty($pass2)) {
		header("location: ../setup.php?login=empty");
		exit();
		}
		else {
			if ($pass1 !== $pass2) {
				header("location: ../setup.php?login=wrongPassword");
				exit();
			}
			else {
				if (!$_SESSION['guest_email']) {
					header("location: ../signup.php?Email=NotExists");
					exit();
				} else {
					$email = $_SESSION['guest_email'];
					$sql = "SELECT * FROM user_info WHERE user_email='$email'";
					$query = mysqli_query($conn, $sql);
					$result = mysqli_num_rows($query);
					if ($result < 1) {
						header("location: ../signup.php?login=NotExists");
						exit();
					} else {
						$sql = "SELECT * FROM users WHERE user_uid='$username'";
						$query = mysqli_query($conn, $sql);
						$result = mysqli_num_rows($query);
						if ($result > 1) {
							header("location: ../Login.php?loginUsername=Exists");
							exit();
						} else {
							$sql = "INSERT INTO users (user_email, user_uid, user_pwd) VALUES ('$email', '$username', '$pass1');";
							mysqli_query($conn, $sql);
							header("location: ../login.php?processTwo=success");
							exit();
						}
					}
				}
			}
		}
	} else {
		header("location:../login.php");
		exit();
	}





?>