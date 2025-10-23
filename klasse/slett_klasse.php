<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $kode = $_POST["klassekode"];
    $stmt = $conn->prepare("DELETE FROM klasse WHERE klassekode = ?");
    $stmt->execute([$kode]);
    echo "<p>Klasse slettet!</p>";
}

$klasser = $conn->query("SELECT klassekode FROM klasse")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Slett klasse</title></head>
<body>
  <h1>Slett klasse</h1>
  <form method="post">
    <select name="klassekode">
      <?php foreach ($klasser as $k): ?>
        <option value="<?= htmlspecialchars($k['klassekode']) ?>"><?= htmlspecialchars($k['klassekode']) ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit">Slett</button>
  </form>
  <p><a href="../index.php">Tilbake</a></p>
</body>
</html>
