<html>
<body>
<?php
   include 'db_connection.php';
?>

<form action="registration_handler.php" method="post" enctype="multipart/form-data">
	First Name: <input type="text" name="first_name"><br/>
	Last Name: <input type="text" name="last_name"><br/>
	Username: <input type="text" name="username"><br/>
    Password: <input type="password" name="passcode"><br/>
    Image: <input type="file" name="image" id="image"><br/>
<input type="submit">
</form>


</body>
</html>