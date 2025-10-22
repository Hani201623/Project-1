<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');
require_auth();

$id = $_GET['id'] ?? null;
if (!$id) send_json(['error'=>'id is required'], 400);
$data = get_json_body();
$name = $data['name'] ?? null;
if (!$name) send_json(['error'=>'name is required'], 400);

$pdo->prepare("UPDATE categories SET name=:n WHERE id=:id")->execute([':n'=>$name, ':id'=>$id]);
send_json(['updated'=>true]);
?>
