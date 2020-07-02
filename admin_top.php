
 <!DOCTYPE html>
 <html>
 <head>
 	<title> Home Admin</title>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}

input[type=submit] 
		{
  				text-align: center;
  				font-size: 15px;
  				width: 100px;
  				color: black;
  				border-radius: 10px;
  				padding: 10px 10px;
  				margin-left:30px;
  				margin-top: 15px;
  				border: none;
  				border-radius: 4px;
  				cursor: pointer;
  				border: 1px solid lightgrey;
  				background-color: #4d194d;
  				font-family: "Sofia";
  		}

  		input[type=submit]:hover
   {
  				background-color: #ff80bf ;
	}


</style>


 </head>
 <body bgcolor="white">
 
 <div align="right">

 	<a href="admin_home.php" target="_top">


<?php     
        session_start();
 		    echo $_SESSION['username'];
		?>


	
</a>

<form method="post" action="admin_logout.php" target="_top">

			<input type="submit" value ="Logout" name="logout" >
		</form>

 </body>
 </html>