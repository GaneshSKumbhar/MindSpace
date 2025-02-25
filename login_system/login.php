<?php
session_start(); // Start the session
require_once '../dbconnect/config.php'; // Include database connection file

$message = "";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input (basic validation)
    if (empty($username) || empty($password)) {
        $message = "Please enter both username and password.";
    } else {
        try {
            // Prepare SQL statement to retrieve user data based on username
            $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ?");
            $stmt->bind_param("s", $username);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Check if a user with the given username exists
            if ($result->num_rows == 1) {
                // Fetch user data
                $row = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $row['password'])) {
                    // Password is correct
                    // Store user information in session variables
                    $_SESSION['user'] = $row['id']; // Store user ID
                    $_SESSION['username'] = $row['username']; // Store username
                    $_SESSION['role'] = $row['role']; // Store role

                    // Redirect based on user role
                    if ($row['role'] == 'admin') {
                        header("Location: ../admin/admin_dashboard.php"); // Redirect to admin dashboard
                    } elseif ($row['role'] == 'doctor') {
                        header("Location: ../doctor/doctor_dashboard.php"); // Redirect to doctor information page
                    } else {
                        header("Location: ../user/user_dashboard.php"); // Redirect to user dashboard
                    }
                    exit();
                } else {
                    // Incorrect password
                    $message = "Incorrect username or password.";
                }
            } else {
                // User not found
                $message = "Incorrect username or password.";
            }

            // Close the prepared statement
            $stmt->close();

        } catch (Exception $e) {
            // Handle database errors
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Link to your CSS file -->
    <title>Login</title>
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="text-center">Login</h2>

                <?php if ($message): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
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

                    <!-- Login Button -->
                    <input type="submit" name="login" class="btn btn-primary w-70 mb-3" value="Login">

                    <!-- Link to registration page -->
                    <p class="text-center">Don't have an account? <a href="register.php">Register here</a>.</p>
                </form>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
