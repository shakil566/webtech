<?php
    require_once('../model/header.php');
    if(isset($_POST['submit'])){
        require_once('../model/userServices.php');
        $User = $_SESSION["User"];
        if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['gender']) && empty($_POST['dob']))
        {
            header('location: ../view/editProfile.php?message=all_empty');
        }
        else if(empty($_POST['name']))
        {
            header('location: ../view/editProfile.php?message=empty_name');
        }
        else if(empty($_POST['email']))
        {
            header('location: ../view/editProfile.php?message=empty_email');
        }
        else if(empty($_POST['gender']))
        {
            header('location: ../view/editProfile.php?message=empty_gender');
        }
        else if(empty($_POST['dob']))
        {
            header('location: ../view/editProfile.php?message=empty_dob');
        }
        else {
            $userData= ["uname" => $uname, "name" => $_POST['name'], "email" =>  $_POST['email'], "gender" => $_POST['gender'], "dob" => $_POST['dob']];
            $status = updateProfile($userData);
            if($status){
                header('location: ../view/editProfile.php?message=sucess');
                $message="Profile Updated sucessfully.";
            }
            else  
                {  
                    header('location: ../view/editProfile.php?message=error');
                } 
        }
        
    }
    else  
    {  
        header('location: ../view/login.php');
    }
?>