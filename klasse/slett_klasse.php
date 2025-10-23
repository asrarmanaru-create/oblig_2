<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];

    
    $stmt1 = mysqli_prepare($db, "DELETE FROM student WHERE klassekode = ?");
    mysqli_stmt_bind_param($stmt1, "s", $klassekode);
    mysqli_stmt_execute($stmt1);

    
    $stmt2 = mysqli_prepare($db, "DELETE FROM klasse WHERE klassekode = ?");
    mysqli_stmt_bind_param($stmt2, "s", $klassekode);
    mysqli_stmt_execute($stmt2);

    echo "✅ Klasse <strong>" . htmlspecialchars($klassekode) . "</strong> og tilhørende studenter er slettet.";
}
?>

<h2>Slett klasse</h2>
<form method="POST" onsubmit="return bekreftSletting();">
    <label>Klassekode: <input type="text" name="klassekode" required></label><br>
    <input type="submit" value="Slett klasse">
</form>

<script>
function bekreftSletting() {
    return confirm("Er du sikker på at du vil slette denne klassen?");
}
</script>

<a href="../index.php">Tilbake</a>
