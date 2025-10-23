<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["klassekode"];
    $navn = $_POST["klassenavn"];
    $studium = $_POST["studiumkode"];

    $stmt = $conn->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
    $stmt->execute([$kode, $navn, $studium]);
    echo "Klasse registrert!";
}
?>

<form method="post">
    Klassekode: <input type="text" name="klassekode"><br>
    Klassenavn: <input type="text" name="klassenavn"><br>
    Studiumkode: <input type="text" name="studiumkode"><br>
    <input type="submit" value="Registrer klasse">
</form>