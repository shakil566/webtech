<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;

}

.header {
	text-align:center;
	  font-size:20px;
   padding: 25px;
  background: grey;
  color: #f1f1f1;
}

.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>
</head>
<body>


<div class="header" id="myHeader">
 
  <?php
    session_start();

    if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . $_SESSION['User']; 
        echo '<a href="../controller/logout.php?logout"><br>  Logout</a>'; 
		//echo '<a href="../view/editProfile.php"><br>  Edit profile</a>';
    }
    else
    {
        header("location:../controller/login.php");
    }

?>
 
  
</div>


<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>