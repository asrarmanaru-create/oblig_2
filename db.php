<?php
$host = "b-studentsql-1.usn.no";  
$dbname = "asaln7138";            
$user = "asaln7138";              
$pass = "1251asaln7138";           

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Tilkoblet databasen!"; // valgfritt for testing
} catch (PDOException $e) {
    echo "Databasekobling feilet: " . $e->getMessage();
}
?>

