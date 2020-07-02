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

body{

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

if(isset($_POST['submit'])) //checking if the form is submitted or not. 
{ 

	$box=$_REQUEST['box'];
    echo "You have successfully deleted the selected mails!!! <br>";
	//echo" your inbox has " 
    foreach($box as $key=>$value)
		$sql="DELETE from messages where msg_id='$value' ";
	$result=$conn->query($sql);
		
}
?>
<form method="post" action="inbox.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=100% style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="10"></td>
        <td bgcolor="#6e6f7b"  width="20">From</td>
        <td bgcolor="#6e6f7b" width="120">Subject</td>
        <td bgcolor="#6e6f7b"  width="120">Date and Time</td>
</tr>
</font>
<?php

session_start();
$user=$_SESSION['username'];

$sql="select * from messages where receiver_id='$user' order by msg_time desc";
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
                  <td bgcolor=$color1 nowrap=$nowrap width=10><input type=$check  name=box[] value=$row[0]></td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[2]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120><a href=mail_content.php?msg_id=$row[0]>$row[4]</a></td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td></tr> ";
        }else{
                 echo "<tr>
                        <td bgcolor=$color2 nowrap=$nowrap width=10><input type=$check name=box[] value=$row[0] ></td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[2]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120><a href=mail_content.php?msg_id=$row[0]>$row[4]</a></td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120>$row[5]</td></tr> ";

        }

}
?>
</table>
<DIV STYLE="POSITION:ABSOLUTE; LEFT:30; TOP:300">

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<input type="submit"  name="submit" value="delete">
</div>
</form>


</body>
</html>