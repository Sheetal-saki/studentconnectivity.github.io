<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}
</style>

</head>
<body>

<h2>Student Connectivity forum</h2>

<h4><a href=forum_home.html>forum home</a></h4>
<h4><a href=forum_newpost.php?dept=<?php echo $_REQUEST["dept"];?> >NEW QUESTION ? click me</a></h4>
<table border="0" cellpadding=1 cellspacing="0" width="100%">

	   <tr>
    		<td colspan="2" bgcolor="#6e6f7b"><font color="#ffffff">&nbsp;Threads</font></td>
    		<td bgcolor="#6e6f7b" nowrap="nowrap" width="120"><font color="#ffffff">Author&nbsp;</font></td>
   		<td bgcolor="#6e6f7b" nowrap="nowrap" width="80"><font color="#ffffff">Replies&nbsp;</font></td>
  		<td bgcolor="#6e6f7b" nowrap="nowrap" width="120"><font color="#ffffff">Last Post</font></td>
	   </tr>

<?php

$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fid=$_REQUEST["dept"];
echo "$fid is the department no";
$sql="select user_id,post_title,post_time,type,post_id from post where fid='$fid' and type='q'
ORDER BY  post_time DESC";
$result=$conn->query($sql);
$num=mysqli_num_rows($result);
$color1="#ffffff";
$color2="#eeeeee";
$dept=$_REQUEST["dept"];

function replies ($msg_title)
{
	global $conn;
	$selectquery="select count(post_title) from post where post_title='$msg_title'";
	$res=$conn->query($selectquery);
	$r=mysqli_fetch_array($res);
	return $r[0];
}

for($i=0;$i<$num;$i++)
{
       $row=mysqli_fetch_array($result);
	   $nor=replies($row[1]);
	   if($i%2)
	   {   
	   	echo "<tr>
		<td bgcolor=$color1>&nbsp;</td>
		<td bgcolor=$color1><a href=./forum_viewpost.php?post_id=$row[4]&dept=$dept>$row[1]</a>&nbsp;</td>
 		<td bgcolor=$color1  width=120>$row[0]&nbsp;</td>
 		<td bgcolor=$color1  width=80>&nbsp;$nor</td>
 		<td bgcolor=$color1  width=120>$row[2]&nbsp;</td>
	   </tr>";

	  }else{
	  echo "<tr>
		 <td bgcolor=$color2>&nbsp;</td>
		 <td bgcolor=$color2><a href=./forum_viewpost.php?post_id=$row[4]&dept=$dept>$row[1]</a>&nbsp;</font></td>
 		 <td bgcolor=$color2 width=120>$row[0]&nbsp;</td>
 		 <td bgcolor=$color2  width=80>&nbsp;$nor</td>
 		 <td bgcolor=$color2  width=120>$row[2]&nbsp;</td>
	  </tr>";
	  }
}


?>
<h4><a href= forum_home.html >Go back</a></h4>
</table>
</body>
</html>