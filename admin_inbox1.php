<!DOCTYPE html>
<html>
<head>
	
  <style type="text/css">
        
@import url("https://fonts.googleapis.com/css?family=Sofia");


body, table {

font-family: "Sofia";

}


    </style>

</head>
<body>
<br>

<?php

$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
<form method="post" action="admin_inbox1.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=100% style='border-collapse: collapse' >
<tr>
       
        <td bgcolor="#6e6f7b"  width="20">From</td>
        <td bgcolor="#6e6f7b" width="120">Subject</td>
        <td bgcolor="#6e6f7b"  width="120">Date and Time</td>
        <td bgcolor="#6e6f7b"  width="120">Content</td>
</tr>
</font>
<?php

session_start();
$user=$_SESSION['username'];

$sql="select * from admin_messages where receiver_id='$user' order by msg_time desc";
$result=$conn->query($sql);

echo "<p><P>";
$num=mysqli_num_rows($result);
$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($result);
	   if($i%2){
          echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[2]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
                         <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td> ";
        }else{
                 echo "<tr>
                        
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[2]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120>$row[3]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120>$row[5]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120>$row[4]</td>";

        }

}
?>
</table>

</form>


</body>
</html>