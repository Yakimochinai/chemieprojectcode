<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Results</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Database Results</h1>
    <?php
    require '../auth.php';
    
    // DATABASE 
    $host = "den1.mysql6.gear.host";
    $dbname = "situation";      // Database name
    $username = "situation";    // Database username
    $password = "aichem567.";     // Database password
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if($conn->connect_error){
        echo "FAILED to connect! <br />";
        die("Connection failed: " . $conn->connect_error);
    }

    // Extract PUT parameters
    parse_str(file_get_contents("php://input"), $putParams);
    $putval1 = $putParams['val1'] ?? null;
    $putval2 = $putParams['val2'] ?? null;
    echo 'PUT: val1 ' . $putval1 . ' val2 ' . $putval2 . " <br />";
    
    // Extract GET parameters
    $getval1 = $_GET['val1'] ?? null;
    $getval2 = $_GET['val2'] ?? null;
    echo 'GET: val1 ' . $getval1 . ' val2 ' . $getval2 . " <br />";
    
    // SQL for first table
    $sqlquery = "SELECT * FROM test";
    $result = $conn->query($sqlquery);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Val 1</th><th>Val 2</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["val1"]. "</td><td>" . $row["val2"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results for table 'test'";
    }

    // SQL for second table
    $sqlquery2 = "SELECT * FROM cdb_data";
    $result2 = $conn->query($sqlquery2);

    if ($result2->num_rows > 0) {
        echo "<h2>Table: cdb_data</h2>";
        echo "<table>";
        echo "<tr><th>Val 1</th><th>Val 2</th></tr>";
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            echo "<tr><td>" . $row2["val1"]. "</td><td>" . $row2["val2"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results for table 'cdb_data'";
    }

    $conn->close();
    ?>
</body>
</html>
