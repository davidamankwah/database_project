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
		<h4>select f.name AS food_item, m.name AS medication, CONCAT('€', FORMAT(b.total, 2)) AS total from food f inner join billing b on f.food_id=b.food_id inner join medication m on m.medication_id=b.medication_id where b.total > 27 AND f.price > 8 ORDER BY b.pay_Method ASC;</h4>
		<table border="1">		
			<tr>
				<td><h2>food_item</h2></td>
				<td><h2>medication</h2></td>
				<td><h2>total cost</h2></td>
			</tr>
			<?php			
			
				$host = "Localhost";
				$user = "root"; 
				$password = ""; 
				$database = "VetCareDB";				
				
				$query = "select f.name AS food_item, m.name AS medication, CONCAT('€', FORMAT(b.total, 2)) AS total from food f inner join billing b on f.food_id=b.food_id inner join medication m on m.medication_id=b.medication_id where b.total > 27 AND f.price > 8 ORDER BY b.pay_Method ASC;";
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
					echo "<td><h2>" .$row['food_item'] . "</h2></td>";
					echo "<td><h2>" .$row['medication'] . "</h2></td>";
					echo "<td><h2>" .$row['total'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>