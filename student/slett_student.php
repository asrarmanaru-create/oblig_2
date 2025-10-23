<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    $stmt = mysqli_prepare($db, "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $brukernavn, $fornavn, $etternavn, $klassekode);
    mysqli_stmt_execute($stmt);

    echo "Student lagt til!";
}
?>

<form method="POST">
    <label>Brukernavn: <input type="text" name="brukernavn" required></label><br>
    <label>Fornavn: <input type="text" name="fornavn" required></label><br>
    <label>Etternavn: <input type="text" name="etternavn" required></label><br>
    <label>Klassekode: <input type="text" name="klassekode" required></label><br>
    <input type="submit" value="Legg til student">
</form>
<a href="../index.php">Tilbake</a>
