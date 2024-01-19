
<?php
  echo $_GET['ID'];
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

$sql = "DELETE FROM `user` WHERE ID='".$_GET['ID']."'";
$result = $conn->query($sql);


$conn->close();

header('Location:dashboard.php')
?>
  
