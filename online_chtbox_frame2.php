<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}
</style>
	
</head>
<body>

<form method="post" action="online_chtbox_frame2.php">
<textarea rows=6 cols=50 name="msg"></textarea>

<input type="submit" value="Post Scrap">
</form>

<?php


if(isset($_REQUEST["msg"]))
{
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	
	$sender_id=$_SESSION['username'];
	$receiver_id=$_SESSION['receiver_id'];
	$msg=$_POST['msg'];

	$sql="insert into chat (sender_id,receiver_id,msg) values('$sender_id','$receiver_id','$msg')";
	$result=$conn->query($sql);
	$conn->close();
	
}



?>


</body>
</html>