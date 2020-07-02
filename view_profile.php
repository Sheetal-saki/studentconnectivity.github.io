<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	

		@import url("https://fonts.googleapis.com/css?family=Sofia");
body, table{


	font-family: "Sofia";
}

 a {

     	font-family: "Sofia";
     	color: #4d194d;
     }

a:hover{

background-color: #ff80bf ;
            background-image: url("C:/wamp/www/project/edit.jpg");
			background-repeat: no-repeat;
			background-position: right bottom;	

}

</style>

</head>
<body>
	<br>
	<font size=5 color="green">Your profile</font>
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="120">Firstname</td>
        <td bgcolor="#6e6f7b"  width="120">Sex</td>
        <td bgcolor="#6e6f7b"  width="120">DOB</td>
		<td bgcolor="#6e6f7b"  width="120">Address</td>
		<td bgcolor="#6e6f7b"  width="120">State</td>
		<td bgcolor="#6e6f7b"  width="120">Country</td>
		<td bgcolor="#6e6f7b"  width="120">Zipcode</td>
		<td bgcolor="#6e6f7b"  width="120">Branch</td>
		<td bgcolor="#6e6f7b"  width="120">User_id</td>
		<td bgcolor="#6e6f7b"  width="120">lastname</td>
		
		</tr>
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
session_start();
$user=$_SESSION['username'];
echo $user;
$sql="select * from user where user_id='$user'";
$result=$conn->query($sql);

$row=mysqli_fetch_array($result);


$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

         echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[2]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td>
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
 				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[6]</td>
  				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[7]</td>
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[8]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[9]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[1]</td> 
				
				  </tr> ";



?>
</table><br><br><br><br><br><br><br>
<font size=5><div STYLE="POSITION:ABSOLUTE; LEFT:15; TOP:200">
<a href="edit_profile.html">edit my profile</a><br><a href="user_home.php">back</a></div></font>


</body>
</html>