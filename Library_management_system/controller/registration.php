<!DOCTYPE HTML>  
<html>
<head>
 <title>Registration </title>
<style>

.error {color: #FF0000;
font-size:15px;

}

body {
  margin: 0;
  font-family: "Lato", sans-serif;
 
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

fieldset {
  margin-left: 200px;
  padding: 1px 16px;
font-size:25px;

}

}
</style>
</head>
<body  style="background:#CCC;> 
 
<fieldset> 

<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
          // $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           //$error = "<label class='text-danger'>Enter email</label>";  
      }  
      else if(empty($_POST["gender"]))  
      {  
           //$error = "<label class='text-danger'>Enter gender</label>";  
      }  
	  else if(empty($_POST["uname"]))  
      {  
           //$error = "<label class='text-danger'>Enter username</label>";  
      }  
	  else if(empty($_POST["npass"]))  
      { 
 
           $error = "<label class='text-danger'>Enter password</label>";  
      }  
	  else if(empty($_POST["rnpass"]))  
      {  
           $error = "<label class='text-danger'>Enter confirm password</label>";  
      }  else if($_POST["npass"]!=$_POST["rnpass"])  
      {  
           $passerror = "<label class='text-danger'>NOT match</label>";  
      }  
      else  
      {  
           
                require_once('../controller/userRegis.php') ;
             
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title> Registration</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
	  <?php include "../view/include2.php"; ?>
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Submit your Data for registration </h3><br /> 



                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }

$nameErr=$emailErr=$unameErr=$dobErr=$genderErr=$npassErr =$rnpassErr ="";
$name=$email=$uname=$dobErr=$gender=$npass=$rnpass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  } 

 if (empty($_POST["uname"])) {
    $unameErr = "Username is required";
  } else {
    $uname = test_input($_POST["uname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $unameErr = "Only letters and white space allowed";
    }
  }

if (empty($_POST["dob"])) {
    $dobErr = " DOB Required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


 
  if (empty($_POST["npass"])) {
    $npassErr = "Password is required";
  } else {
    $npass = test_input($_POST["npass"]);
    if (!preg_match("/^[a-zA-Z-0-9_]{8,}[@#$%]{1,}/",$npass)) {
      $npassErr = "At least 8 character and must one(@#$%) special character  required";
    }
  } 
  if (empty($_POST["rnpass"])) {
    $rnpassErr = "Password is required";
  } else {
    $rnpass = test_input($_POST["rnpass"]);
    if (!preg_match("/^[a-zA-Z-0-9_]{8,}[@#$%]{1,}/",$rnpass)) {
      $rnpassErr = "At least 8 character and must one(@#$%) special character  required";
    }
  } 
 

    if($_POST["npass"]!=$_POST["rnpass"]){
		$passerror="not match";
  $npassErr="new pass and retype pass should be same";}
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
		 
                     ?> 
				 
                     <br />  
									 
                     <label>Name</label>  
                     <input type="text" name="name" placeholder="Enter name" class="form-control" />  
					 <span class="error">* <?php echo $nameErr;?></span> <br><br>
					 
					  <label>Email</label>  
                     <input type="text" name="email" placeholder="Enter email address" class="form-control" /> 
					 <span class="error">* <?php echo $emailErr;?></span> <br><br>
					 
					 <label>Username</label>  
					 <input type="text" name="uname" placeholder="Enter username" class="form-control" /> 
					<span class="error">* <?php echo $unameErr;?></span> <br><br>
						 
					 
                     <label>Gender</label> <br />
					 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female &nbsp
                     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male &nbsp
                     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  &nbsp <br />
					  <span class="error">* <?php echo $genderErr;?></span> <br><br>
                    
					 <label>Date Of Birth</label>  
                     <input type="date" name="dob" class="form-control" />
					 <span class="error">* <?php echo $dobErr;?></span> <br><br>
					  
			        <label>Password</label>  
					  <input type="password" name="npass" placeholder="Enter new password" value="<?php echo $npass;?>" class="form-control" />
                     <span class="error">* <?php echo $npassErr;?></span> <br><br>
                    <br><br>
					
  					 <label>Confirm Password</label>  
                  <input type="password" name="rnpass" placeholder="Enter confirm password" value="<?php echo $rnpass;?>" class="form-control" />
                    <span class="error">* <?php echo $rnpassErr;?></span> <br><br>
                  <br><br>
					 
					 
                     <input type="submit" name="submit" value="Register" class="btn btn-info" /> &nbsp <input type="reset" value="Reset" name="Reset" class="btn btn-inf" /> <br>                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?> 
					 <br>&nbsp
					<a href="../controller/login.php">Already have account?</a> &nbsp &nbsp &nbsp

					</form> 
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
</fieldset>
</body>
</html>

