 <?php
$servername = "mysql.hostinger.fr";
$username = "u815255986_bp";
$password = "Zmcub2";
$base = "u815255986_bac";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db_selected = mysqli_select_db($conn, $base);
if (!$db_selected) {
   die ('Impossible de sélectionner la base de données : ' . mysql_error());
}
?> 