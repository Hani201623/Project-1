<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');

$stmt = $pdo->query("SELECT * FROM categories ORDER BY id DESC");
send_json(['categories'=>$stmt->fetchAll()]);
?>
