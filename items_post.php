<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');
require_auth();

$data = get_json_body();
$name = $data['name'] ?? null;
$sku = $data['sku'] ?? null;
$qty = intval($data['qty'] ?? 0);
$price = floatval($data['price'] ?? 0);
$category_id = $data['category_id'] ?? null;

if (!$name) send_json(['error'=>'name is required'], 400);

$stmt = $pdo->prepare("INSERT INTO items (name, sku, qty, price, category_id) VALUES (:n,:s,:q,:p,:c)");
$stmt->execute([':n'=>$name, ':s'=>$sku, ':q'=>$qty, ':p'=>$price, ':c'=>$category_id]);
$id = $pdo->lastInsertId();
send_json(['created_id'=>$id], 201);
?>
