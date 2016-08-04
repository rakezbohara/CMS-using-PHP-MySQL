
<?php include 'db_connection.php'; ?>
<html>
	<body>
    	<?php
        	$sql= "SELECT * FROM blogpost";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)) {
       			 echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["image"]. "<br>";
				 echo "<img src='images/". $row["image"]. "'height='42' width='42'>";
 		   }
        ?>
    </body>
</html>

<?php include 'db_connectionclose.php' ?>