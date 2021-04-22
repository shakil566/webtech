<?php 
require_once('../db/db.php');
session_start();
    if(isset($_POST['Login']))
    {
       
	   
	   if(empty($_POST['uname']) )
       {
            header("location:../controller/login.php?*=Username required " );
       }
	   else if(empty($_POST['npass']))
       {
            header("location:../controller/login.php?*=Password required");
       }
	   
       else
       {
            $query="select * from luser where uname='".$_POST['uname']."' and npass='".$_POST['npass']."'";
            $result=mysqli_query($conn,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['uname'];
                header("location:../view/bookinfo.php");
            }
            else
            {
                header("location:../controller/login.php?Invalid=  Enter correct Username and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>