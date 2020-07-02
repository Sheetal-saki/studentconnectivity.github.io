<!DOCTYPE html>
<html>
<head>
	<title> User Welcome</title>

	<style type="text/css">
		

			@import url("https://fonts.googleapis.com/css?family=Sofia");


			h1,h3,h4{

				font-family: "Sofia";
				color:  #4d194d;
			}

body
		{
		
			text-align: left;
			background-image: url("C:/wamp/www/project/home.jpg");
			background-repeat: no-repeat;
			background-position: right bottom ;
			background-attachment: fixed;
			background-size: auto;

	}

	</style>
</head>
<body>

<h1> HI --------

<?php
session_start();
echo$_SESSION['username'];

?>

</h1>

<h3> Welcome to STUDENT CONNECTIVITY </h3>
<h4> Enjoy Your Day !!!</h4>


</body>
</html>