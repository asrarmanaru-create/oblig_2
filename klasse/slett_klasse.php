<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];

    // Først må vi slette studenter som tilhører klassen (pga. FOREIGN KEY)
    $stmt1 = mysqli_prepare($db, "DELETE FROM student WHERE klassekode = ?");
    mysqli_stmt_bind_param($stmt1, "s", $klassekode);
    mysqli_stmt_execute($stmt1);

    // Deretter sletter vi selve klassen
    $stmt2 = mysqli_prepare($db, "DELETE FROM klasse WHERE klassekode = ?");
    mysqli_stmt_bind_param($stmt2, "s", $klassekode);
    mysqli_stmt_execute($stmt2);

    echo "Klasse med kode <strong>$klassekode</strong> og tilhørende studenter er slettet.";
}
?>

<h2>Slett klasse</h2>
<form method="POST">
    <label>Klassekode: <input type="text" name="klassekode" required></label><br>
    <input type="submit" value="Slett klasse">
</form>
<a href="../index.php">Tilbake</a>
