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



if (isset($_POST['submit'])){


$uname=$_POST['username'];
$password=$_POST['password'];

$sql="select username,password from admin where username='$uname' and password='$password'";
$result=$conn->query($sql);

$rows=mysqli_num_rows($result);

if ($rows)
{

$_SESSION['username']=$uname=$_POST['username'];



	echo'
	<script>
		document.location="admin_home.php";
	</script>';
}

else
{
 echo'<script>
		alert("invalid username or password. Please enter again");
		document.location="admin_login1.html";
	</script>';

}



$conn->close();


}
?>
