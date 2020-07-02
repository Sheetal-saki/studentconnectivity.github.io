

<!DOCTYPE html>
<html>
<head>
	<title>Admin Main Home </title>
	<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";
		
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
	<h1>HI----
	<?php     

	session_start();
 		    echo $_SESSION['username'];
		?>
	</h1>

<h3> Welcome to STUDENT-TO-STUDENT </h3>
<h4> Click One Of The Link To Perform Tasks.</h4>

<h5> Enjoy Your Day !!!</h5>

</body>
</html>