<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];

    $stmt = mysqli_prepare($db, "DELETE FROM student WHERE brukernavn = ?");
    mysqli_stmt_bind_param($stmt, "s", $brukernavn);
    mysqli_stmt_execute($stmt);

    echo "✅ Student med brukernavn <strong>" . htmlspecialchars($brukernavn) . "</strong> er slettet.";
}
?>

<h2>Slett student</h2>
<form method="POST" onsubmit="return bekreftSletting();">
    <label>Brukernavn: <input type="text" name="brukernavn" required></label><br>
    <input type="submit" value="Slett student">
</form>

<script>
function bekreftSletting() {
    return confirm("Er du sikker på at du vil slette denne studenten?");
}
</script>

<a href="../index.php">Tilbake</a>