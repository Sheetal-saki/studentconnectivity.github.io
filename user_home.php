
<?php
session_start();


if (!isset($_SESSION['username']))
{

echo"you are logout";
header('location:mainlogin.html');

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Main Home </title>
	<frameset rows="13%,*" border=1>
	<frame name="a" src="user_top.php" noresize>
	<frameset cols="20%,*" border=1>
	
		<frame name="b" src="user_home_tasks.html" noresize>
		<frame name="c" src="user_home_welcome.php" noresize>
	</frameset>
</frameset>
</head>
<body>

</body>
</html>