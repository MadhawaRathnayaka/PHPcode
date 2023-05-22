<?php
	/*
	 *	servername = "localhost"
	 *	username = "root"
	 *	password = " "

	 *	PHP code to check the connection to MYSQL Database. 
	 *	If the connection is successful print a message as “Connection Successful”, 
	 *	otherwise print a message as “Connection failed”.
	 */

	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connection successful";

	$conn->close();
?>
