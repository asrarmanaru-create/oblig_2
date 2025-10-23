<?php
include "../db.php";

$stmt = $conn->query("SELECT * FROM klasse");
$klasser = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Alle klasser</h2>";
echo "<table border='1'><tr><th>Kode</th><th>Navn</th><th>Studium</th></tr>";
foreach ($klasser as $klasse) {
    echo "<tr>
            <td>{$klasse['klassekode']}</td>
            <td>{$klasse['klassenavn']}</td>
            <td>{$klasse['studiumkode']}</td>
          </tr>";
}
echo "</table>";
?>
