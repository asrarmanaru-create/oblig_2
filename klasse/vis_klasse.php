<?php
require_once("../db.php");

$resultat = mysqli_query($db, "SELECT * FROM klasse");

echo "<h2>Klasser</h2>";
echo "<table border='1'>";
echo "<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>";

while ($rad = mysqli_fetch_assoc($resultat)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($rad['klassekode']) . "</td>";
    echo "<td>" . htmlspecialchars($rad['klassenavn']) . "</td>";
    echo "<td>" . htmlspecialchars($rad['studiumkode']) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='../index.php'>Tilbake</a>";
?>