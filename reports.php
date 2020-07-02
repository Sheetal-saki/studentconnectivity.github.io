<?php

session_start();
$reporter=$_SESSION['username'];
$user=$_POST['user'];
$subject=$_POST['subject'];
$reason=$_POST['reason'];

$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="select user_id from user where user_id='$user'";
$result=$conn->query($sql);

$num=mysqli_num_rows($result);

if(empty($user) or empty($subject) or empty($reason))
{
	?>
        <script>
        alert("Enter all fields");
        document.location="reports.html";
        </script>
        <?php
}
else
{
	if($num>0)
	{
		
		$sqli="insert into reports (student_id,reason_text,reporter_id,rid,subject) values('$user','$reason','$reporter','','$subject')";
		$res=$conn->query($sqli);
		
		?>
		<script>
		alert("Successfully reported..");
		document.location="reports.html";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert("user id doesnot exist");
		document.location="reports.html";
		</script>
		<?php
	}
}
?>

	
