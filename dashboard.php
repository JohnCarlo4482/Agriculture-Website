<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php"); 
    exit(); 
}

abstract class Vegetable {

    private $name;
    private $family;
    private $type;
    private $climate;

    public function __construct($name, $family, $type, $climate) {
        $this->name = $name;
        $this->family = $family;
        $this->type = $type;
        $this->climate = $climate;
    }

    public function getName() {
        return $this->name;
    }

    public function getFamily() {
        return $this->family;
    }

    public function getType() {
        return $this->type;
    }

    public function getClimate() {
        return $this->climate;
    }

    abstract public function getVegetableInfo();
}

// Carrot Class (Inheritance & Polymorphism)
class Carrot extends Vegetable {
    public function __construct() {
        parent::__construct("Carrot", "Apiaceae", "Root vegetable", "Cool climates");
    }

    public function getVegetableInfo() {
        return;
    }
}

// Tomato Class (Inheritance & Polymorphism)
class Tomato extends Vegetable {
    public function __construct() {
        parent::__construct("Tomato", "Solanaceae", "Fruit vegetable", "Warm climates");
    }

    public function getVegetableInfo() {
        return;
    }
}

// Cabbage Class (Inheritance & Polymorphism)
class Cabbage extends Vegetable {
    public function __construct() {
        parent::__construct("Cabbage", "Brassicaceae", "Leafy vegetable", "Temperate climates");
    }

    public function getVegetableInfo() {
        return;
    }
}

function displayVegetableInfo($vegetable) {
    echo "<h2>" . $vegetable->getName() . "</h2>";
    echo "<p>Family: " . $vegetable->getFamily() . "</p>";
    echo "<p>Type: " . $vegetable->getType() . "</p>";
    echo "<p>Climate: " . $vegetable->getClimate() . "</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegetable Dashboard</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('Background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        h1 {
            color: #2e6906;
            text-align: center;
        }

        .nav-links {
            display: flex;
            justify-content: space-around;
            background-color: #2e6906;
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
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #68c52a;
        }

        .logout-btn {
            background-color: #2e6906;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .logout-btn:hover {
            transform: scale(1.05);
            background-color: #68c52a;
        }

        .section-content {
            padding: 20px;
        }

        .vegetable-images {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .vegetable-item {
            text-align: center;
            background-color: rgba(46, 105, 6, 0.2);
            padding: 15px;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .vegetable-item:hover {
            transform: scale(1.05);
        }

        .vegetable-item img {
            max-width: 100%;
            border-radius: 10px;
        }

        .vegetable-name {
            font-size: 1.5rem;
            color: #2e6906;
            margin-top: 10px;
        }

        .vegetable-description {
            font-size: 1rem;
            color: #555;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?>!
        <form method="POST" action="" style="margin: 0;">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
    </h1>

    <div class="nav-links">
        <a href="dashboard.php">Home</a>  
        <a href="leafy.php">Next</a>
        <a href="about.php">About Us</a>
    </div>

    <div class="section-content">
        <?php
        if (isset($_GET['section'])) {
            $section = $_GET['section'];
            switch ($section) {
                case 'carrot':
                    $carrot = new Carrot();
                    displayVegetableInfo($carrot);
                    break;
                case 'tomato':
                    $tomato = new Tomato();
                    displayVegetableInfo($tomato);
                    break;
                case 'cabbage':
                    $cabbage = new Cabbage();
                    displayVegetableInfo($cabbage);
                    break;
                default:
                    echo "<h2>Homepage</h2>";
                    echo "<p>Welcome to your dashboard. Use the navigation links to explore different sections.</p>";
            }
        } else {
            echo '<h2 class="vegetable-title">Root & Leafy Vegetables</h2>';
            

            echo '<div class="vegetable-images">';

            echo '<div class="vegetable-item">';
            echo '<img src="Carrot.png" alt="Carrot">';
            echo '<span class="vegetable-name">Carrot</span>';
            echo '<div class="vegetable-description carrot-description">';
            echo '<p>Family: Apiaceae</p>';
            echo '<p>Type: Root vegetable</p>';
            echo '<p>Climate: Cool climates</p>';
            echo '</div>';
            echo '</div>';

            echo '<div class="vegetable-item">';
            echo '<img src="Tomato.png" alt="Tomato">';
            echo '<span class="vegetable-name">Tomato</span>';
            echo '<div class="vegetable-description tomato-description">';
            echo '<p>Family: Solanaceae</p>';
            echo '<p>Type: Fruit vegetable</p>';
            echo '<p>Climate: Warm climates</p>';
            echo '</div>';
            echo '</div>';

            echo '<div class="vegetable-item">';
            echo '<img src="cabbage.png" alt="Cabbage">';
            echo '<span class="vegetable-name">Cabbage</span>';
            echo '<div class="vegetable-description cabbage-description">';
            echo '<p>Family: Brassicaceae</p>';
            echo '<p>Type: Leafy vegetable</p>';
            echo '<p>Climate: Temperate climates</p>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
        }
        ?>
    </div>
</div>

</body>
</html>
