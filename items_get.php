<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');

// GET /api/items?search=...&category_id=...
$search = $_GET['search'] ?? '';
$category_id = $_GET['category_id'] ?? '';

$sql = "SELECT i.*, c.name AS category_name FROM items i LEFT JOIN categories c ON i.category_id=c.id WHERE 1=1";
$params = [];
if ($search !== '') { $sql .= " AND (i.name LIKE :s OR i.sku LIKE :s2)"; $params[':s'] = "%$search%"; $params[':s2'] = "%$search%"; }
if ($category_id !== '') { $sql .= " AND i.category_id=:cid"; $params[':cid'] = $category_id; }

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
send_json(['items'=>$stmt->fetchAll()]);
?>
