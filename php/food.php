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
		<h4>Select food_id,Name,supplier,food_size,price,quantity_Stock,animal_id from food where quantity_Stock < 60 ORDER by food_size</h4>
		<table border="1">		
			<tr>
				<td><h2>food_id</h2></td>
				<td><h2>Name</h2></td>
				<td><h2>supplier</h2></td>
				<td><h2>food_size</h2></td>
				<td><h2>price</h2></td>
				<td><h2>quantity_Stock</h2></td>
				<td><h2>animal_id</h2></td>
			</tr>
			<?php			
				
				$host = "Localhost";
				$user = "root"; 
				$password = "";
				$database = "VetCareDB";				
				
				$query = "Select food_id,Name,supplier,food_size,price,quantity_Stock,animal_id from food where quantity_Stock <60 ORDER by food_size";
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
					echo "<td><h2>" .$row['food_id'] . "</h2></td>";
					echo "<td><h2>" .$row['Name'] . "</h2></td>";
					echo "<td><h2>" .$row['supplier'] . "</h2></td>";
					echo "<td><h2>" .$row['food_size'] . "</h2></td>";
					echo "<td><h2>" .$row['price'] . "</h2></td>";
					echo "<td><h2>" .$row['quantity_Stock'] . "</h2></td>";
					echo "<td><h2>" .$row['animal_id'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>