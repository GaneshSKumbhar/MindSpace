<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile with Sidebar</title>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('https://www.transparenttextures.com/patterns/asfalt-light.png'); /* Subtle background texture */
        }

        .navbar {
            background-color: rgba(0, 128, 128, 0.7); /* Teal background with transparency */
            backdrop-filter: blur(10px); /* Glass effect */
            color: white;
        }

        .navbar a {
            color: white; /* White text for navbar links */
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            background: rgba(0, 128, 128, 0.7); /* Teal background with transparency */
            backdrop-filter: blur(10px); /* Glass effect */
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-100%); /* Hide sidebar */
        }

        .sidebar h5 {
            color: white; /* White text for sidebar title */
            text-align: center;
            margin-bottom: 20px; /* Space below title */
        }

        .sidebar a {
            color: #ffffff; /* Change link color to white */
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            border-radius: 5px; /* Rounded corners for links */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effects */
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Light white on hover */
            color: #0056b3; /* Darker blue text on hover */
        }

        .content {
            margin-left: 260px; /* Leave space for the sidebar */
            padding: 20px;
            transition: margin-left 0.3s ease; /* Smooth transition for content */
        }

        .content.expanded {
            margin-left: 0; /* Expand content area when sidebar is hidden */
        }

        .section {
            display: none; /* Hide all sections by default */
        }

        .section.active {
            display: block; /* Show active section */
        }

        .card {
            transition: transform 0.2s; /* Animation effect on hover */
        }

        .card:hover {
            transform: scale(1.05); /* Scale up on hover */
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="toggleSidebar" class='btn btn-outline-light'>☰</button> <!-- Hamburger icon -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h5>MindSpace</h5>
        <a href="user_reg.php">User registration</a>
        <a href="#section2">Booking appointment</a>
        <a href="#section3">Activity</a>
        <a href="#section4">Patient feedback</a>
        <a href="#section5">Invoice generation</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Welcome to the Dashboard</h2>
    </div>

    <!-- JavaScript for Bootstrap -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Toggle sidebar visibility
            $('#toggleSidebar').on('click', function() {
                $('#sidebar').toggleClass('hidden');
                $('.content').toggleClass('expanded'); // Adjust content margin
                $('.section').removeClass('active').hide(); // Hide all sections when sidebar is hidden
            });

            // Show section based on sidebar link clicked
            $('.sidebar a').on('click', function(e) {
                e.preventDefault(); // Prevent default anchor click behavior
                const target = $(this).attr('href'); // Get target from href attribute

                // Hide all sections and show the target section
                $('.section').removeClass('active').hide();
                $(target).addClass('active').show();

                $('#sidebar').removeClass('hidden'); // Show sidebar after clicking
                $('.content').removeClass('expanded'); // Reset content margin
            });
        });
    </script>

</body>

</html>
