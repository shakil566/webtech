<?php
 include "../view/include2.php";
    require_once('../view/wellcome.php');
    require_once('../db/userServices.php');
    $conn=getConnection();
    $User = $_SESSION["User"];
    $sucess=$error=$nameError=$emailError=$genderError=$dobError="";
    if(isset($_GET['message'])){
        if($_GET['message'] == 'sucess'){
			$sucess='updated.';
		}
        else if($_GET['message'] == 'all_empty'){
            $nameError="Name Empty!";
            $emailError="Email Empty!";
            $genderError="Gender Empty!";
            $dobError="Date of Birth Empty!";
        }
        else if($_GET['message'] == 'empty_name'){
			$nameError='Name empty!';
		}
		else if($_GET['message'] == 'empty_email'){
			$emailError='Email empty!';
		}
		else if($_GET['message'] == 'empty_gender'){
			$genderError='Gender empty!';
		}
		else if($_GET['message'] == 'empty_dob'){
			$dobError='Date of Birth empty!';
		}
		else if($_GET['message'] == 'error'){
			$error='Something went wrong!';
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body style="background:#CCC;>
    
      
        <td  align="center"width="60%">
        <form action="../controller/editProfileValidation.php" method="POST">
        <?php
            
            $userData = ["uname" => $_SESSION['User']];
            $data = getByUsername($userData);
           
            
        ?>
                  
                        <h1>EDIT PROFILE</h1>
                        <table align="center" height="100px">
                        <tr>
                            <td>Name</td>
                            <td>: <input type="text" name="name" value="<?=$data["name"]?>"> <span style="color:red"><?=$nameError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Email</td>
                            <td>: <input type="mail" name="email" value="<?=$data["email"]?>"> <span style="color:red"><?=$emailError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Gender</td>
                            <td>: <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="other">Other  <span style="color:red"><?=$genderError?></span></td>
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>: <input type="date" name="dob" value="<?=$data["dob"]?>">  <span style="color:red"><?=$dobError?></span></td>
                        </tr>
                        
                        
                      
                        </table>
						                           <br> <td><input type="submit" name="submit"> <span style="color:green"><?=$sucess;?></span><span style="color:red"><?=$error;?></span></td>

                 
                </form>
        </td>
    </tr>
    <tr>
        
            <?php include_once('../view/footer.php');?>
   
    </tr>
    </table>
</body>
</html>