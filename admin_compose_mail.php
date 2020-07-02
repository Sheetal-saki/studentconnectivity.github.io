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

$toaddr=$_POST['to_address'];
$fromaddr=$_SESSION['username'];
$sub=$_POST['subject'];
$tex=$_POST['msg_body'];


$to="select user_id from user where user_id ='$toaddr'";
$r=$conn->query($to);

$fr="select username from admin where username ='$fromaddr'";
$rs=$conn->query($fr);


$tr=mysqli_num_rows($r);
$tf=mysqli_num_rows($rs);

if($tr==0)
{
	echo'
	<script>
	alert("to address does not exist..");
	document.location="compose_mail.html";
	</script>';
	
}
else if($tf==0)
{
	echo'
	<script>
	alert("from address does not exist..");	
	document.location="compose_mail.html";
	</script>';
}


else
{
	$suc="insert into admin_messages (receiver_id,sender_id,msg_sub,msg_body) values('$toaddr','$fromaddr','$sub','$tex')";
	$ruc=$conn->query($suc);
	

	if($suc)	
	{	
		echo "<script>";              //here we are sending toaddress to another document 
		echo "document.location=\"compose_mail_success.php?toaddr= $toaddr\"";
		echo"</script>";
	
	}
	else
	{
		echo'
		<script>

		alert("mail cannot be send");
		</script>';
	}
}
$conn->close();
?>




