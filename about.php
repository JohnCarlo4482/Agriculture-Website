<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Vegetable Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Background.jpg'); /* Background Image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333; /* Neutral font color */
        }

        /* Container for Dashboard */
        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background-color: rgba(46, 105, 6, 0.6); /* Transparent Green */
            backdrop-filter: blur(10px); /* Frosted Glass Effect */
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhanced Shadow */
            border-radius: 20px;
            color: #fff; /* Text readability on green */
        }

        /* Title Styling */
        h1 {
            color: #e3f5d9; /* Softer green tint */
        }

        /* Navigation Links Styling */
        .nav-links {
            display: flex;
            justify-content: space-around;
            background-color: rgba(68, 197, 42, 0.8); /* Light Green */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .nav-links a:hover {
            background-color: rgba(46, 105, 6, 1); /* Darker Green Hover */
            transform: scale(1.05);
        }

        /* Logout Button Styling */
        .logout-btn {
            background-color: rgba(46, 105, 6, 0.8); /* Semi-transparent Green */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .logout-btn:hover {
            transform: scale(1.05);
            background-color: rgba(68, 197, 42, 1); /* Light Green Hover */
        }

        /* Content Section Styling */
        .section-content {
            padding: 20px;
        }

       
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>About Us</h1>

    <div class="nav-links">
        <a href="dashboard.php">Home</a>  
        <a href="leafy.php">Next</a>
        <a href="about.php">About Us</a>
    </div>

    <div class="section-content">
        <div class="about-content">
            <h2 class="about-title">Our Mission</h2>
            <p>We are dedicated to promoting healthy eating through the power of vegetables. Our aim is to provide you with valuable information about various vegetables and how they can help improve your diet.</p>
            
            <h2 class="about-title">Our Vision</h2>
            <p>To create a healthier world where people understand the importance of vegetables in their daily lives and make informed food choices.</p>

            <h2 class="about-title">Contact Information</h2>
            <p>Email: support@vegetabledashboard.com</p>
            <p>Phone: +1 (555) 123-4567</p>
        </div>
    </div>
</div>

</body>
</html>
