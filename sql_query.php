<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "basketball_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the SQL query from the form input
    $sql_query = $_POST['sql_query'];

    // Sanitize the input to prevent SQL injection
    $sql_query = trim($sql_query);
    $sql_query = stripslashes($sql_query);
    $sql_query = htmlspecialchars($sql_query);

    // Execute the query and handle the result
    if ($result = $conn->query($sql_query)) {
        // For SELECT queries, output the results
        if (preg_match("/^SELECT/i", $sql_query)) {
            echo "<h2>Query Results:</h2>";
            echo "<table border='1'><tr>";
            while ($field_info = $result->fetch_field()) {
                echo "<th>{$field_info->name}</th>";
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Query executed successfully.";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>