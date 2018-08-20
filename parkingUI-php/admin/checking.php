<?php
include 'includes/dbc_admin.inc.php';
$sql = "SELECT * FROM region1";
$query = mysqli_query($conn, $sql);
$result = mysqli_num_rows($query);
$j = 0;
while ($row = mysqli_fetch_assoc($query)) {
	$arr[$j] = $row['area_status'];
	$j++;
	echo "<div class=\"area\"><a data-area=\"R1\" style=\"color:";
	if ($row['area_status'] == 'YES') {
		echo "purple";
	}
	echo "\" class=\"ar\" href=\"register_vehicle.html\">".$row['area_name']."</a></div>";
}
for ($k=0; $k < $result; $k++) { 
	echo 'Arr['.$k.'] = '.$arr[$k].'<br>';
}
for ($i=0; $i < $result; $i++) { 
	$arr[$i] = $row['area_status'];
}
?>