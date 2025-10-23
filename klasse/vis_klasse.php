<?php
require_once("../db.php");

$stmt = $conn->query("SELECT * FROM klasse");
$klasser = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Vis klasser</title>
</head>
<body>
  <h1>Klasser</h1>
  <table border="1">
    <tr>
      <th>Klassekode</th>
      <th>Klassenavn</th>
      <th>Studiumkode</th>
    </tr>
    <?php foreach ($klasser as $rad): ?>
      <tr>
        <td><?= htmlspecialchars($rad["klassekode"]) ?></td>
        <td><?= htmlspecialchars($rad["klassenavn"]) ?></td>
        <td><?= htmlspecialchars($rad["studiumkode"]) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="../index.php">Tilbake</a></p>
</body>
</html>
