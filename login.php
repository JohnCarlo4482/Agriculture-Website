<?php
session_start();

$servername = "localhost";  
$username_db = "root";  
$password_db = "";  
$dbname = "agriculture";  

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid credentials. Please try again.";
        }
    } else {
        $error = "Invalid credentials. Please try again.";
    }

    $stmt->close();  
    $conn->close();  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Farm.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed; 
            color: #333;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 340px;  
            height: 350px; 
            background-color: rgba(255, 255, 255, 0.7);  
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  
            border-radius: 8px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        h2 {
            color: #2e6906;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form input, form button {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        form input:focus, form button:focus {
            border-color: #68c52a;
            outline: none;
        }

        form button {
            background-color: #2e6906;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #2e6906;
        }

        .error {
            color: red;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .login-container a {
            color: #2e6906;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .login-links {
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .login-links a {
            color: #2e6906;
            text-decoration: none;  
            margin: 10px;
            font-size: 16px;
            padding: 5px 10px;
            border: 2px solid #2e6906;
            border-radius: 5px;
        }

        .login-links a:hover {
            text-decoration: underline; 
        }

        @media (max-width: 768px) {
            .login-container {
                width: 90%;  
                margin: 20px auto;
                padding: 20px;
                height: auto;
            }

            h2 {
                font-size: 1.5rem;
            }

            form input, form button {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div class="login-links">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
