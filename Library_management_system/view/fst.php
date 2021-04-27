<!DOCTYPE html>
<html>
<head>
	<title>FST</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
h2 {
	color: blue;

}
</style>

<?php include "../view/include2.php"; ?>

<body style=" background:#CCC";>
	<body>
	
	<?php include "../model/header.php"; ?>
	
	<div>
	<h2 align="center">Faculty of Science and Technology</h2><br />
		
		
		
		<table>
	<tr id="header">
		<th>Books Name</th>
		<th>Authors name</th>
		<th>Edition</th>
		<th>Status</th>
		<th>Quantity</th>
	</tr>
	
	<?php
		require_once('../model/db.php');
		$sql = "SELECT * FROM fst";
		$result = $conn -> query($sql);
		
		if($result-> num_rows > 0)
		{
			while($row = $result-> fetch_assoc())
			{
				echo "<tr>
				<td>".$row["Name"]."</td>
				<td>".$row["Authors"]."</td>
				<td>".$row["Edition"]."</td>
				<td>".$row["Status"]."</td>
				<td>".$row["Quantity"]."</td>
				</tr>";
			}
			echo"</table>";
		}
		else
		{
			echo "0 result";
		}
		$conn-> close();
	?>
	
	

</table>
		
		
		
		<br /><br />
		 <?php include "../model/footer.php"; ?>
		</div>
	</body>
</html>


