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
				$sql= "SELECT * FROM users WHERE id=".$_SESSION['login_id'];
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {	
				  if($row['type']=='sa'){
   					echo "<a class='navbar-brand' href='php/backend/index.html'>DashBoard</a>";
				  }else{
					echo "<a class='navbar-brand' href='post_articles.php'>Post Article</a>";
				  }
                	echo "<a class='navbar-brand' href='logout.php'>Logout</a>";
					echo  "<h7 class='navbar-brand'>";
				
       			 echo $row["first_name"]." ".$row["last_name"];
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

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                
                
                <?php
        		$sql= "SELECT * FROM blogpost WHERE id = '$var'";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)) {
       			//<!-- Title -->
                echo "<h1>" . $row["title"]. "</h1>";

                //<!-- Author -->
                echo "<p class='lead'>";
                echo  "by <a href='user_profile.php?id=".$row['uid']."'>" . $row["author"]. "</a>";
                echo "</p>";

                echo "<hr>";

               // <!-- Date/Time -->
                echo "<p><span class='glyphicon glyphicon-time'></span> Posted on " . $row["date"]. "</p>";

                echo "<hr>";

                //<!-- Preview Image -->
                echo "<img src='php/images/" . $row["image"]. "'>";

                echo "<hr>";
                
                

               // <!-- Post Content -->
               echo" <p class='lead'>" . $row["content"]. "</p>";

                 echo  "<hr>";
				 
				 }
        		?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action='php/comment_handler.php?id=<?php echo $var ?>' method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class=" btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                
                <?php
        		$sql= "SELECT * FROM comments WHERE post_id = '$var'";
				$result = mysqli_query($conn, $sql);
				
				while($row = mysqli_fetch_assoc($result)) {
				
			
             	echo "<div class='media'>";
                echo "<a class='pull-left' href='#'>";
				$usql= "SELECT * FROM users WHERE id = ".$row['user_id'];
				$uresult =  mysqli_query($conn, $usql);
				$urow = mysqli_fetch_assoc($uresult);
                echo "<img height=50px weidth=45px class='media-object' src='php/images/users/".$urow['image']."'alt=''>";
                echo "</a>";
                echo "<div class='media-body'>";
                echo "<h4 class='media-heading'>". $urow["first_name"] ." ". $urow["last_name"] ." ".
                            "<small>" .$row["date"]. "</small>
                        </h4>";
                echo  $row["comment"];
                echo    "</div>";
                echo "</div>";

                }
				?>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Any thing that can be descried to present the thing that is helpful in the website for any page in any sense.
                    Any thing that can be descried to present the thing that is helpful in the website for any page in any sense.</p>
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
