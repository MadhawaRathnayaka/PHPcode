<?php
	/*
 	 *	servername = "localhost"
	 *	username = "root"
	 *	password = " "

	 *	Write appropriate PHP code to create a database called “guestDB”.
	 *	If the database is created successfully print a message as “Database created successfully”, 
	 *	otherwise print a message as “Error creating database”.
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
	echo "Connection successful<br>";

	// Create database
	$sql = "CREATE DATABASE guestDB";
	if ($conn->query($sql) === TRUE)
	{
		echo "Database created successfully";
	}
	else
	{
		echo "Error creating database: " . $conn->error;
	}

	$conn->close();
?>