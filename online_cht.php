<!DOCTYPE html>
<html>
<head>

<style type="text/css">	

@import url("https://fonts.googleapis.com/css?family=Sofia");
body, table{


	font-family: "Sofia";
}

</style>

</head>
<body>
<h1>Your Online  friends:</h1>
<div style="position:absolute; top=33"></div>
<table  width=600 height=10 style='border-collapse: collapse'>


<?php  



$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


session_start();
$user=$_SESSION['username'];


function getfname($user_id)
{
	global $conn;
	$sql="select fname from user where user_id='$user_id'";
	$result=$conn->query($sql);
	
	$row1=mysqli_fetch_array($result);
	return $row1[0];
}

function getlname($user_id)
{
	global $conn;
	$sqli="select lname from user where user_id='$user_id'";
	$res=$conn->query($sqli);
	
	$row1=mysqli_fetch_array($res);
	return $row1[0];
}

$select="select * from contacts where user_id='$user'";
	$r=$conn->query($select);

echo "<p><p>";
$num=mysqli_num_rows($r);
$color1="#6e6eeg";
$color2="#eeeeee";
$nowrap="nowrap";
echo "<table width=600 height=10 style='border-collapse: collapse'>";
echo "<tr><td  bgcolor=$color1>First Name</td><td bgcolor=$color1>Last Name</td><td  bgcolor=$color1>User id</td></tr>";

for($i=0;$i<$num;$i++)
{
	
	    $row=mysqli_fetch_array($r);
		$fname=getfname($row[1]);
		$lname=getlname($row[1]);
		$checkStatus="select status from user where status=1 and user_id='$row[1]'";
		$rr=$conn->query($checkStatus);

		$row1=mysqli_fetch_array($rr);
		if($row1)
		echo "<tr>	<td>$fname</td>
			<td>$lname</td>
			<td><a href=online_chtbox.php?cht_user=$row[1] target=\"_blank\">$row[1]</a></td> </tr>";
}


?>
</table>
</body>
</html> 


