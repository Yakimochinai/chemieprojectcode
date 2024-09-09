<?php
$servername = "den1.mysql6.gear.host";
$username = "situation";
$password = "aichem567.";
$dbname = "situation";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    echo "Database connection failed. Please try again later.";
}
?>

