<?php
$host = "localhost";  // Endre til riktig host
$dbname = "oblig_2";
$user = "root";       // Din databasebruker
$pass = "";           // Ditt passord

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Databasekobling feilet: " . $e->getMessage();
}
?>
