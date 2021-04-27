<?php
$connect = mysqli_connect("localhost", "root", "", "library");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM fba 
	WHERE Name LIKE '%".$search."%'
	OR Authors LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM fba ORDER BY Id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Books Name</th>
							<th>Authors</th>
							<th>Edition</th>
							<th>Status</th>
							<th>Quantity</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Name"].'</td>
				<td>'.$row["Authors"].'</td>
				<td>'.$row["Edition"].'</td>
				<td>'.$row["Status"].'</td>
				<td>'.$row["Quantity"].'</td> 
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>