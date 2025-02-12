<?php
require_once 'config.php'; // Include database connection file

$message = "";

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = trim($_POST['role']); // New role field

    // Validate input
    if ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password_hash, $role);

        if ($stmt->execute()) {
            $message = "Registration successful! You can now log in.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
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
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <title>Create New Account</title>
</head>
<body class="bg-light">
<div class="container mt-5 mb-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center">Create New Account</h2>

            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <!-- Registration Form -->
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>    
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <!-- Role Selection for Registration -->
                <div class="form-group mb-3">
                    <label for="role">Select Role:</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="">Choose...</option>
                        <option value="user">User</option>
                        <option value="doctor">Doctor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Register Button -->
                <input type="submit" name="register" class="btn btn-primary w-100 mb-3" value="Register">

                <!-- Link back to login -->
                <p class="text-center">Already have an account? <a href="login.php" onclick='window.location.href = "login.php";'>Login here</a>.</p>

                
            </form>

        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>

