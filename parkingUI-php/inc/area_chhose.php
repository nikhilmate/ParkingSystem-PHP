<?php
session_start();

if (isset($_SESSION['u_email'])) {
	if (isset($_GET['region'])) {

		include "dbc.inc.php";
		$region = mysqli_real_escape_string($conn, $_GET['region']);
		$sql = "SELECT * FROM `$region` WHERE area_status='NO'";
		$query = mysqli_query($conn, $sql);
		 while ($row = mysqli_fetch_assoc($query)) {
		 	echo "<option value='".$row['area_name']."'>".$row['area_name']."</option>";
	 	}
	} else {
		header("location: ../park.php");
		exit();
	}
} else {
	header("location: ../login.php");
	exit();
}

?>