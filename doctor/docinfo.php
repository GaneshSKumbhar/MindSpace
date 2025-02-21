<?php
require_once '../dbconnect/config.php'; // Include database connection file

// Query the doctor table to retrieve all doctors
$sql = "SELECT * FROM doctor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="doctors-page">
    <main>
        <section class="top">
            <div class="container">
                <h1>Our Doctors</h1>
                <p>Here's a list of our qualified doctors</p>
            </div>
        </section>
        <section id="main">
            <div class="container">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card doctor-card">  <!-- Added unique class -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row["username"]); ?></h5>
                                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row["email"]); ?></p>
                                        <p class="card-text"><strong>Phone Number:</strong> <?php echo htmlspecialchars($row["phone_number"]); ?></p>
                                        <p class="card-text"><strong>Role:</strong> <?php echo htmlspecialchars($row["role"]); ?></p>
                                        <!-- You can add more fields here -->
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No doctors found.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
