<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="../css/style.css">
    <title>Login </title>
	<style>

.error {color: #FF0000;
font-size:15px;

}
</style>	
</head>
<body style="background:#CCC;">

<?php include "../view/include2.php"; ?>
   <br><br><br>
   
                    
                    <div style= "text-align: center"> 
					<h3 class="text-center py-3">Login </h3>
					
<script type="text/javascript">
    function validate()
    {
    var uname = document.Login.uname.value;
    var npass = document.Login.npass.value;
 
    if (uname==null || uname=="")
    {
      alert("Username can't be Empty");
      return false;
    }
    else if (npass==null || npass=="")
    {
      alert("Password can't be Empty");
      return false;
    }
    }
</script>
					
					
					
					<?php 
					
                        if(@$_GET['*']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['*']  ?></div>  <br>                               
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>  <br>                              
                    <?php
                        }
                    ?>
                    
			
    <form name="Login" method="post" action="process.php" onsubmit="return validate();" >

                            <input type="text" name="uname" placeholder=" User Name" class="form-control mb-3">
							<span class="error">* <br><br>
                            <input type="password" name="npass" placeholder=" Password"  class="form-control mb-3">
							<span class="error">* <br><br>
                            <button class="btn btn-success mt-3" name="Login">Login</button>
							<br><br><br>
							<a href="../controller/registration.php">Create account</a> &nbsp &nbsp &nbsp
							<a href="../controller/forgot.php">Forgot password?</a>
							
                        </form>
                    </div>
              

</body>
</html>