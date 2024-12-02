<?php
// Start session and check admin
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendanceapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filters from query parameters
$search = isset($_GET['search']) ? $_GET['search'] : '';
$dateFilter = isset($_GET['date']) ? $_GET['date'] : '';

// Build the SQL query with filters
$sql = "SELECT username, action, time FROM attendance WHERE username LIKE '%$search%'";

if (!empty($dateFilter)) {
    $sql .= " AND DATE(time) = '$dateFilter'";
}

$result = $conn->query($sql);

// Prepare the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="attendance_data.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Username', 'Action', 'Time']); // Column headers

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['username'], $row['action'], $row['time']]);
    }
}

fclose($output);
$conn->close();
exit();
?>
