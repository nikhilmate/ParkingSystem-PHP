<?php
session_start();

if (isset($_SESSION['u_email'])) {
	if (isset($_POST['submit-entry'])) {
		include 'dbc.inc.php';
		$region = mysqli_real_escape_string($conn, $_POST['region']);
		$area = mysqli_real_escape_string($conn, $_POST['area']);
		$vehicle_no = mysqli_real_escape_string($conn, $_POST['vehicle_no']);
		$valid_from = mysqli_real_escape_string($conn, $_POST['valid_from']);
		$valid_to = mysqli_real_escape_string($conn, $_POST['valid_to']);
		if (empty($region) || empty($area) || empty($vehicle_no) || empty($valid_from) || empty($valid_to)) {
			header("location: ../park.php?field=empty");
			exit();
		} else {
			$sql1 = "SELECT region_name FROM regions_included WHERE region_name='$region'";
			$query1 = mysqli_query($conn, $sql1);
			$result1 = mysqli_num_rows($query1);
			if ($result1 !== 1) {
				header("location: ../park.php?region=False");
				exit();
			} else {
				$sql2 = "SELECT * FROM `$region` WHERE area_name='$area'";
				$query2 = mysqli_query($conn, $sql2);
				$result2 = mysqli_num_rows($query2);
				if ($result2 !== 1) {
					header("location: ../park.php?area=False");
					exit();
				} else {
					while ($row2 = mysqli_fetch_assoc($query2)) {
					$name = $row2['area_name'];
					$status = $row2['area_status'];
					$area_floor = $row2['area_floor'];
					}
					if (!$name || ($status == 'YES')) {
						header("location: ../park.php?areaStatus=PARKED");
						exit();
					} else {
						$user_key = $_SESSION['u_email'];
						$sql3 = "SELECT * FROM user_info WHERE user_email='$user_key'";
						$query3 = mysqli_query($conn, $sql3);
						$result3 = mysqli_num_rows($query3);
						if ($result3 !== 1) {
							header("location: ../signup.php?user=NotRegistered");
							exit();
						} else {
							while ($row3 = mysqli_fetch_assoc($query3)) {
								$user_first = $row3['user_first'];
								$user_last = $row3['user_last'];
								$user_email = $row3['user_email'];
							}
							$sql4 = "INSERT INTO area_occupied (area_name, region_name, area_floor, user_first, user_last, user_email, vehicle_no, entry_time, entry_from, entry_to, valid_upto) VALUES ('$area', '$region', '$area_floor', '$user_first', '$user_last', '$user_email', '$vehicle_no', NOW(), NOW(), NOW(), NOW());";
							if (mysqli_query($conn, $sql4)) {
								$sql5 = "UPDATE `$region` SET area_status='YES' WHERE area_name='$area' AND area_floor='$area_floor';";
								if (mysqli_query($conn, $sql5)) {
									header("location: ../park.php?user=Registered");
									exit();
								} else {
									header("location: ../park.php?TechnicallyFailed");
									exit();
								}

							} else {
								header("location: ../park.php?CanNotRegistered");
								exit();
							}

						}
					}
				}
			}
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