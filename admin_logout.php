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


session_destroy(); //Destroys all data registered to a session
echo "YOU HAVE SUCCESSFULLY LOGGED OUT";


echo'
<script>
	alert("LOGGED OUT SUCCESSFULLY");
	document.location="admin_login1.html";
  </script>';

  ?>






