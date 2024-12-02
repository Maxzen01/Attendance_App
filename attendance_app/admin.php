<?php
// Start session and check if the user is an admin
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
    header("Location: login.php");
    exit();
}

// Database connection (db.php)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendanceapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle page-specific operations (Dashboard, View Attendance, Add Employee, etc.)
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default to dashboard

// Fetch stats for the dashboard
$userCountResult = $conn->query("SELECT COUNT(DISTINCT username) AS total FROM signup");
$userCount = $userCountResult->fetch_assoc()['total'];

$attendanceCountResult = $conn->query("SELECT COUNT(*) AS total FROM attendance");
$attendanceCount = $attendanceCountResult->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 200px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar ul li a:hover {
            background-color: #34495e;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
			text-align: center;
        }
        .stat-box {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 30px;
            margin-right: 20px;
            width: 200px;
            text-align: center;
            border-radius: 20px; /* Curved container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .stat-box h3 {
            margin: 0;
        }
        .stat-box p {
            font-size: 24px;
        }
        .stat-box-container {
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4c9ff5;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .logout-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 10px 20px;
            background-color: #ff4d4d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #d43f3f;
        }
        .form-container {
    max-width: 600px;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px; /* Curved corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    margin-top: 50px; /* Adds space above the form */
}

.form-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-container input,
.form-container select,
.form-container button {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-container button {
    background-color: #3498db;
    color: white;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #2980b9;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table th, table td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}
table th {
    background-color: #4c9ff5;
    color: white;
}
table tr:nth-child(even) {
    background-color: #f9f9f9;
}
table tr:hover {
    background-color: #f1f1f1;
}


    </style>
</head>
<body>

<div class="sidebar">
    <ul>
        <li><a href="?page=dashboard">Dashboard</a></li>
        <li><a href="?page=view_attendance">View Attendance</a></li>
        <li><a href="?page=add_employee">Add Employee</a></li>
        <li><a href="?page=employee_details">Employee Details</a></li>
        <li><a href="logout.php" class="logout-btn">Logout</a></li>
        

    </ul>
</div>

<div class="main-content">
    <?php if ($page == 'dashboard') { ?>
        <h2>Admin Dashboard</h2>

        <div class="stat-box-container">
            <div class="stat-box">
                <h3>Total Employees</h3>
                <p><?php echo $userCount; ?></p>
            </div>

            <div class="stat-box">
                <h3>Total Attendance Records</h3>
                <p><?php echo $attendanceCount; ?></p>
            </div>
        </div>

    <?php } elseif ($page == 'view_attendance') { ?>
        
        <h2>View Attendance</h2>

        <?php
        // Handle search and filter queries
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $dateFilter = isset($_GET['date']) ? $_GET['date'] : '';

        // Modify SQL query for search and date filters
        $sql = "SELECT * FROM attendance WHERE username LIKE '%$search%'";
        if (!empty($dateFilter)) {
            $sql .= " AND DATE(time) = '$dateFilter'";
        }
        $sql .= " LIMIT 20"; // Add pagination logic here if needed
        $result = $conn->query($sql);
        ?>

        <form method="GET">
            <input type="hidden" name="page" value="view_attendance">
            <input type="text" name="search" placeholder="Search by username..." value="<?php echo htmlspecialchars($search); ?>">
            <input type="date" name="date" value="<?php echo htmlspecialchars($dateFilter); ?>">
            <button type="submit">Search</button>
        </form>

        <a href="download.php?search=<?php echo urlencode($search); ?>&date=<?php echo urlencode($dateFilter); ?>" 
           class="logout-btn" style="background-color: #28a745; width: 200px;">
            Download Data
        </a>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
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
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['action']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['photo_url']) . "' alt='User Photo' width='50'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php } elseif ($page == 'employee_details') { ?>
    <h2>Employee Details</h2>
    <?php
    // Fetch all employee details
    $sql = "SELECT username, email, role FROM signup";
    $result = $conn->query($sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No employees found.</td></tr>";
            }
            ?>
        </tbody>
    </table>



        <a href="download.php" class="logout-btn" style="background-color: #28a745; width: 200px;">Download Data</a>
        
        <?php } elseif ($page == 'add_employee') { ?>
    <h2>Add New Employee</h2>

    <div class="form-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $role = $_POST['role'];

            $sql = "INSERT INTO signup (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>New employee added successfully!</p>";
            } else {
                echo "<p>Error: " . $conn->error . "</p>";
            }
        }
        ?>

        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="role">Role:</label>
            <select name="role">
                <option value="Employee">Employee</option>
                <option value="Manager">Manager</option>
                <option value="Admin">Admin</option>
            </select>

            <button type="submit">Add Employee</button>
        </form>
    </div>
    <?php } ?>


</div>

</body>
</html>

<?php
$conn->close();
?>
