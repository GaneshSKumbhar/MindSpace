<?php
session_start();
// Ensure the user is logged in and is a doctor
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'doctor') {
    header("Location: login.php"); // Redirect to login if not logged in or not a doctor
    exit();
}

$username = $_SESSION['username'];
// Sample data (replace with actual database queries)
$appointments = 3; // Example data
$patients = 10; // Example data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Link to your CSS file -->
    <title>Doctor Dashboard</title>
</head>
<body class="dashboard-background">
    <header class="bg-primary text-white text-center py-4">
        <h1>Doctor Dashboard</h1>
        <p>Hello, <?php echo htmlspecialchars($username); ?>!</p>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Appointments</h5>
                        <p class="card-text"><?php echo $appointments; ?></p>
                        <a href="#" class="btn btn-primary">View Appointments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Patients</h5>
                        <p class="card-text"><?php echo $patients; ?></p>
                        <a href="#" class="btn btn-primary">View Patients</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Sections -->
        <h2>Quick Links</h2>
        <ul class="list-group mb-4">
            <li class="list-group-item"><a href="#">Patient Records</a></li>
            <li class="list-group-item"><a href="#">Medical History</a></li>
            <li class="list-group-item"><a href="logout.php">Logout</a></li> <!-- Add logout functionality -->
        </ul>

    </div>

    <footer class="bg-primary text-white text-center py-3">
        &copy; 2025 Medical Application. All rights reserved.
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
