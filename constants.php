 <?php
$servername = "localhost";
$username = "root";
$password = "admin@123";
$dbname = "user";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }

?>