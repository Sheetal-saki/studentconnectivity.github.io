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
$field=$_POST['field'];
$field_value=$_POST['field_value'];
$user=$_SESSION['username'];
$sql="update user set $field='$field_value' where user_id='$user'";
$result=$conn->query($sql);

?>
<script>
alert("updated successfully");
document.location="edit_profile.html";
</script>
