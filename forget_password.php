<?php


$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


if (isset($_POST['submit']))
{

$username=$_POST['username'];
$zipcode=$_POST['zipcode'];
$year=$_POST['yy'];
$month=$_POST['mm'];
$day=$_POST['dd'];
$dob=$year.'-'.$month.'-'.$day;
if(empty($username) or empty($zipcode) or empty($dob) )
{
        echo'
        <script>
        alert("Please enter all fields ");
        document.location="forget_password.html";
        </script>';
}

else
{

$sql="select password from user where user_id='$username' and zipcode='$zipcode'and dob='$dob'" ;
$result=$conn->query($sql);


$rows=mysqli_num_rows($result);
	if($rows>0)
	{
	$f=mysqli_fetch_array($result);
	$color="green";
	 print "<center><h1>your password is :<font color='$color'>  $f[0]</font> </h1></center>" ; 
        }
        else
        {
                echo'
                <script>
                alert("invalid enters");
                document.location="forget_password.html";
                </script>';
        }


$conn->close();



}
}
?>







