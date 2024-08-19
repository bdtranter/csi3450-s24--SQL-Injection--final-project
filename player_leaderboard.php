<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basketball_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to get players ordered by points
$sql = $conn->prepare("SELECT PLAYER_FNAME, PLAYER_LNAME, PLAYER_POINTS, PLAYER_REBOUNDS, PLAYER_ASSISTS, PLAYER_FREETHROWS, PLAYER_STEALS, PLAYER_BLOCKS, PLAYER_POSITION
                      FROM player
                      ORDER BY PLAYER_POINTS DESC");

// Execute the query
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Leaderboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 style="text-align: center;">Player Leaderboard</h1>
<table class="leaderboard-table">
    <tr>
        <th>Rank</th>
        <th>Player First Name</th>
        <th>Player Last Name</th>
        <th>Points Scored</th>
        <th>Rebounds</th>
        <th>Assists</th>
        <th>Free Throws</th>
        <th>Steals</th>
        <th>Blocks</th>
        <th>Position</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $rank = 1;
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $rank++ . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_FNAME"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_LNAME"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_POINTS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_REBOUNDS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_ASSISTS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_FREETHROWS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_STEALS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_BLOCKS"]) . "</td>
                    <td>" . htmlspecialchars($row["PLAYER_POSITION"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No players found.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>