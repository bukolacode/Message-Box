<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");
if (!$conn) {
    echo "Database connected" . mysqli_connect_error();
}
?>
