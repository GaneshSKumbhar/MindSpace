<?php
require_once '../dbconnect/config.php'; // Include database connection file

$message = "";

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = trim($_POST['role']); // New role field
    $phone_number = trim($_POST['phone_number']); // New phone number field

    // Doctor-specific fields
    $profile_photo = isset($_FILES['profile_photo']) ? $_FILES['profile_photo'] : null;
    $specialization = trim($_POST['specialization'] ?? '');
    $clinic_address = trim($_POST['clinic_address'] ?? '');

    // Validate input
    if ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Hash the password
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Start a transaction to ensure both inserts succeed or fail together
        $conn->begin_transaction();

        try {
            // Prepare SQL statement to insert user data into the 'user' table
            $stmt = $conn->prepare("INSERT INTO user (username, email, password, role, phone_number) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $username, $email, $password_hash, $role, $phone_number);

            if ($stmt->execute()) {
                // Get the user ID of the newly inserted user
                $user_id = $conn->insert_id;

                // If the user is a doctor, insert their info into the 'doctor' table
                if ($role === 'doctor') {
                    // Handle profile photo upload
                    $profile_photo_path = '';  // Initialize path
                    if ($profile_photo && $profile_photo['size'] > 0) {
                        $uploadDir = '../uploads/';  // Directory to store uploads
                        $fileName = basename($profile_photo['name']);
                        $filePath = $uploadDir . $fileName;

                        if (move_uploaded_file($profile_photo['tmp_name'], $filePath)) {
                            $profile_photo_path = $filePath;  // Save the path to the database
                        } else {
                            throw new Exception("Failed to upload profile photo.");
                        }
                    }

                    $doctor_stmt = $conn->prepare("INSERT INTO doctor (username, password, email, role, phone_number, specialization, clinic_address, profile_photo_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $doctor_stmt->bind_param("ssssssss", $username, $password_hash, $email, $role, $phone_number, $specialization, $clinic_address, $profile_photo_path); // Use hashed password

                    if ($doctor_stmt->execute()) {
                        // Doctor information saved successfully
                    } else {
                        throw new Exception("Error creating doctor account: " . $doctor_stmt->error);
                    }
                    $doctor_stmt->close();
                }

                // Commit the transaction
                $conn->commit();
                $message = "Registration successful! You can now log in.";

            } else {
                throw new Exception("Error creating user account: " . $stmt->error);
            }
            $stmt->close();

        } catch (Exception $e) {
            // Rollback the transaction if any error occurred
            $conn->rollback();
            $message = "Registration failed: " . $e->getMessage(); // Display specific error
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>    
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
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

                <!-- Doctor-specific fields (initially hidden) -->
                <div id="doctorFields" style="display: none;">
                    <div class="form-group mb-3">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                    </div>
                    <div class="form-group mb-3">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization">
                    </div>
                    <div class="form-group mb-3">
                        <label for="clinic_address">Clinic Address</label>
                        <textarea class="form-control" id="clinic_address" name="clinic_address"></textarea>
                    </div>
                </div>

                <!-- Register Button -->
                <input type="submit" name="register" class="btn btn-primary w-40 mb-3" value="Register">

                <!-- Link back to login -->
                <p class="text-center">Already have an account? <a href="login.php" onclick='window.location.href = "login.php";'>Login here</a>.</p>

            </form>

        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#role').change(function() {
            if ($(this).val() === 'doctor') {
                $('#doctorFields').show();
            } else {
                $('#doctorFields').hide();
            }
        });
    });
</script>

</body>
</html>