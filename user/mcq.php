<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Mental Health MCQ</title>
    <style>
        body {
            background-color: #e9f7ef;
            /* Light green background for freshness */
        }
        
        .container {
            margin-top: 50px;
        }
        
        .question-card {
            margin-bottom: 20px;
            border: 1px solid #007bff;
            /* Blue border for medical theme */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        
        .question-card:hover {
            transform: scale(1.03);
        }
        
        .card-body {
            background-color: #ffffff;
            padding: 20px;
        }
        
        .card-title {
            font-weight: bold;
            color: #007bff;
            /* Blue color for card titles */
        }
        
        .btn-custom {
            background-color: #007bff;
            /* Blue button */
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .btn-custom:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }
        
        h1 {
            color: #0056b3;
            /* Dark blue for the title */
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
            /* Increased font size for the title */
        }
        
        @media (max-width: 768px) {
            .question-card {
                width: 90%;
                /* Responsive width for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Mental Health Check MCQ</h1>
        <div id="questionContainer" class="d-flex justify-content-center align-items-center" style="min-height: 60vh;"></div>

        <div class="text-center mt-4">
            <button id="nextButton" class='btn btn-custom' style='display:none;'>Next</button>
            <button id="submitButton" class='btn btn-success' style='display:none;'>Submit</button>
        </div>

        <!-- Result Section -->
        <div id='result' class='mt-4 text-center'></div>
    </div>

    <!-- JavaScript for form submission -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

    <script>
        const questions = [{
                question: "1. How often do you feel overwhelmed by stress?",
                options: ["A) Never", "B) Sometimes", "C) Often", "D) Always"]
            }, {
                question: "2. Do you find it hard to concentrate on tasks?",
                options: ["A) Not at all", "B) Occasionally", "C) Frequently", "D) Almost all the time"]
            }, {
                question: "3. How often do you feel anxious or worried?",
                options: ["A) Rarely", "B) Sometimes", "C) Often", "D) Very often"]
            }, {
                question: "4. Do you have trouble sleeping due to stress or anxiety?",
                options: ["A) No, I sleep well", "B) Occasionally", "C) Often", "D) Almost every night"]
            }, {
                question: "5. How often do you feel sad or depressed?",
                options: ["A) Never", "B) Sometimes", "C) Often", "D) Always"]
            }
            // Add more questions as needed
        ];

        let currentQuestionIndex = 0;

        function displayQuestion() {
            if (currentQuestionIndex < questions.length) {
                const question = questions[currentQuestionIndex];
                const questionCard = `
                    <div class="card question-card" style="width: 100%; max-width: 600px;">
                        <div class="card-body">
                            <h5 class="card-title">${question.question}</h5>
                            ${question.options.map((option, index) => `
                                <div>
                                    <input type="radio" name="q${currentQuestionIndex}" value="${index}" required> ${option}
                                </div>`).join('')}
                        </div>
                    </div>`;
                $('#questionContainer').html(questionCard);
                $('#nextButton').show();
                $('#submitButton').hide();
            } else {
                $('#nextButton').hide();
                $('#submitButton').show();
                $('#questionContainer').html('<h3>Thank you for completing the questionnaire!</h3>');
            }
        }

        $('#nextButton').on('click', function() {
            // Check if an option is selected
            const selectedOption = $(`input[name='q${currentQuestionIndex}']:checked`).val();
            
            if (selectedOption !== undefined) { // If an option is selected
                currentQuestionIndex++;
                displayQuestion();
            } else {
                alert("Please select an answer before proceeding.");
            }
        });

        $('#submitButton').on('click', function() {
            // Here you can implement scoring logic based on selected answers
            $('#result').html('<h3>Your responses have been recorded!</h3>');
            $('#questionContainer').hide();
            $('#nextButton').hide();
            $(this).hide();
        });

        $(document).ready(function() {
            displayQuestion();
        });
    </script>

</body>

</html>