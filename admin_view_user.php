<!DOCTYPE html>
<html>
<head>
	<title>Admin View User</title>


<style type="text/css">
		 @import url("https://fonts.googleapis.com/css?family=Sofia");

body
{
	font-family: "Sofia";
}

	</style>

</head>
<body>

<br><br>
<font size= 10 color="green">List of users...</font><br><br>
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="120">User_id</td>
        <td bgcolor="#6e6f7b"  width="120">First name</td>
        <td bgcolor="#6e6f7b"  width="120">Last name</td>
		<td bgcolor="#6e6f7b"  width="120">State</td>
		<td bgcolor="#6e6f7b"  width="120">Branch</td>
		<td bgcolor="#6e6f7b"  width="120">Sex</td>
		<td bgcolor="#6e6f7b"  width="120">DOB</td>
		<td bgcolor="#6e6f7b"  width="120">Status</td>
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



$sql="select * from user";
$result=$conn->query($sql);
$num=mysqli_num_rows($result);



$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($result);
	   if($i%2)
	   {
          echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[9]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[0]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[1]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[8]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[2]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[11]</td> 
				  </tr> ";
        }
		else
		{
                 echo "<tr>
                     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[9]</td> 
				     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[0]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[1]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[5]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[8]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[2]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[3]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[11]</td>  
				     </tr> ";

        }

}


 ?>


</table>
</body>
</html>
