<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter email</label>";  
      }  
      else if(empty($_POST["gender"]))  
      {  
           $error = "<label class='text-danger'>Enter gender</label>";  
      }  
	  else if(empty($_POST["uname"]))  
      {  
           $error = "<label class='text-danger'>Enter username</label>";  
      }  
	  else if(empty($_POST["npass"]))  
      {  
           $error = "<label class='text-danger'>Enter password</label>";  
      }  
	  else if(empty($_POST["rnpass"]))  
      {  
           $error = "<label class='text-danger'>Enter confirm password</label>";  
      }  
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'], 
					 'email'     =>     $_POST["email"] , 
                     'gender'          =>     $_POST["gender"],  
                     
                     'dob'               =>     $_POST['dob'],  
                     'uname'               =>     $_POST['uname'],  
                     'npass'               =>     $_POST['npass'],  

                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Append Data to JSON File using PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Append Data to JSON File</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }

$npassErr =$rnpassErr ="";
$npass=$rnpass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
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
                     <input type="text" name="name" placeholder="Enter name" class="form-control" /><br />  
					 
					  <label>Email</label>  
                     <input type="text" name="email" placeholder="Enter email address" class="form-control" /><br /> 
					 
					 <label>Username</label>  
					 <input type="text" name="uname" placeholder="Enter username" class="form-control" /><br /> 
					 
			        <label>Password</label>  
					  <input type="password" name="npass" placeholder="Enter new password" value="<?php echo $npass;?>" class="form-control" /><br />
                     <span class="error">* <?php echo $npassErr;?></span>
                    <br><br>
					
  					 <label>Confirm Password</label>  
                  <input type="password" name="rnpass" placeholder="Enter confirm password" value="<?php echo $rnpass;?>" class="form-control" /><br />
                    <span class="error">* <?php echo $rnpassErr;?></span>
                  <br><br>
						 
					 
                     <label>Gender</label> <br />
					 <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female &nbsp
                     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male &nbsp
                     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  &nbsp <br /><br />
					 
                    
					 <label>DOB</label>  
                     <input type="date" name="dob" class="form-control" /><br />
					 
                     <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  