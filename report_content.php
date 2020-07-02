<!DOCTYPE html>
<html>
<head>

<style type="text/css">
   
 @import url("https://fonts.googleapis.com/css?family=Sofia");

body
{
	font-family: "Sofia";
}

</style>
</head>
<body>
<br>
<br>
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >   
 </font>

<?php

$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$num=$_REQUEST["rid"];

$sql="select * from reports where rid='$num'";
$result=$conn->query($sql);
//changed by me
//print_r($res);
echo "<p><P>";
$num=mysqli_num_rows($result);
$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

$row=mysqli_fetch_array($result);

				  echo "<tr><td bgcolor=$color1 >From: $row[2]</td></tr>
						<tr><td bgcolor=$color1 >Reported on : $row[0]</td></tr>
						<tr><td bgcolor=$color1 >Subject : $row[4]</td></tr>
						<tr><td bgcolor=$color1 >Content: </td></tr>
                      	<tr rowspan=10 colspan=6 ><td bgcolor=$color2> $row[1]</td></tr> ";					           
$user=$row[0];



?>


</table>
</body>
</html>