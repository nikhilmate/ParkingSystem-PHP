<?php
session_start();

if (isset($_SESSION['u_email'])) {
	session_unset();
	session_destroy();
	header("location: ../login.php?logout=success");
	exit();
} else{
	header("location: ../park.php?logout=failed");
}

?>