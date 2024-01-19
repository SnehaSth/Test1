<!DOCTYPE HTML>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 10px;
        }
        nav {
        background-color: #751616;
        padding: 15px 0;
    }

    .navbar-brand {
        color: #ffffff;
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-nav {
        margin-left: auto;
    }

    .navbar-nav a {
        color: #ffffff;
        margin-right: 15px;
        font-size: 16px;
        text-decoration: none;
    }

    .navbar-nav a:hover {
        color: #0056b3;
    }
    .form-control {
      background-color: transparent;
      display: flex;
   }
   .btn{
    color: black;
   }
   .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #343a40;
  color: white;
  text-align: center;
}
 
  </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Sneha bank</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-form">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Signupform.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
          </li>
        </ul>
    
      </div>
    </nav>
    <?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: Transactions.php"); // Redirect to welcome page if the user is already logged in
    exit();
}

// Add your database credentials here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csd223_sneha";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    $sql = "SELECT * FROM `user` WHERE `Email` = '$email' AND `Password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['ID'];
        header("Location: Transactions.php"); // Redirect to welcome page on successful login
        exit();
    } else {
        $loginErr = "Invalid email or password";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    E-mail: <input type="text" name="email">
    <br><br>
    Password: <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="Login">
    <span class="error"><?php echo isset($loginErr) ? $loginErr : ""; ?></span>
</form>

<footer class="footer">
      <p>&copy; 2024 Banking Software. All rights reserved.By Sneha Shrestha</p>
  </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
