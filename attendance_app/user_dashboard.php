<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Please log in to access your dashboard.";
    header("Location: login.php"); // Redirect to login page
    exit();
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "attendanceapp");

if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed. Please try again later.";
    header("Location: login.php"); // Redirect with an error message
    exit();
}

// Get attendance data for the logged-in user
$username = $_SESSION['username'];
$sql = "SELECT * FROM attendance WHERE username = ?";
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
    <title>User Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        .message {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: center;
            font-size: 16px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4c9ff5;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styles */
        .logout-btn, .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            background-color: #4c9ff5;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover, .back-btn:hover {
            background-color: #357ab7;
        }

        /* Photo Column */
        .photo img {
            max-width: 100px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Display Messages -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="message error">
                <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="message success">
                <?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
        <h3>Your Login/Logout Activities</h3>
        
        <!-- Display the user's attendance data in a table -->
        <table>
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
                        echo "<td>" . htmlspecialchars($row['action']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                        echo "<td class='photo'>";
                        if (!empty($row['photo_url'])) {
                            echo "<img src='" . htmlspecialchars($row['photo_url']) . "' alt='Photo'>";
                        } else {
                            echo "No photo";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No attendance records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
