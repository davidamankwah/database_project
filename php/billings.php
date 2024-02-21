<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Php Picture Table Example</title>
	</head>	
	<body>
		<h4>select m.Name, m.price, b.pay_Method, b.billing_id from medication m Inner join billing b ON m.medication_id = b.medication_id;</h4>
		<table border="1">		
			<tr>
				<td><h2>Name</h2></td>
				<td><h2>price</h2></td>
				<td><h2>pay_Method</h2></td>
				<td><h2>billing_id</h2></td>
			</tr>
			<?php			
			
				$host = "Localhost";
				$user = "root"; 
				$password = ""; 
				$database = "VetCareDB";				
				
				$query = "select m.Name, m.price, b.pay_Method, b.billing_id from medication m Inner join billing b ON m.medication_id = b.medication_id;";
				//Connect to the database
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				//Set connection to UTF-8
				mysqli_query($connect,"SET NAMES utf8");
				//Select data
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['Name'] . "</h2></td>";
					echo "<td><h2>" .$row['price'] . "</h2></td>";
					echo "<td><h2>" .$row['pay_Method'] . "</h2></td>";
					echo "<td><h2>" .$row['billing_id'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>