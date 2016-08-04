
<?php
	include 'db_connection.php';

	$first_name=$_POST["first_name"];
	$last_name=$_POST["last_name"];
	$username=$_POST["username"];
	$passcode=$_POST["passcode"];
	$hashed_password=sha1($passcode);
	$imagename =$_FILES["image"]["name"];

	

$target_dir = "images/users/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO users (first_name, last_name, image, username, password, status) VALUES ('$first_name' , '$last_name' , '$imagename' , '$username' , '$hashed_password' , FALSE)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	header("location: ../index.php");
	

	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	
}


include 'db_connectionclose.php';
?>
