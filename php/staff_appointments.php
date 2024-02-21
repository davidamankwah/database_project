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
		<h4>select a.name, a.breed, ap.appointment_id, ap.appointment_Date,ap.location,s.address,s.first_Name,s.last_Name from animal a Inner Join appointment ap On a.animal_id = ap.animal_id Inner join staff s On ap.appointment_id = s.appointment_id;</h4>
		<table border="1">		
			<tr>
				<td><h2>name</h2></td>
				<td><h2>breed</h2></td>
				<td><h2>appointment_id</h2></td>
				<td><h2>appointment_Date</h2></td>
				<td><h2>location</h2></td>
				<td><h2>address</h2></td>
				<td><h2>first_Name</h2></td>
				<td><h2>last_Name</h2></td>
			</tr>
			<?php			
				
				$host = "Localhost";
				$user = "root"; 
				$password = ""; 
				$database = "VetCareDB";				
				
				$query = "select a.name, a.breed, ap.appointment_id, ap.appointment_Date,ap.location,s.address,s.first_Name,s.last_Name from animal a Inner Join appointment ap On a.animal_id = ap.animal_id Inner join staff s On ap.appointment_id = s.appointment_id;";
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
					echo "<td><h2>" .$row['name'] . "</h2></td>";
					echo "<td><h2>" .$row['breed'] . "</h2></td>";
					echo "<td><h2>" .$row['appointment_id'] . "</h2></td>";
					echo "<td><h2>" .$row['appointment_Date'] . "</h2></td>";
					echo "<td><h2>" .$row['location'] . "</h2></td>";
					echo "<td><h2>" .$row['address'] . "</h2></td>";
					echo "<td><h2>" .$row['first_Name'] . "</h2></td>";
					echo "<td><h2>" .$row['last_Name'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>