<?php
    require_once('../db/connection.php');

    
    function getByUsername($userData){
        $conn=getConnection(); 
        $sql = "select * from luser where uname='{$userData['uname']}'";
        $result = mysqli_query($conn, $sql);
        $userData = mysqli_fetch_assoc($result);
        if($userData > 0){
            return $userData;
        }
        else {
            return false;
        }
    }
   

    function updateProfile($userData){
        $conn=getConnection();
       
        $sql = "update luser SET 
                                name='{$userData['name']}', 
                                email='{$userData['email']}', 
                                gender='{$userData['gender']}', 
                                dob='{$userData['dob']}' 
                            WHERE uname='{$userData['uname']}'";
        $result = mysqli_query($conn, $sql);
        
        if($userData > 0){
            return  true;
        }
        else {
            return false;
        }
    }

    function insertUser($userData){
      
        $conn = getConnection();
		$sql = "insert into luser values(
                                '{$userData['uname']}', 
                                '{$userData['name']}', 
                                '{$userData['email']}',
                                '{$userData['npass']}', 
                                '{$userData['gender']}', 
                                '{$userData['dob']}'
                                )";
		$result = mysqli_query($conn, $sql);
	
		if($result){
			return true; 
		}else{
			return false;
		}
        
    }
            
?>

 