<?php
$host = "b-studentsql-1.usn.no";   // USN database-server
$dbname = "asaln7138";             // Ditt databasenavn (samme som brukernavn)
$user = "asaln7138";               // Din databasebruker
$pass = "1251asaln7138";            // Passordet du bruker til phpMyAdmin

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Databasekobling feilet: " . $e->getMessage();
}
?>
