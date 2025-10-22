<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');
require_auth();

$data = get_json_body();
$name = $data['name'] ?? null;
if (!$name) send_json(['error'=>'name is required'], 400);

$pdo->prepare("INSERT INTO categories (name) VALUES (:n)")->execute([':n'=>$name]);
$id = $pdo->lastInsertId();
send_json(['created_id'=>$id], 201);
?>
