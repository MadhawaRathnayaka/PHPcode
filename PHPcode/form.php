<!DOCTYPE html>
<html>
	<head>
		<style>
			.body
			{
				border: 2px solid blue;
				padding: 10px;
				width: 350px;
				padding-top: 0px;
			}
			.add
			{
				margin-left: 30px;
				margin-right: 40px;
			}
		</style>
	</head>

	<body class="body">
		<form method="post" action="table.php" class="form">
			<h3>Hotel Registration Form</h3>

			<table>
				<tr>
					<td><label name="guestName">Guest Name : </label></td>
					<td><input type="text" name="guestName" id="guestName"/></td>
				</tr>
				
				<tr>
					<td><label name="address">Address : </label></td>
					<td><input type="text" name="address" id="address"/></td>
				</tr>
				
				<tr>
					<td><label name="email">E-mail : </label></td>
					<td><input type="text" name="email" /></td>
				</tr>
				
				<tr>
					<td><label name="phoneNo">Phone No : </label></td>
					<td><input type="text" name="phoneNo""/></td>
				</tr>
				
				<tr>
					<td><label name="roomType">Room Type : </label></td>
					<td><select name="room" >
							<option value="">--Please select a room type--</option>
							<option value="single">Single Room</option>
							<option value="double">Double Room</option>
							<option value="triple">Triple</option>
							<option value="quard">Guard</option>
							<option value="queen">Queen</option>
							<option value="king">King</option>
							<option value="twin">Twin</option>
						</select></td>
				</tr>
				
				<tr>
					<td><label name="arrival">Arrival Date : </label></td>
					<td><input type="date" name="arrival" /></td>
				</tr>
				
				<tr>
					<td><label name="departure">Departure Date : </label></td>
					<td><input type="date" name="departure" /></td>
				</tr>
			</table>
			
			<input type="submit" name="add" id="add" value="Add" class="add"/>
			<input type="reset" name="clear" id="clear" value="Clear"/>
			<input type="submit" name="search" id="search" value="Search"/>
			<input type="submit" name="update" id="update" value="Update"/>
			<input type="submit" name="delete" id="delete" value="Delete"/>
		</form>
	
    </body>
</html>

<?php	
	/*
	 *	Five buttons such as Add, Clear, Search, Update and Delete. 
	 *	When click, these buttons must work with appropriate functions with PHP post method.
	 */

	// Add button
	if(isset($_POST['add']))
	{
		// Create connection
		$conn = new mysqli("localhost", "root", "", "guestDB");

		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connection successful<br>";

		// Create table
		$sql = "CREATE TABLE guestTable (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		guestName VARCHAR(30) NOT NULL,
		address VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		phoneNo VARCHAR(30),
		roomType VARCHAR(30),
		arrivalDate VARCHAR(30),
		departureDate VARCHAR(30)
		)";

		if ($conn->query($sql) === TRUE)
		{
			echo "Table guestTable created successfully";
		}
		else
		{
			echo "Error creating table: " . $conn->error;
		}

		// Insert data
		$sql = "INSERT INTO guestTable (guestName, address, email, phoneNo, roomType, arrivalDate, departureDate)
		VALUES ('".$_POST["guestName"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["phoneNo"]."','".$_POST["room"]."','".$_POST["arrival"]."','".$_POST["departure"]."')";

		if ($conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}

	// Clear button
	// working fine with html reset type input

	// Search button
	if(isset($_POST['search']))
	{
		// Create connection
		$conn = new mysqli("localhost", "root", "", "guestDB");

		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connection successful<br>";

		// Search table
		$sql = "SELECT * FROM guestTable";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			// output data of each row
			echo "<table border='1'>";
			echo "<tr><th>ID</th><th>Guest Name</th><th>Address</th><th>E-mail</th><th>Phone No</th><th>Room Type</th><th>Arrival Date</th><th>Departure Date</th></tr>";
			while($row = $result->fetch_assoc())
			{
				echo "<tr><td>".$row["id"]."</td><td>".$row["guestName"]."</td><td>".$row["address"]."</td><td>".$row["email"]."</td><td>".$row["phoneNo"]."</td><td>".$row["roomType"]."</td><td>".$row["arrivalDate"]."</td><td>".$row["departureDate"]."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "0 results";
		}

		$conn->close();
	}

	// Update button
	if(isset($_POST['update']))
	{
		// Create connection
		$conn = new mysqli("localhost", "root", "", "guestDB");

		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		// echo "Connection successful<br>";

		// Update table
		$sql = "UPDATE guestTable SET guestName='$_POST[guestName]', address='$_POST[address]', email='$_POST[email]', phoneNo='$_POST[phoneNo]', roomType='$_POST[room]', arrivalDate='$_POST[arrival]', departureDate='$_POST[departure]' WHERE id='$_POST[id]'";

		if ($conn->query($sql) === TRUE)
		{
			echo "Record updated successfully";
		}
		else
		{
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}

	// Delete button
	if(isset($_POST['delete']))
	{
		// Create connection
		$conn = new mysqli("localhost", "root", "", "guestDB");

		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connection successful<br>";

		// Delete table
		$sql = "DELETE FROM guestTable WHERE id='$_POST[id]'";

		if ($conn->query($sql) === TRUE)
		{
			echo "Record deleted successfully";
		}
		else
		{
			echo "Error deleting record: " . $conn->error;
		}

		$conn->close();
	}

?>