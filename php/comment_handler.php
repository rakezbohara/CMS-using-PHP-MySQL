<?php
include 'db_connection.php';
session_start();
if(!isset($_SESSION['login_id'])){
	echo "<script>
	alert('Please First Login To Comment!!!');
	window.location.href='../index.php';
	</script>";	
}else
$uid=$_SESSION["login_id"];
$date= date("Y-m-d");
$comment=$_POST["comment"];
$post_id=$_GET["id"];
$comment=mysqli_real_escape_string($conn,$comment);

$sql = "INSERT INTO comments (comment, user_id, post_id, date) VALUES ('$comment' , $uid , $post_id , '$date')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	header("location: ../post.php?id=".$post_id);
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


include 'db_connectionclose.php';
?>
