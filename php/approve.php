<?php 
include 'db_connection.php'; 
$var=$_GET['id'];
$vari=$_GET['uid'];
if($var==1){
	$sql="UPDATE users set status=1 WHERE id=".$vari;
	mysqli_query($conn, $sql);	
}else{
	$sql="DELETE FROM users WHERE id=".$vari;
	mysqli_query($conn, $sql);
	
}
 header("location:backend/index.php");
include 'db_connectionclose.php'; 	
?>