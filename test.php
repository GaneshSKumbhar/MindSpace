<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 700px;
            /* Increased max-width for better readability */
        }

        .card {
            border-radius: 15px;
            /* More rounded corners */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            /* More pronounced shadow */
            transition: transform 0.2s ease-in-out;
            margin-bottom: 20px;
            /* Increased spacing between cards */
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.3rem;
            /* Slightly larger question title */
            color: #343a40;
            /* Darker text for better contrast */
        }

        .options {
            margin-left: 15px;
            /* Adjusted margin */
        }

        .form-check-input {
            margin-top: 0.4rem;
            /* Adjusted margin */
        }

        .form-check-label {
            font-size: 1.1rem;
            /* Slightly larger option text */
            color: #495057;
        }

        .btn-container {
            text-align: center;
            margin-top: 25px;
            /* Increased spacing above buttons */
        }

        .btn {
            padding: 0.7rem 1.4rem;
            /* Slightly larger buttons */
            font-size: 1.1rem;
            border-radius: 0.35rem;
            /* More rounded corners for buttons */
            transition: background-color 0.2s ease;
        }

        .btn-primary,
        .btn-secondary,
        .btn-success {
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .error {
            color: #dc3545;
            margin-top: 10px;
            font-size: 1.05rem;
            /* Adjusted font size for error message */
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .container {
                width: 95%;
            }

            .card {
                margin-bottom: 15px;
            }

            .btn {
                padding: 0.6rem 1.2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Simply answer the following 10 questions</h1>
        <?php
        // Initialize session if not already started
        session_start();

        // Point assignments
        $points = [
            "Almost Never" => 5,
            "Never" => 4,
            "Sometimes" => 3,
            "Fairly Often" => 2,
            "Very Often" => 1
        ];

        // Define your questions and options
        $questions = [
            [
                "text" => "In the LAST MONTH, how often have you been upset because of something that happened unexpectedly?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt that you were unable to control important things in your life?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt nervous and stressed?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt confident about your ability to handle your personal problems?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt that things were going your way?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you been able to do things that you like?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt that you have had control over your life?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you felt frustrated with yourself?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you been feeling insecure?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
            [
                "text" => "In the LAST MONTH, how often have you been thinking of something that you achieve?",
                "options" => ["Never", "Almost Never", "Sometimes", "Fairly Often", "Very Often"]
            ],
        ];

        // Initialize or reset session variables
        if (!isset($_SESSION['question']) || isset($_GET['reset'])) {
            $_SESSION['question'] = 0;
            $_SESSION['answers'] = [];
        }

        $currentQuestion = $_SESSION['question'];

        // Initialize error variable
        $error = "";

        // Process form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['answer'])) {
                $_SESSION['answers'][$currentQuestion] = $_POST['answer'];

                if ($currentQuestion < count($questions) - 1) {
                    $_SESSION['question'] = $currentQuestion + 1;
                    $currentQuestion++; // Move to the next question
                } else {
                    // Calculate and display results
                    $totalPoints = 0;
                    foreach ($_SESSION['answers'] as $answer) {
                        $totalPoints += $points[$answer];
                    }

                    $maxPoints = count($questions) * 5;
                    $percentage = round(($totalPoints / $maxPoints) * 100, 2);

                    echo "<div class='alert alert-success'>Thank you for completing the questionnaire!</div>";
                    echo "<div class='card p-4'>";
                    echo "<h5>Results:</h5>";
                    echo "<p>Total Points: " . $totalPoints . "</p>";
                    echo "<p>Percentage: " . $percentage . "%</p>";
                    echo "</div>";

                    // Reset link
                    echo "<div class='text-center'><a href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?reset=true' class='btn btn-primary'>Retake Questionnaire</a></div>";

                    // Destroy the session so that retake quiz button should work
                    session_destroy();
                    exit(); // Stop displaying further questions
                }
            } else {
                $error = "Please select an option.";
            }
        }

        // Display the question
        $question = $questions[$currentQuestion];
        ?>

        <div class="card p-4">
            <h5 class="text-center card-title">Question <?php echo $currentQuestion + 1; ?>/<?php echo count($questions); ?>
            </h5>
            <p><?php echo $question['text']; ?></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="options">
                    <?php foreach ($question['options'] as $option) : ?>
                    <div class='form-check'>
                        <input class='form-check-input' type='radio' name='answer'
                            id='<?php echo $option . $currentQuestion; ?>' value='<?php echo $option; ?>'
                            <?php if (isset($_SESSION['answers'][$currentQuestion]) && $_SESSION['answers'][$currentQuestion] == $option) echo "checked"; ?>>
                        <label class='form-check-label' for='<?php echo $option . $currentQuestion; ?>'>
                            <?php echo $option; ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="error"><?php echo $error; ?></div>
                <div class="btn-container mt-3">
                    <?php if ($currentQuestion > 0) : ?>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?question=' . ($currentQuestion - 1); ?>"
                        class="btn btn-secondary">Previous</a>
                    <?php endif; ?>
                    <?php if ($currentQuestion < count($questions) - 1) : ?>
                    <button type="submit" class="btn btn-primary">Next</button>
                    <?php else : ?>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>