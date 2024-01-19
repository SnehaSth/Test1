<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
      </div>
    </nav>

<h1>Users Detail</h1>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Update</th>
    <th>Delete</th>

  </tr>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csd223_sneha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td> ".$row["ID"]." </td>";
    echo "<td> ".$row["Name"]." </td>";
    echo "<td> ".$row["Email"]." </td>";
    echo "<td> ".$row["Password"]." </td>";
    echo '<td ><a href="update.php?ID='.$row['ID'].'"><button>Update</button></a></td>';
    echo '<td ><a href="delete.php?ID='.$row['ID'].'"><button>Delete</button></a></td>';
    echo "</tr>";
    //echo "id: " . $row["ID"]. " - Name: " . $row["Name"].  " - Email: " . $row["Email"]. " - Address: " . $row["Address"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  
</table>
<footer class="footer">
      <p>&copy; 2024 Banking Software. All rights reserved.By Sneha Shrestha</p>
 </footer>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>