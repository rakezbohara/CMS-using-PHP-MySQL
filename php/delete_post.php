<?php 
include 'db_connection.php'; 

$vari=$_GET['uid'];

	$sql="DELETE FROM blogpost WHERE id=".$vari;
	mysqli_query($conn, $sql);
	

 header("location:backend/index.php");
include 'db_connectionclose.php'; 	
?>