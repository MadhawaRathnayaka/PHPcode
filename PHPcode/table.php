<?php
    /*
     * create a table named "guests", with seven columns: 
     * "guestname", "address", "email", "phone_no”,”room_type”, “arri_date”, ““dept_date”. 
     * If the table is created successfully print a message as “Table guest created successfully”, 
     * otherwise print a message as “Error creating table”. Save this code as “table.php”.
     * Use the following information when you create the fields.
     
     * Field        Data type   Constrains / Other Conditions 
     * guestname    VARCHAR     Maximum 40 characters 
     * address      VARCHAR     Maximum 60 characters 
     * email        VARCHAR     Maximum 50 characters 
     * phone_no     VARCHAR     Maximum 20 characters 
     * room_type    VARCHAR     Maximum 15 characters 
     * arri_date    TIMESTAMP   - 
     * dept_date    TIMESTAMP   -
    */

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
?>
