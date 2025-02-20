<?php
// session_start();
// // Ensure the user is logged in and is an admin
// if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
//     header("Location: login.php"); // Redirect to login if not logged in or not an admin
//     exit();
// }

// $username = $_SESSION['username'];
// // Sample data (replace with actual database queries)
// $totalUsers = 50; // Example data
// $totalAppointments = 100; // Example data
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <div></div>
</body>
<?php include '../template/footer.php'; ?>
</html> 