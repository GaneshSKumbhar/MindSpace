<?php include '../template/header.php'; ?>
<!-- Card Container -->
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Be Mindful</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>

<div class="card-container">
    <!-- Yoga Card -->
    <div class="card">
        <div class="card-image" style="background-image: url('../images/yoga.jpg'); background-color: #ADD8E6;"></div>
        <div class="card-content">
            <h2 class="card-title">Yoga</h2>
            <p class="card-description">Reduce stress with calming yoga exercises. Improve your mental and physical well-being.</p>
            <button class="card-link" onclick="window.location.href='yoga-video.php';">Learn More</button>
        </div>
    </div>

    <!-- Activities Card -->
    <div class="card">
        <div class="card-image" style="background-image: url('../images/activities.jpg'); background-color: #90EE90;"></div>
        <div class="card-content">
            <h2 class="card-title">Activities</h2>
            <p class="card-description">Engage in fun activities to lower your stress levels. Find hobbies and interests that bring you joy.</p>
            <button class="card-link">Explore</button>
        </div>
    </div>

    <!-- Antibiotics Card -->
    <div class="card">
        <div class="card-image" style="background-image: url('../images/antibiotic.png'); background-color: #FFFACD;"></div>
        <div class="card-content">
            <h2 class="card-title">Antibiotics</h2>
            <p class="card-description">Understand the role of antibiotics in stress-related health issues. Consult your doctor for medical advice.</p>
            <button class="card-link" >Read More</button>
        </div>
    </div>
<!-- Therapist Card -->
    <div class="card">
        <div class="card-image" style="background-image: url('../images/therapist.png'); background-color: #C9E4CA;"></div>
        <div class="card-content">
            <h2 class="card-title">Therapist</h2>
            <p class="card-description">Consult with a professional therapist to address mental health concerns. Find support and guidance for a healthier mind.</p>
            <button class="card-link"><a href="../doctor/docinfo.php">Consult Now</a></button>
        </div>
    </div>
</div>
</div>

<?php include '../template/footer.php'; ?>

<style>
    /* Card Styles */
.card-container {
    display: flex;
    justify-content: center; /* Centers cards horizontally */
    gap: 10px; /* Reduces spacing between cards */
    flex-wrap: wrap;
    margin: 150px 0px;
}

.card {
    width: 300px;
    background-color: #f0f8ff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px; /* Reduced bottom margin */
    overflow: hidden;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.card-image {
    height: 180px;
    background-size: cover;
    background-position: center;
}

.card-content {
    padding: 20px;
}

.card-title {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #333;
}

.card-description {
    font-size: 1em;
    color: #666;
    margin-bottom: 15px;
}

.card-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #457b9d;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.card-link:hover {
    background-color: #02629af9;
}

.card-details {
    padding: 20px;
    background-color: #fff;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card {
        width: calc(50% - 15px); /* Adjusted width for two cards per row */
        margin-bottom: 15px;
    }
}

@media (max-width: 480px) {
    .card {
        width: 100%;
        margin-bottom: 10px;
    }
}

</style>