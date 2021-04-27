<?php


$output = '';
$conn = mysqli_connect("localhost", "root", "", "library");
$sql = "SELECT * FROM books WHERE Name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	
	
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Books Name</th>
							<th>Authors</th>
							<th>Edition</th>
							<th>Status</th>
							<th>Quantity</th>
							<th>Department</th>
						</tr>';
	
	while ($row=mysqli_fetch_assoc($result)) {
				$output .= '
			<tr>
				<td>'.$row["Name"].'</td>
				<td>'.$row["Authors"].'</td>
				<td>'.$row["Edition"].'</td>
				<td>'.$row["Status"].'</td>
				<td>'.$row["Quantity"].'</td>
				<td>'.$row["Department"].'</td>
			</tr>
		';
	}
		echo $output;
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>
