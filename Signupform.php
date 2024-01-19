<!DOCTYPE HTML>  
<html>
<head>
<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
.error {color: #FF0000;}
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
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 5px;
        background-color: #ffffff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 5px;
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
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error {
        color: #dc3545;
        font-size: 14px;
    }

    /* Navbar Styles */
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
      display: flex;
      background-color: transparent;
   }
   .btn{
    color: black;
   }
   .footer {
  background-color: #343a40;
  color: white;
  text-align: center;
  padding: 20px 0;
}
  
</style>
</head>
<body>  



<nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Sneha Bank</a>
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
            <a class="nav-link" href="#">About Us</a>
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
      </div>
    </nav>

    <?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = $cpasswordErr= "";
$name = $email = $password = $cpassword = "";

 $valid=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
     $valid=false;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $valid=false;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid=false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $valid=false; 
    }
  }


  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $valid=false;
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
     
    if(strlen($password)<6){
        $passwordErr = "Please enter at least six charecter password";
        $valid=false;
    }

  }

  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Confirm Password is required";
    $valid=false;
     
  } else {
    $cpassword = test_input($_POST["cpassword"]);
   

    if($cpassword!=$password){
        $cpasswordErr = "Password and Confirm Password Need to be same";
        $valid=false;
    }

  }
    
   

    if($valid){

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "csd223_sneha";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `user`(`Name`, `Email`, `Password`) VALUES ('".$name."','".$email."','".$password."')";

    if ($conn->query($sql) === TRUE) {
    echo "Account created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br>
  Confirm Password: <input type="password" name="cpassword" value="<?php echo $cpassword;?>">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<!-- Footer Section -->
<footer class="footer">
      <p>&copy; 2024 Banking Software. All rights reserved.By Sneha Shrestha</p>
    </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>