<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Default for local XAMPP
$password = ""; // Default for local XAMPP
$database = "water_submetering"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waterType = $_POST['waterType'];
    $startReading = $_POST['start_reading'];
    $endReading = $_POST['end_reading'];
    $totalUsed = $_POST['total_used'];
    $cost = $_POST['cost'];

    // Insert data into the database
    $sql = "INSERT INTO meter_readings (water_type, start_reading, end_reading, total_used, cost) 
            VALUES ('$waterType', '$startReading', '$endReading', '$totalUsed', '$cost')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>