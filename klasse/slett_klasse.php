<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST["klassekode"];
    $stmt = $conn->prepare("DELETE FROM klasse WHERE klassekode = ?");
    $stmt->execute([$kode]);
    echo "Klasse slettet!";
}

$stmt = $conn->query("SELECT klassekode, klassenavn FROM klasse");
$klasser = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="post">
    <select name="klassekode">
        <?php foreach ($klasser as $klasse) {
            echo "<option value='{$klasse['klassekode']}'>{$klasse['klassenavn']}</option>";
        } ?>
    </select>
    <input type="submit" value="Slett klasse">
</form>