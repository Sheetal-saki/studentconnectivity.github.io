<!DOCTYPE html>
<html>
<head>
	<title> View Reports </title>
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

	$box=$_POST['box'];
    echo "You have successfully deleted the selected reports!!! <br>";
    foreach($box as $key=>$value)
    	$sql="DELETE from reports where rid='$value'";
        $result=$conn->query($sql);
		
}
?>

<form method="post" action="admin_reports.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="20"></td>
	<td bgcolor="#6e6f7b"  width="20">From</td>
        <td bgcolor="#6e6f7b" width="120">Reported on</td>
	<td bgcolor="#6e6f7b" width="120">Subject</td>
        
</tr>
</font>

<?php

//$user=$_COOKIE["session_id"];
session_start();

//$user=$_SESSION['username'];
$sqli="select * from reports";
$res=$conn->query($sqli); // change by me 


echo "<p><P>";
$num=mysqli_num_rows($res);
$check="checkbox";
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";

for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($res);
	   if($i%2){
          echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=10><input type=$check name=box[] value=$row[3]></td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[2]</td>
		  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120><a href=report_content.php?rid=$row[3]>$row[4]</a></td>
		</tr>";
        }else{
                 echo "<tr>
                        <td bgcolor=$color2 nowrap=$nowrap width=10><input type=$check name=box[] value=$row[3] ></td> 
			<td bgcolor=$color2 nowrap=$nowrap width=20>$row[2]</td>
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[0]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120><a href=report_content.php?rid=$row[3]>$row[4]</a></td> 
                       </tr>";

        }

}

?>

</table>
<div  STYLE="POSITION:ABSOLUTE; LEFT:30; TOP:300">

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input type="submit"  name="submit" value="delete">
</div>
</form>
</body>
</html>

















