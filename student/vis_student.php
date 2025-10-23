<?php
require_once("../db.php");

$resultat = mysqli_query($db, "SELECT * FROM student");

echo "<h2>Studenter</h2>";
echo "<table border='1'>";
echo "<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>";

while ($rad = mysqli_fetch_assoc($resultat)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($rad['brukernavn']) . "</td>";
    echo "<td>" . htmlspecialchars($rad['fornavn']) . "</td>";
    echo "<td>" . htmlspecialchars($rad['etternavn']) . "</td>";
    echo "<td>" . htmlspecialchars($rad['klassekode']) . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='../index.php'>Tilbake</a>";
?>
