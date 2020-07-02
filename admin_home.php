<?php
session_start();


if (!isset($_SESSION['username']))
{

echo"you are logout";
header('location:admin_login1.html');

}
?>
<html>
<head>
	<title> Admin Home </title>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}
</style>


	<frameset rows="13%,*">
	<frame name="a" src="admin_top.php" noresize>
	<frameset cols=20%,*">
		<frame name="b" src="admin_task.html" noresize>
		<frame name="c" src="admin_home_welcome.php" noresize>
	</frameset>
</frameset>
</head>
<body>

</body>
</html>