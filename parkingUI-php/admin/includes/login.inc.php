index<?php
	session_start();


	if (isset($_POST['submit-admin'])) {

		include 'dbc_admin.inc.php';
		$uid = mysqli_real_escape_string($conn, $_POST['admin-uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['admin-pwd']);

		if (empty($uid) || empty($pwd)) {
		header("location: ../index.php?login=empty");
		exit();
		} 
		else {
			$sql = "SELECT * FROM admin WHERE admin_uid='$uid' OR admin_email='$uid'";
			$query = mysqli_query($conn, $sql);
			$result = mysqli_num_rows($query);
			if ($result < 1 && $result > 1) {
				header("location: ../index.php?login=NotExists");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($query)) {
					//De-Hashing the password
						$_SESSION['admin_uid'] = $row['admin_uid'];
						$_SESSION['admin_email'] = $row['admin_email'];

						header("location: ../index.php?login=success");
						exit();
				} else {
					header("location: ../index.php?login=NotFetched");
					exit();
				}
			}
		}
	} else {
		header("location:../index.php");
		exit();
	}





?>