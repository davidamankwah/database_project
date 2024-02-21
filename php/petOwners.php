<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Php EMP Table Example</title>
	</head>	
	<body>
		<h4>Select petOwner_id,first_Name,last_Name, address,pet, ownerImage, Picture_Path  from petOwner</h4>
		<table border="1">		
			<tr>
				<td><h2>petOwner_id</h2></td>
				<td><h2>first_Name</h2></td>
				<td><h2>last_Name</h2></td>
				<td><h2>address</h2></td>
				<td><h2>pet</h2></td>
				<td><h2>ownerImage</h2></td>
				<td><h2>Picture_Path</h2></td>
			</tr>
		<?php			
				
				$host = "localhost";
				$user = "root"; 
				$password = ""; 
				$database = "VetCareDB";				
				
				$query = "Select petOwner_id, first_Name, last_Name, address,pet, ownerImage, Picture_Path from petOwner";
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
					echo "<td><h2>" .$row['petOwner_id'] . "</h2></td>";
					echo "<td><h2>" .$row['first_Name'] . "</h2></td>";
					echo "<td><h2>" .$row['last_Name'] . "</h2></td>";
					echo "<td><h2>" .$row['address'] . "</h2></td>";
					echo "<td><h2>" .$row['pet'] . "</h2></td>";
					echo "<td><h2><img src=image_petOwner.php?empno=".$row['petOwner_id']." width=80 height=80/></h2></td>";
					echo "<td><h2><img src=".$host.$row['Picture_Path'] . " width=60 height=60/></h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>