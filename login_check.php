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




if (isset($_POST['submit'])){


$uname=$_POST['username'];
$password=$_POST['password'];

$sql="select user_id,password from user where user_id='$uname' and password='$password'";
$result=$conn->query($sql);

$rows=mysqli_num_rows($result);

if ($rows)
{

$_SESSION['username']=$user=$_POST['username'];

$sqli="UPDATE user SET status=1 WHERE user_id='$user'";
$res=$conn->query($sqli);

	echo'
	<script>
		document.location="user_home.php";
	</script>';
}

else
{
 echo'<script>
		alert("invalid username or password. Please enter again");
		document.location="mainlogin.html";
	</script>';

}



$conn->close();


}
?>



