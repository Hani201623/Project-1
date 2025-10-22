<?php
require_once __DIR__ . '/../code/db.php';
require_once __DIR__ . '/../code/util.php';

require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $rows = $pdo->query("SELECT id, category_id, name, sku, qty, price, created_at FROM items ORDER BY id")->fetchAll();
  send_json(['items' => $rows]);
}
send_json(['error' => 'Method not allowed'], 405);
