<?php



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

$fnam=$_POST['first_name'];
$lnam=$_POST['last_name'];
$sex=$_POST['sex'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$dob=$year.'-'.$month.'-'.$day;
echo $sex;
print("\n$sex $dob");
$addr=$_POST['address'];
$state=$_POST['state'];
$coun=$_POST['country'];
$zip=$_POST['zipcode'];
$s_bran=$_POST['branch'];
$userid=$_POST['user_id'];
$password=$_POST['password'];
$con_password=$_POST['con_password'];



if (strcmp($password,$con_password))
{
	echo'
	<script>
	alert("Passwords does not match. Please try again. ");
	document.location="registrationform1.html";
	</script>';
}

if(empty($userid) or empty($password) or empty($fnam) or empty($lnam) or empty($zip) or empty($s_bran))
{
	 echo'
        <script>
        alert("Please enter all fields ");
        document.location="registrationform1.html";
        </script>';
}

$sql="insert into user (fname,lname,sex,dob,address,state,country,zipcode,s_branch,user_id,password) values('$fnam','$lnam','$sex','$dob','$addr','$state','$coun','$zip','$s_bran','$userid','$password')";

$result=$conn->query($sql);

if($result)
{
	echo'
	<script>
	alert("successfully registered");
	document.location="register_success.html";
	</script>';
}
else
{
	echo'
	<script>
	alert("User id already exists. Please try another one.");
	document.location="registrationform1.html";
	</script>
	';
}


$conn->close();

}

?>