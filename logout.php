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
echo "Connected successfully";



$username=$_SESSION['username'];
$sqli="UPDATE user SET status=0 WHERE user_id='$username'";
$res=$conn->query($sqli);


session_destroy(); //Destroys all data registered to a session
echo "YOU HAVE SUCCESSFULLY LOGGED OUT";

$sql="delete from chat where sender_id='$username'";
$result=$conn->query($sql);

echo'
<script>
	alert("LOGGED OUT SUCCESSFULLY");
	document.location="index1.html";
  </script>';

  ?>






