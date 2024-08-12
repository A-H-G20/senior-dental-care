<?php
include('dbcon.php');
$id=$_POST['id'];
mysqli_query($conn,"delete from feedback where feedback_id='$id'") or die(mysqli_error($conn));
?>