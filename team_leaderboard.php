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

// SQL query to rank teams based on total points and games won
$sql = $conn->prepare("
    SELECT t.TEAM_NAME, t.TEAM_WINS,
           SUM(p.PLAYER_POINTS) AS TOTAL_POINTS,
           SUM(p.PLAYER_REBOUNDS) AS TOTAL_REBOUNDS,
           SUM(p.PLAYER_ASSISTS) AS TOTAL_ASSISTS,
           SUM(p.PLAYER_FREETHROWS) AS TOTAL_FREETHROWS,
           SUM(p.PLAYER_STEALS) AS TOTAL_STEALS,
           SUM(p.PLAYER_BLOCKS) AS TOTAL_BLOCKS
    FROM team t
    JOIN player p ON t.TEAM_NAME = p.TEAM_NAME
    GROUP BY t.TEAM_NAME, t.TEAM_WINS
    ORDER BY t.TEAM_WINS DESC, TOTAL_POINTS DESC");

// Execute the query
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Leaderboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 style="text-align: center;">Team Leaderboard</h1>
<table class="leaderboard-table">
    <tr>
        <th>Rank</th>
        <th>Team Name</th>
        <th>Games Won</th>
        <th>Total Points</th>
        <th>Total Rebounds</th>
        <th>Total Assists</th>
        <th>Total Free Throws</th>
        <th>Total Steals</th>
        <th>Total Blocks</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $rank = 1;
        // Output data for each team
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $rank++ . "</td>
                    <td>" . htmlspecialchars($row["TEAM_NAME"]) . "</td>
                    <td>" . htmlspecialchars($row["TEAM_WINS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_POINTS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_REBOUNDS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_ASSISTS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_FREETHROWS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_STEALS"]) . "</td>
                    <td>" . htmlspecialchars($row["TOTAL_BLOCKS"]) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No teams found.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>