<?php



$servername="localhost";
$username="root";
$password="";
$dbnamne="student";

$conn = new mysqli($servername, $username, $password,$dbnamne);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])){



$cse=$_POST['cse'];
$ece=$_POST['ece'];
$eee=$_POST['eee'];
$mech=$_POST['mech'];
$eic=$_POST['eic'];


if(empty($cse) and empty($ece) and empty($eee) and empty($mech) and empty($eic)) {
	 echo'
        <script>
        alert("Please enter all fields ");
        document.location="survey_panel.html";
        </script>';
}


$sql="insert into survey (cse,ece,eee,mech,eie) values('$cse','$ece','$eee','$mech','$eic')";

$result=$conn->query($sql);

if($result)
{
	echo'
	<script>
	alert("successfully added");
	document.location="survey_panel.html";
	</script>';
}
else
{
	echo'
	<script>
	alert("error");
	document.location="survey_panel.html";
	</script>
	';
}


$conn->close();

}

?>











