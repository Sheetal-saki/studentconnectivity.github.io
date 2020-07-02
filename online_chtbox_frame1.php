<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="1">

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}
</style>
</head>
<body>

	<?php


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

$sql="select *from chat where (receiver_id='$sender_id' or receiver_id='$receiver_id') and (sender_id='$sender_id' or sender_id='$receiver_id') order by msgtime";
$result=$conn->query($sql);

$num=mysqli_num_rows($result);

for($i=0;$i<$num;$i++)
{
	$row=mysqli_fetch_array($result);
	if($row[0]==$sender_id)
		$color="green";
	else
		$color="red";
	echo "<font color='$color'>$row[0]</font> : $row[2]<br>";
}
	?>

</body>
</html>