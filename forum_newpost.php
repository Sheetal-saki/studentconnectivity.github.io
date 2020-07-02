<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}

input[type=submit] 
		{
  				text-align: center;
  				font-size: 20px;
  				width: 100px;
  				color: black;
  				border-radius: 10px;
  				padding: 14px 20px;
  				margin-left:30px;
  				margin-top: 15px;
  				border: none;
  				border-radius: 4px;
  				cursor: pointer;
  				border: 1px solid lightgrey;
  				background-color: #4d194d;
  		}

  		input[type=submit]:hover
   {
  				background-color: #ff80bf ;
	}
</style>
</head>
<body>


<?php


session_start();
if(isset($_REQUEST['submit'])){


$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	$dept=$_REQUEST["dept"];
	$username=$_SESSION['username'];
	$msg_body=$_REQUEST["msg_body"];
	$title=$_REQUEST["title"];
	$sql="insert into post(user_id,fid,post_text,type,post_title)
					  values('$username',$dept,'$msg_body','q','$title')";
	$result=$conn->query($sql);
	
echo $username.$dept.$msg_body.$title;


if($result>0)
	{
		?>
		<script>
			document.location="forum_home.html";
		</script>
		<?php
	}


}

?>		
<form method="post" action="forum_newpost.php" target="c">
Title :<input type="text" name="title" size=50><br><br>
<font size=5><i>Type your Question here:</i></font><br>
<input type="hidden" name="dept" value="<?php echo $_REQUEST['dept'];?>">
<textarea rows="16" cols="90" name="msg_body"></textarea>
<br><br><br>
<input type="submit" value="SEND" name ="submit">
</form>

</body>
</html>
