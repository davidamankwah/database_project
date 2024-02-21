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
		<h4>SELECT po.first_Name, po.last_Name, po.address, po.pet, a.name AS pet_name, a.breed, a.gender, ap.appointment_Date, ap.location, ap.diagnosis, ap.medication FROM PetOwner po JOIN animal a ON po.petOwner_id = a.petOwner_id JOIN appointment ap ON a.animal_id = ap.animal_id ORDER BY po.petOwner_id, ap.appointment_Date;</h4>
		<table border="1">		
			<tr>
				<td><h2>first_Name</h2></td>
				<td><h2>last_Name</h2></td>
				<td><h2>address</h2></td>
				<td><h2>pet</h2></td>
				<td><h2>pet_name</h2></td>
				<td><h2>breed</h2></td>
				<td><h2>gender</h2></td>
				<td><h2>appointment_Date</h2></td>
				<td><h2>location</h2></td>
				<td><h2>diagnosis</h2></td>
				<td><h2>medication</h2></td>
			</tr>
			<?php			
				$host = "Localhost";
				$user = "root"; 
				$password = "";
				$database = "VetCareDB";				
				
				$query = "SELECT po.first_Name, po.last_Name, po.address, po.pet, a.name AS pet_name, a.breed, a.gender, ap.appointment_Date, ap.location, ap.diagnosis, ap.medication FROM PetOwner po JOIN animal a ON po.petOwner_id = a.petOwner_id JOIN appointment ap ON a.animal_id = ap.animal_id ORDER BY po.petOwner_id, ap.appointment_Date;";
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
					echo "<td><h2>" .$row['address'] . "</h2></td>";
					echo "<td><h2>" .$row['pet'] . "</h2></td>";
					echo "<td><h2>" .$row['pet_name'] . "</h2></td>";
					echo "<td><h2>" .$row['breed'] . "</h2></td>";
					echo "<td><h2>" .$row['gender'] . "</h2></td>";
					echo "<td><h2>" .$row['appointment_Date'] . "</h2></td>";
					echo "<td><h2>" .$row['location'] . "</h2></td>";
					echo "<td><h2>" .$row['diagnosis'] . "</h2></td>";
					echo "<td><h2>" .$row['medication'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>