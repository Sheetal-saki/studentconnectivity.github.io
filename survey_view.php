
<!DOCTYPE html>
<html>
<head>
	<title>Admin View User</title>
	<style type="text/css">
        
@import url("https://fonts.googleapis.com/css?family=Sofia");


body, table {

font-family: "Sofia";

}


    </style>
</head>
<body>

<br><br>
<font size= 7 color="green">View Survey History</font><br><br>
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
          <td bgcolor="#6e6f7b"  width="120">survey id </td>
        <td bgcolor="#6e6f7b"  width="120">cse/it</td>
        <td bgcolor="#6e6f7b"  width="120">ece</td>
        <td bgcolor="#6e6f7b"  width="120">eee</td>
		<td bgcolor="#6e6f7b"  width="120">mech</td>
		<td bgcolor="#6e6f7b"  width="120">eie</td>
		
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



$sql="select *  from survey";
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
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[1]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[2]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
				 
				  </tr> ";
        }
		else
		{
                 echo "<tr>
                     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[0]</td> 
				     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[1]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[2]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[3]</td>
					 <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td>  
					 <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td>  
					 
				     </tr> ";

        }

}

?>
</table>
</body>
</html>
