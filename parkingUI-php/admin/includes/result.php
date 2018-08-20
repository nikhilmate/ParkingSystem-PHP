<?php 
$sql = "SELECT * FROM region1";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	if ($row['area_status'] == 'active') { }
	echo ""
}

?>