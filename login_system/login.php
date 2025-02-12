<?php
require_once 'config.php'; // Include database connection file

session_start();

// Check if user is already logged in
// if (isset($_SESSION['username'])) {
//     header("Location: user_dashboard.php"); // Redirect to user dashboard
//     exit();
// }

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL statement to check user credentials
    $stmt = $conn->prepare("SELECT password, role FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password, $role);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $db_password)) {
            $_SESSION['username'] = $username; // Store username in session
            $_SESSION['role'] = $role; // Store role in session
            
            // Redirect based on user role
            if ($role === 'doctor') {
                header("Location: doctor_dashboard.php");
            } elseif ($role === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php"); // Regular user dashboard
            }
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that username.";
    }
    $stmt->close();
}

// Prevent caching of this page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>Login</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center">Login</h2>
            <p class="text-center">Please fill in your credentials.</p>

            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3 form-check">
                    <input type="checkbox" name="remember_me" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" name="login" class="btn btn-primary w-100" value="Login">
                </div>
                <p class="text-center">Don't have an account? <a href="#" onclick='window.location.href = "register.php";'>Create new account</a>.</p>
            </form>

        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
