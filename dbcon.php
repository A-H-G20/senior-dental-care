<?php
$conn = mysqli_connect('localhost','root','','wisdom');
if(!$conn){
	echo "Connection Failed: ".mysqli_error($conn);
	exit;
}
?>
