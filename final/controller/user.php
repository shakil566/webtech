<!DOCTYPE html>
<html>
<head>
	<title>User</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Information</title>
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

<?php include "../view/include2.php"; ?>

<body style=" background:#CCC";>
<div>
<h1>User Information</h1>
<hr>

<table>
	<tr id="header">
		<th>Name</th>
		<th>Username</th>
		<th>Gender</th>
		<th>Email</th>
		<th>Date of Birth</th>
	</tr>
	
	<?php
		require_once('../db/db.php');
		$sql = "SELECT name, uname, gender, email ,dob FROM luser";
		$result = $conn -> query($sql);
		
		if($result-> num_rows > 0)
		{
			while($row = $result-> fetch_assoc())
			{
				echo "<tr>
				<td>".$row["name"]."</td>
				<td>".$row["uname"]."</td>
				<td>".$row["gender"]."</td>
				<td>".$row["email"]."</td>
				<td>".$row["dob"]."</td>
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

	<br><br>
 <?php include "../view/footer.php"; ?>

<div/>
 </body>

</html>