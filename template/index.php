<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be Mindful</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* Header Animation */
        header {
            animation: fadeInDown 1s ease-in-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Top Section Animation */
        .top {
            animation: fadeInUp 1s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stress Circle Animation */
        .stress-circle {
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        /* Meter Styles */
        .meter-container {
            position: relative;
            width: 200px;
            height: 200px;
        }

        .outer-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: absolute;
            background-image: conic-gradient(
                from -90deg,
                #66b3ff 0deg, #66b3ff 135deg,
                #ffb84d 135deg, #ffb84d 225deg,
                #ff6666 225deg, #ff6666 270deg,
                transparent 270deg, transparent 360deg
            );
            transform: rotate(45deg);
            z-index: 1;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .inner-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 60%;
            background-color: #37474F;
            border-radius: 50%;
            border: 2px solid #fff;
            z-index: 4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .meter-handle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-100%, -50%);
            width: 58%;
            height: 13px;
            background-color: #37474F;
            transform-origin: 100% 50%;
            border-radius: 10px;
            z-index: 3;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease-in-out;
        }

        .meter-value {
            font-size: 1.5em;
            font-weight: bold;
        }

        .meter-label {
            font-size: 0.8em;
            text-transform: uppercase;
        }

        /* Get Stress Score Button Animation */
        .get-stress-score {
            animation: moveButton 3s linear infinite;
        }

        @keyframes moveButton {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(10px);
            }
            100% {
                transform: translateX(0);
            }
        }

        /* Footer Animation */
        footer {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid"></div>
    <section id="main">
        <div class="container">
            <article id="main-col">
                <div class="top">
                    <p>Test Your Stress</p>
                    <h1>Knowing your current level of stress is the first step in taking control</h1>
                    <p>Take this simple test and measure the stress in your life</p>
                </div>
                <div class="stress-info">
                    <a href="test.php" class="get-stress-score">Get Your Stress Score</a>

                    <div class="stress-circle">
                        <div class="meter-container">
                            <div class="outer-circle"></div>
                            <div class="inner-circle">
                                <div class="meter-value" id="meter-value">35</div>
                                <div class="meter-label">HIGH</div>
                            </div>
                            <div class="meter-handle" id="meter-handle"></div>
                        </div>
                    </div>

                    <p style="font-size: smaller;">No registration required.</p>

                    <h3>How the Stress Test works</h3>
                    <p class="stress-test-description">
                        The test uses the Perceived Stress Scale (PSS). Originally created by Cohen et al (1983), it is a highly recognised
                        psychological tool for measuring stress that's clinically validated and widely used.
                    </p>
                    <p class="stress-test-description">
                        The test measures the degree to which situations in your life are perceived as stressful by scoring how unpredictable,
                        uncontrollable, and overloaded you feel your life to be.
                    </p>
                    <p class="stress-test-description">
                        The questions ask about your thoughts and feelings during the last month, are easy to understand and are of a general
                        nature.
                    </p>

                    <a href="#" class="get-stress-score">Get Your Stress Score</a>
                </div>
            </article>
        </div>
    </section>
    <script>
        const meterHandle = document.getElementById('meter-handle');
        const meterValueDisplay = document.getElementById('meter-value');

        function getRandomValue() {
            return Math.floor(Math.random() * 41);
        }

        function setValue(value) {
           const degree = mapValueToDegree(value);
           meterHandle.style.transform = `translate(-100%, -50%) rotate(${degree}deg)`;
           meterValueDisplay.textContent = value;

           let label = "";
           if(value <= 15) {
               label = "LOW";
           } else if (value <= 25) {
               label = "MODERATE";
           } else {
               label = "HIGH";
           }
           document.querySelector('.meter-label').textContent = label;
        }

        function mapValueToDegree(value) {
            const degree = -90 + (value / 40) * 180;
            return degree;
        }

        function animateMeter() {
            const randomValue = getRandomValue();
            setValue(randomValue);
        }

        animateMeter();
        setInterval(animateMeter, 2000);
    </script>
</body>
</html>
<?php include 'footer.php'; ?>
