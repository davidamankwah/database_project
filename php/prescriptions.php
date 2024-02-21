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
		<h4> select s.first_Name, s.last_Name, m.Name, m.price from staff s Inner Join medication m On s.staff_id = m.staff_id where m.price >13;</h4>
		<table border="1">		
			<tr>
				<td><h2>first_Name</h2></td>
				<td><h2>last_Name</h2></td>
				<td><h2>Name</h2></td>
				<td><h2>price</h2></td>
			</tr>
			<?php			
				
				$host = "Localhost";
				$user = "root"; 
				$password = ""; 
				$database = "VetCareDB";				
				
				$query = "select s.first_Name, s.last_Name, m.Name, m.price from staff s Inner Join medication m On s.staff_id = m.staff_id where m.price >13;";
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
					echo "<td><h2>" .$row['first_Name'] . "</h2></td>";
					echo "<td><h2>" .$row['last_Name'] . "</h2></td>";
					echo "<td><h2>" .$row['Name'] . "</h2></td>";
					echo "<td><h2>" .$row['price'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>