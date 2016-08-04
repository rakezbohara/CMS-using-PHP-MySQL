<!DOCTYPE html>
<html lang="en">
<?php include 'php/db_connection.php'; ?>
<?php 
	session_start();
	$var=$_GET['id']; 
		
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tech Articles - Beyond the Imagination</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

  
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Tech Articles</a>
                <?php
                $sql= "SELECT * FROM pages";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {
					echo "<a class='navbar-brand' href='page.php?id=".$row['pid']."'>".$row['menu_name']."</a>";
				}
				
                ?>
              <?php if(!isset($_SESSION['login_id'])){
      				echo "<a class='navbar-brand' href='php/login.php'>Login/Register</a>";
   				}else
				{	
					
   					echo "<a class='navbar-brand' href='php/backend/index.html'>DashBoard</a>";
                	echo "<a class='navbar-brand' href='logout.php'>Logout</a>";
					echo  "<h7 class='navbar-brand'>";
					  $sql= "SELECT * FROM users WHERE id=".$_SESSION['login_id'];
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {
       			 echo $row["first_name"]." ".$row["last_name"];
				 //echo "<img src='images/". $row["image"]. "'height='42' width='42'>";
 		       
				 echo "</h7>";
                
                 echo "<img height=50px weidth=45px src='php/images/users/".$row["image"]."'>";
                  }
               	
				}
			 ?>
			</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <?php
        	
			 
                $sql= "SELECT * FROM pages WHERE pid=".$var;
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {
					 echo" <p class='lead'>" . $row["content"]. "</p>";
				}
				
                

		?>
            
                    <!-- /.row -->
                </div>

               

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Global CMS 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include 'php/db_connectionclose.php' ?>
</html>
