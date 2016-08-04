
<?php
include 'db_connection.php';
$title=$_POST["title"];
$content=$_POST["content"];
$sql="INSERT INTO pages (menu_name, content) VALUES('".$title."','".$content."')";
mysqli_query($conn, $sql);	
header("location:backend/index.php");
	
include 'db_connectionclose.php';
?>