<!DOCTYPE html>
 <html>
 <head>
 	<title> Home User</title>
 	<style type="text/css">
 		
     @import url("https://fonts.googleapis.com/css?family=Sofia");
     a {

     	font-family: "Sofia";
     	color: #4d194d;
     }

a:hover{

background-color: #ff80bf ;

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

 	<a href="user_home.php" target="_top">


<?php     
        session_start();
 		    echo $_SESSION['username'];
		?>


	
</a><br>
<a href="view_profile.php" target="_top">view profile</a></div></td>


<form method="post" action="logout.php" target="_top">

			<input type="submit" value ="Logout" name="logout" >
		</form>

 </body>
 </html>