<!DOCTYPE html>
<html>
<head>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Sofia");

body{

font-family: "Sofia";

}
</style>
	
<frameset rows="70%,*">

<?php


$user=$_REQUEST['cht_user'];
session_start();
$_SESSION['receiver_id']=$user;

?>

<frame src="online_chtbox_frame1.php" noresize>
<frame src="online_chtbox_frame2.php" noresize>
<title><?php echo $user ?></title>

</head>
<body>

</body>
</html>