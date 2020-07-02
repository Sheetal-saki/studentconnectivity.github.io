<!DOCTYPE html>
<html>
<head>

<style type="text/css">
        
@import url("https://fonts.googleapis.com/css?family=Sofia");

input[type=submit] 
    {
          text-align: center;
          font-size: 15px;
          width: 100px;
          color: black;
          border-radius: 10px;
          padding: 10px 10px;
          margin-left:30px;
          margin-top: 15px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          border: 1px solid lightgrey;
          background-color: #4d194d;
          font-family: "Sofia";
          
      }

      input[type=submit]:hover
   {
          background-color: #ff80bf ;
  }

table {

font-family: "Sofia";

}


    </style>

</head>
<body>

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



?>

<br>
<br>
<br>
<form method="post" action="sent_box.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=100% style='border-collapse: collapse'>
<tr>
        <td bgcolor="#6e6f7b"  width="10"></td>
        <td bgcolor="#6e6f7b"  width="20">To</td>
        <td bgcolor="#6e6f7b" width="120">Subject</td>
        <td bgcolor="#6e6f7b"  width="120">Date and Time</td>
        <td bgcolor="#6e6f7b"  width="120">content</td>

</tr>
</font>
<?php
$user=$_SESSION['username'];
$sql="select * from admin_messages where sender_id='$user' order by msg_time desc";
$result=$conn->query($sql);

echo "<p><P>";
$num=mysqli_num_rows($result);
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";
$link="";
for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($result);
	   if($i%2){
                echo "<tr>
                        <td bgcolor=$color1 nowrap=$nowrap width=10>$row[0]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=20>$row[1]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
                         <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td> ";

        }else{
                 echo "<tr>
                        <td bgcolor=$color2 nowrap=$nowrap width=10>$row[0]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[1]</td> 
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