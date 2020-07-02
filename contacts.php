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

<h1>Your friends list:</h1>
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

if(isset($_POST['Add'])) //checking if the form is submitted or not. 
{ 

	$contactt=$_POST["contact"];
	$sql="select user_id from user where user_id='$contactt'";
	$result=$conn->query($sql);
	$num=mysqli_num_rows($result);

if($num)	
	{
		echo "You have successfully added your friends!!! <br>";
		$selectsql="INSERT INTO contacts VALUES('$user','$contactt') ";
		$res=$conn->query($selectsql);
		
	}
	else
	{
		?>
		<script>
		alert("user_id doesnot exist..");
		document.location="contacts.php";
		</script>
		<?php
	}

}
if(isset($_POST['delete'])) //checking if the form is submitted or not. 
{ 

	$box=$_REQUEST['box'];
    echo "You have successfully deleted the selected mails!!! <br>";
	//echo" your inbox has " 
    foreach($box as $key=>$value) echo "<br>";
	$sqli="DELETE from contacts where contact_id='$value' ";
	$ress=$conn->query($sqli);
	
}

function getfname($user_id)
{
	 global $conn; 
	$sq="select fname from user where user_id='$user_id'";
	$r=$conn->query($sq);
	$row1=mysqli_fetch_array($r);
	return $row1[0];
}


function getlname($user_id)
{
	 global $conn; 
	$s="select lname from user where user_id='$user_id'";
	$rr=$conn->query($s);
	$row1=mysqli_fetch_array($rr);
	return $row1[0];
}



$ss="select * from contacts where user_id='$user'";
$rrr=$conn->query($ss);

echo "<p><P>";
$num=mysqli_num_rows($rrr);
$color1="#ee82ee";
$color2="#3cb371";
$nowrap="nowrap";
echo "<tr ><td bgcolor=$color1></td><td  bgcolor=$color1>First Name</td><td bgcolor=$color1>Last Name</td><td  bgcolor=$color1>User id</td></tr>";
?>

<form method="post"  action="contacts.php" target="c"> 
<?php ;//it is here for collecting check box values
for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($rrr);
		$fname=getfname($row[1]);
		$lname=getlname($row[1]);
	    echo "<tr>
				<td width=10><input type=\"checkbox\"  name=box[] value=$row[1]></td> 
		<td>$fname</td><td>$lname</td><td>$row[1]</td>";/*<td><form method=\"post\" 	action=\"compose_mail.html\" target=\"c\"><input type=\"submit\" value=\"send mail\"></form></td></tr> ";*/
}
?>
	<tr><td><input type="submit" name="delete" value=" Delete "></td></tr>
</form>
</table> 

<font size=5>
<br>To add a new contact
enter user name of your friend<br></font>
<form method="post"  action="contacts.php" target="c"> 

<br>User Name: <input type="text" name="contact"> 
<input type="submit" name="Add" value=" Add ">
</form>
</body>
</html>