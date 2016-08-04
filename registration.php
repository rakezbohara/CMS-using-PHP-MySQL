<!DOCTYPE html>
<?php 
include 'php/db_connection.php';
session_start(); 

 
 ?>

<html lang="en">

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
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
					echo "<a class='navbar-brand' href='post_article'>Post Article</a>";
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

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Tech Articles
                    <small>Beyond the Imagination</small>
                </h1>

                <!-- First Blog Post -->
                
               <div class="well">
                    <h1>Enter The new User Details</h1>
                    <form action='php/registration_handler.php' method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        	<h3>First Name:</h3> <input type="text" class="form-control" name="first_name"><br/>
							<h3>Last Name:</h3> <input type="text" class="form-control" name="last_name"><br/>
							<h3>Username:</h3> <input type="text" class="form-control" name="username"><br/>
    						<h3>Password:</h3> <input type="password" class="form-control" name="passcode"><br/>
   						    <h3>Image:</h3> <input type="file" class="form-control" name="image" id="image"><br/>
                          </div> 
                        <button type="submit" class="btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Pager -->
               

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
                        <!-- /.col-lg-6 -->
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
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;Global CMS 2016/p>
                </div>
                <!-- /.col-lg-12 -->
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
