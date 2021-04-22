<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;
font-size:15px;

}



div.content {
  margin-left: 100px;
  padding: 1px 3px;
font-size:25px;
}
</style>
</head>
<body style="background:#CCC;"> 
<?php include "../view/include.php"; ?>

<?php
$emailErr = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }else
			header("location:../controller/registration.php");
  } 
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div  class="content">
        <title> Forgot password</title>  
<br><br>
Change your password, with your email address

<p><span class="error">* required field</span></p>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  
  <input type="submit" name="submit" value="Submit">
  <input type="reset" name="reset" value="Reset">
<div style="font-size:15px">
  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>
<?php include "../view/footer.php"; ?>
</div>
</div>

</form>
</body>
</html>
