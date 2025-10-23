<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    // Sjekk om brukernavn allerede finnes
    $sjekk = mysqli_prepare($db, "SELECT brukernavn FROM student WHERE brukernavn = ?");
    mysqli_stmt_bind_param($sjekk, "s", $brukernavn);
    mysqli_stmt_execute($sjekk);
    mysqli_stmt_store_result($sjekk);

    if (mysqli_stmt_num_rows($sjekk) > 0) {
        echo "❌ Student med brukernavn <strong>" . htmlspecialchars($brukernavn) . "</strong> finnes allerede.";
    } else {
        // Registrer ny student
        $stmt = mysqli_prepare($db, "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $brukernavn, $fornavn, $etternavn, $klassekode);
        mysqli_stmt_execute($stmt);

        echo "✅ Student <strong>" . htmlspecialchars($brukernavn) . "</strong> er registrert.";
    }
}
?>

<h2>Registrer ny student</h2>
<form method="POST">
    <label>Brukernavn: <input type="text" name="brukernavn" required></label><br>
    <label>Fornavn: <input type="text" name="fornavn" required></label><br>
    <label>Etternavn: <input type="text" name="etternavn" required></label><br>
    <label>Klassekode: <input type="text" name="klassekode" required></label><br>
    <input type="submit" value="Registrer student">
</form>
<a href="../index.php">Tilbake</a>