<?php
// user_attendance.php
session_start();

// Ensure that only admins can access this page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Get the selected username from the GET request
if (!isset($_GET['username'])) {
    echo "No username provided.";
    exit();
}

$username = $_GET['username'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "attendanceapp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the attendance records for the selected user
$sql = "SELECT * FROM attendance WHERE username = ? ORDER BY time DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username; ?>'s Attendance</title>
</head>
<body>
    <h2>Attendance for <?php echo $username; ?></h2>
    <table border="1">
        <thead>
            <tr>
                <th>Action</th>
                <th>Time</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['action'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td><img src='" . $row['photo_url'] . "' width='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No attendance records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    <p><a href="admin.php">Back to Admin Dashboard</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
