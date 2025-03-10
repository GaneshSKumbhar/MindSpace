<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mindspace - Stress Management Wristband</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    body {
      background-color: #f4f4f4;
      background: url("images/website-background.png");
      background-size: cover;
      background-attachment: fixed;
      /* The background image will not scroll with the page */
    }

    .hero {
      background: url("images/counseling-7070926_1280.webp") no-repeat center center;
      background-size: cover;
      color: black;
      padding: 100px 0;
      text-align: center;
      height: 450px;
      width: 80%;
      max-width: 1400px;
      margin: 0 auto;
    }

    .nav-main {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .nav-head {
      font-size: 1rem;
    }

    .nav-head-main {
      color: #333;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
      margin-top: 370px;
    }

    .hero p {
      font-size: 1.5rem;
    }

    .cta-button {
      margin-top: 20px;
    }

    .card {
      margin: 20px 0;
      margin-top: 80px;
      background-color: rgba(
        255,
        255,
        255,
        0.8
      );
      /* White with transparency */
      border-radius: 15px;
      /* Curved corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Optional shadow for depth */
      backdrop-filter: blur(
        10px
      );
      /* Optional: adds a blur effect behind the card */
    }

    .container {
      margin-top: 50px;
    }

    h1 {
      color: #005cb9;
      /* Blue color for the heading */
      font-weight: bold;
    }

    h2 {
      color: #005cb9;
      /* Blue color for subheadings */
      margin-top: 30px;
    }

    .content {
      margin-top: 15px;
    }

    .call-to-action {
      color: #e74c3c;
      /* Red color for call to action */
      font-weight: bold;
    }

    .social-icons a {
      margin: 0 10px;
      font-size: 1.5rem;
      color: #333;
    }

    .social-icons a:hover {
      color: #007bff;
      /* Change color on hover */
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <span class="nav-main">MindSpace</span>
      <span class="nav-head">Your partner in stress management</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#features">
            <span class="nav-head-main">Features</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">
            <span class="nav-head-main">About Us</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#signup">
            <span class="nav-head-main">Get Started</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="hero">
    <div class="container">
      <h1>Welcome to MindSpace</h1>
      <!-- <a href="#signup" class="btn btn-primary btn-lg cta-button">Get Started Today!</a> -->
    </div>
  </div>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <img src="images/200.gif" alt="Mindspace Wristband" class="card-img-top img-fluid rounded" />
          <br />
          <div class="card-body"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="text-center">Introducing the Mindspace Wristband</h2>
            <br />
            <h5 class="card-title">How It Works</h5>
            <p class="card-text">
              The Mindspace wristband uses advanced sensors to detect changes
              in your heart rate, allowing it to assess your stress levels
              accurately. With our user-friendly app, you can track your
              stress over time and receive personalized tips to help you relax
              and improve your well-being.
            </p>

            <h5 class="card-title">Mindspace Wristband</h5>
            <p class="card-text">
              Our innovative wristband calculates your stress by monitoring
              your heartbeats and provides real-time feedback on your stress
              levels.
            </p>
            <br /><br />
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <a href="login.php" class="btn btn-success btn-lg cta-button">Join Us Now!</a>
    </div>
  </div>

  <div class="container">
    <h1>What To Expect When You Call MindHealth Counselling Service</h1>
    <p class="content">
      Thinking about contacting MindHealth but unsure what to expect? Here's
      how our counsellors can support you or anyone who needs it:
    </p>

    <h2>1. Expert mental health support</h2>
    <p class="content">
      Our professional counsellors are highly qualified and experienced to
      support you. All staff have a tertiary qualification in a relevant
      discipline (e.g. psychology) with a minimum of 456 hours of counselling
      experience.
    </p>

    <h2>2. No referral needed</h2>
    <p class="content">
      You do not require a medical referral to contact our service. This means
      you can access free, professional counselling between 7am and 9pm Monday
      to Saturday by simply calling
      <span class="call-to-action"> +91 8658741256</span>
    </p>

    <h2>3. Single and multi-session counselling</h2>
    <p class="content">
      MindHealth can provide a one off counselling session or you may be
      eligible to receive up to three additional sessions.
    </p>
  </div>

  <div class="container-fluid my-5" id="about">
    <h2 class="text-center">About Us</h2>
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title text-center">Who We Are</h5>
            <p class="card-text text-center">
              At Mindspace, we are committed to helping individuals manage
              their stress effectively. Our team of experts has developed a
              state-of-the-art wristband that not only tracks your heart rate
              but also provides insights into your stress levels. We believe
              that understanding your body is the first step towards a
              healthier, more balanced life.
            </p>
            <br />
            <p class="card-text text-center">
              Join us on this journey to better mental health and well-being.
              Together, we can make a difference!
            </p>
            <br />
          </div>
        </div>
      </div>
    </div>
    ...
    <div class="container my-5" id="contact">
      <h2 class="text-center">Contact Us</h2>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message"
            required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $message = $_POST['message'];

          //  Replace with your email address
          $to = "youremail@example.com";
          $subject = "Contact Form Submission";
          $body = "Name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message;
          $headers = "From: " . $email . "\r\n";
          $headers .= "Reply-To: " . $email . "\r\n";

          //  Send the email
          if (mail($to, $subject, $body, $headers)) {
            echo "<p>Message sent successfully!</p>";
          } else {
            echo "<p>Message failed to send.</p>";
          }
        }
        ?>
      </form>
    </div>

    <div class="text-center my-5">
      <h2>Follow Us</h2>
      <div class="social-icons">
        <a href="https://facebook.com" target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://instagram.com" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://linkedin.com" target="_blank">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>

    <footer class="text-center py-4">
      <p>&copy; 2025 Mindspace. All rights reserved.</p>
      <a href="#signup" class="btn btn-primary">Contact Us</a>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </div>
</body>

</html>