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

// Prepare the SQL statements for three teams
$teams = ["Oakland University", "University of Michigan", "Michigan State University", "University of Detroit Mercy"];
$results = [];

foreach ($teams as $team) {
    $sql = $conn->prepare("SELECT PLAYER_FNAME, PLAYER_LNAME, PLAYER_POINTS, PLAYER_REBOUNDS, PLAYER_ASSISTS, PLAYER_FREETHROWS, PLAYER_STEALS, PLAYER_BLOCKS, PLAYER_POSITION
                           FROM player
                           WHERE TEAM_NAME = ?
                           ORDER BY PLAYER_LNAME ASC");
    $sql->bind_param("s", $team);
    $sql->execute();
    $results[$team] = $sql->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Rosters</title>
    <style>
        h2 {
            margin-bottom: 30px;
            font-size: 1.9em;
            color: #0044cc;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .team-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .team-section {
            margin: 20px;
            text-align: center;
            width: 45%;
        }
        .team-table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .team-table th, .team-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .team-table th {
            background-color: #0033a0; /* Blue background */
            color: white;
        }
        .team-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .team-table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="team-container">
    <?php foreach ($results as $team => $result): ?>
        <div class="team-section">
            <h2><?php echo htmlspecialchars($team); ?></h2>
            <table class="team-table">
                <tr>
                    <th>Player First Name</th>
                    <th>Player Last Name</th>
                    <th>Player Position</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["PLAYER_FNAME"]); ?></td>
                            <td><?php echo htmlspecialchars($row["PLAYER_LNAME"]); ?></td>
                            <td><?php echo htmlspecialchars($row["PLAYER_POSITION"]); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No players found for this team.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>