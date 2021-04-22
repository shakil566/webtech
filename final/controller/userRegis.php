
<?php
require_once('../db/db.php');
$name = $uname = $gender =$dob= $email = $npass = $rnpass='';

$name = $_POST['name'];
$uname = $_POST['uname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$npass = $_POST['npass'];
$rnpass = $_POST['rnpass'];
$dob = $_POST['dob'];


$sql = "INSERT INTO luser (name,uname,gender,email,dob,npass) VALUES ('$name','$uname','$gender','$email','$dob','$npass')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: ../controller/login.php");
}
else
{
	echo "Error :".$sql;
}
?>
 