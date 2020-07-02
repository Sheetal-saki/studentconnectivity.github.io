<?php


$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$user=$_POST['user'];
$sql="select user_id from user where user_id='$user'";
$result=$conn->query($sql);
$num=mysqli_num_rows($result);
if($num>0)	
{
	$sqli="delete from user where user_id='$user'";
	$res=$conn->query($sqli);
	
echo'
	<script>
	alert("You have successfully deleted the user");
	document.location="admin_ban_users.html";
	</script>';
	
}
else
{
	echo'
	<script>
	alert("user_id does not exist..");
	document.location="admin_ban_users.html";
	</script>';
}


?>