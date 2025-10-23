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
    <label>Velg student:
        <select name="brukernavn" required>
            <option value="">-- Velg student --</option>
            <?php
            $resultat = mysqli_query($db, "SELECT brukernavn, fornavn, etternavn FROM student");
            while ($rad = mysqli_fetch_assoc($resultat)) {
                echo "<option value='" . htmlspecialchars($rad['brukernavn']) . "'>" .
                     htmlspecialchars($rad['brukernavn']) . " – " .
                     htmlspecialchars($rad['fornavn']) . " " .
                     htmlspecialchars($rad['etternavn']) .
                     "</option>";
            }
            ?>
        </select>
    </label><br>
    <input type="submit" value="Slett student">
</form>

<script>
function bekreftSletting() {
    return confirm("Er du sikker på at du vil slette denne studenten?");
}
</script>

<a href="../index.php">Tilbake</a>