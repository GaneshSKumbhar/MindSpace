<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Registration Form</title>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('https://www.transparenttextures.com/patterns/asfalt-light.png'); /* Subtle background texture */
        }

        .content {
            padding: 20px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="content">
        <h2>User Registration Form</h2>

        <!-- Registration Card -->
        <div class="card" id="registrationForm"> <!-- Added ID for linking -->
            <div class="card-body">
                <form id="registrationFormInner">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="fileUpload">Upload Document (Image or PDF)</label>
                        <input type="file" class="form-control-file" id="fileUpload" accept=".jpg,.jpeg,.png,.pdf">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class='btn btn-primary'>Register</button>
                </form>
            </div>
        </div>

    </div>

    <!-- JavaScript for Bootstrap -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#registrationFormInner').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                alert("Registration form submitted!");
                this.reset(); // Reset the form after submission
            });
        });
    </script>

</body>

</html>
