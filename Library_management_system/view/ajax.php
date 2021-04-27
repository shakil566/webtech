<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search books</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<style>

div {
  margin-left: 200px;
  padding: 1px 15px;
font-size:20px;
background:#CCC;
}
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 20px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
</style>

<body style=" background:#CCC";>
<?php include "../view/include2.php"; ?>
		<?php include "../model/header.php"; ?><br />
<div>
      <input style="padding: 10px 150px; margin-left: 310px;" type="text" class="form-control" id="search" placeholder=" Search books by name">
      <table class="table table-hover">
      
      <tbody id="output">
        
      </tbody>
    </table>
   <div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'../controller/bsearch_val.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>