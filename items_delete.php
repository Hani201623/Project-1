<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');
require_auth();

$id = $_GET['id'] ?? null;
if (!$id) send_json(['error'=>'id is required'], 400);

$pdo->prepare("DELETE FROM items WHERE id=:id")->execute([':id'=>$id]);
send_json(['deleted'=>true]);
?>
