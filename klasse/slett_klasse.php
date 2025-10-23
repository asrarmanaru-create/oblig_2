<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];

    // Sjekk om det finnes studenter i klassen
    $sjekk = mysqli_prepare($db, "SELECT COUNT(*) FROM student WHERE klassekode = ?");
    mysqli_stmt_bind_param($sjekk, "s", $klassekode);
    mysqli_stmt_execute($sjekk);
    mysqli_stmt_bind_result($sjekk, $antall);
    mysqli_stmt_fetch($sjekk);
    mysqli_stmt_close($sjekk);

    if ($antall > 0) {
        echo "❌ Klassen <strong>" . htmlspecialchars($klassekode) . "</strong> har studenter og kan ikke slettes.";
    } else {
        // Slett klassen
        $stmt = mysqli_prepare($db, "DELETE FROM klasse WHERE klassekode = ?");
        mysqli_stmt_bind_param($stmt, "s", $klassekode);
        mysqli_stmt_execute($stmt);

        echo "✅ Klasse <strong>" . htmlspecialchars($klassekode) . "</strong> er slettet.";
    }
}
?>

<h2>Slett klasse</h2>
<form method="POST" onsubmit="return bekreftSletting();">
    <label>Velg klasse:
        <select name="klassekode" required>
            <option value="">-- Velg klasse --</option>
            <?php
            $resultat = mysqli_query($db, "SELECT klassekode FROM klasse");
            while ($rad = mysqli_fetch_assoc($resultat)) {
                echo "<option value='" . htmlspecialchars($rad['klassekode']) . "'>" .
                     htmlspecialchars($rad['klassekode']) .
                     "</option>";
            }
            ?>
        </select>
    </label><br>
    <input type="submit" value="Slett klasse">
</form>

<script>
function bekreftSletting() {
    return confirm("Er du sikker på at du vil slette denne klassen?");
}
</script>

<a href="../index.php">Tilbake</a>
