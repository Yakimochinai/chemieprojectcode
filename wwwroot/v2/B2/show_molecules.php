<?php
header('Content-Type: application/json');

// Database connection details
$servername = "den1.mysql6.gear.host";
$username = "situation";
$password = "aichem567.";
$dbname = "situation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all molecule data from the database
$sql = "SELECT * FROM b2_molecules";
$result = $conn->query($sql);

$molecules = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $molecules[] = $row;
    }
} else {
    $molecules = [];
}

$conn->close();

// Output JSON
echo json_encode($molecules);
?>
