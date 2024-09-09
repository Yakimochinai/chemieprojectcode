<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script src="https://cdn.plot.ly/plotly-2.27.0.min.js" charset="utf-8"></script>
</head>
<body>
    <div id="chart"></div>  

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
            die("". $conn->connect_error);
        }

        // SQL
        $sqlquery = "SELECT * FROM test";
        $result = $conn->query($sqlquery);

        $chartData = [
            'x' => [],
            'y' => []
        ];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $chartData['x'][] = $row["val1"];
                $chartData['y'][] = $row["val2"];
            }
        }

        // Close connection
        $conn->close();
    ?>

    <script>
        // Your PHP-generated data here
        var data = [
            {
                x: <?php echo json_encode($chartData['x']); ?>,
                y: <?php echo json_encode($chartData['y']); ?>,
                type: 'bar'
            }
        ];

        // Layout configuration (optional)
        var layout = {
            title: 'Bar Chart Example with Database'
        };

        // Create and display the chart
        Plotly.newPlot('chart', data, layout);
    </script>
</body>
</html>
