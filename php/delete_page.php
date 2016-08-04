<?php 
include 'db_connection.php'; 

$vari=$_GET['uid'];

	$sql="DELETE FROM pages WHERE pid=".$vari;
	mysqli_query($conn, $sql);
	

 header("location:backend/index.php");
include 'db_connectionclose.php'; 	
?>