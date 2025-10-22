<?php
require_once __DIR__ . '/../code/db.php';
require_once __DIR__ . '/../code/util.php';

require_auth();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $rows = $pdo->query("SELECT id, name, created_at FROM categories ORDER BY id")->fetchAll();
  send_json(['categories' => $rows]);
}
send_json(['error' => 'Method not allowed'], 405);
