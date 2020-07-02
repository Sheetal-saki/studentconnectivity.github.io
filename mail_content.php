<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
   
 @import url("https://fonts.googleapis.com/css?family=Sofia");

body{
	font-family: "Sofia";
}
</style>

</head>
<body>
<br><br>

<form method="post" action="inbox.html" target="c">
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >   
 </font>

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


$user=$_SESSION["username"];
$num=$_REQUEST["msg_id"];

$sql="select * from messages where msg_id='$num'";
$result=$conn->query($sql);
echo "<p><P>";
$num=mysqli_num_rows($result);
$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

$row=mysqli_fetch_array($result);

				echo "<tr><td bgcolor=$color1 >User name: $row[1]</td></tr>
					  <tr><td bgcolor=$color1 >Subject : $row[4]</td></tr>
					  <tr><td bgcolor=$color1 >Date and Time : $row[5]</td></tr>
					  <tr><td bgcolor=$color1 >Content : </td></tr>
                      <tr rowspan=10 colspan=6 ><td bgcolor=$color2> $row[6]</td></tr> ";

?>
</table>
</form>
</body>
</html>