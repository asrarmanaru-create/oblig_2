<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];
    $klassenavn = $_POST['klassenavn'];
    $studiumkode = $_POST['studiumkode'];

    $stmt = mysqli_prepare($db, "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $klassekode, $klassenavn, $studiumkode);
    mysqli_stmt_execute($stmt);

    echo "✅ Klasse <strong>" . htmlspecialchars($klassekode) . "</strong> er registrert.";
}
?>

<h2>Registrer ny klasse</h2>
<form method="POST">
    <label>Klassekode: <input type="text" name="klassekode" required></label><br>
    <label>Klassenavn: <input type="text" name="klassenavn" required></label><br>
    <label>Studiumkode: <input type="text" name="studiumkode" required></label><br>
    <input type="submit" value="Registrer klasse">
</form>
<a href="../index.php">Tilbake</a>