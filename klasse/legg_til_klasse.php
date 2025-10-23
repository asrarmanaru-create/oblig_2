<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kode = $_POST["klassekode"];
    $navn = $_POST["klassenavn"];
    $studium = $_POST["studiumkode"];

    $stmt = $conn->prepare("INSERT INTO klasse VALUES (?, ?, ?)");
    $stmt->execute([$kode, $navn, $studium]);
    echo "<p>Klasse lagt til!</p>";
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Legg til klasse</title></head>
<body>
  <h1>Registrer ny klasse</h1>
  <form method="post">
    Klassekode: <input type="text" name="klassekode" required><br>
    Klassenavn: <input type="text" name="klassenavn" required><br>
    Studiumkode: <input type="text" name="studiumkode" required><br>
    <button type="submit">Lagre</button>
  </form>
  <p><a href="../index.php">Tilbake</a></p>
</body>
</html>
