<?php
/* DB-tilkobling med miljøvariabler og feilhåndtering */
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$conn = mysqli_connect($host, $username, $password, $database);
if (!$db) {
    die("Tilkobling til database feilet: " . mysqli_connect_error());
} else {
    echo "Tilkoblet databasen!";
}
?>

