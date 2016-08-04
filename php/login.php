<?php
   include 'db_connection.php';
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mpassword = $_POST['password']; 
	  
	  $mypassword = sha1($mpassword);
	  
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword' and status = 1";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	

      
      // If result matched $myusername and $mypassword, table row must be 1 row
	    if($count == 1) {
			$username=$row["first_name"];
			$id=$row["id"];
			
		 
            $_SESSION['login_id'] = $id;
           //echo $_SESSION['login_id'];
             header("location: ../index.php");
      }else {
         $error = "Your Login Name or Password is invalid"; 
		 
		 echo "Wrong username or password";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/>
                  <br />
               </form>
               <a href="../registration.php">Register Now</a>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>