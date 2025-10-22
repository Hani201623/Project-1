<?php
require_once(__DIR__ . '/../db.php');
require_once(__DIR__ . '/../util.php');
require_auth();

$id = $_GET['id'] ?? null;
if (!$id) send_json(['error'=>'id is required'], 400);

$data = get_json_body();
$fields = [];
$params = [':id'=>$id];
foreach (['name','sku','qty','price','category_id'] as $f){
  if (isset($data[$f])){
    $fields[] = "$f = :$f";
    $params[":$f"] = $data[$f];
  }
}
if (!$fields) send_json(['error'=>'no fields to update'], 400);

$sql = "UPDATE items SET " . implode(',', $fields) . " WHERE id=:id";
$pdo->prepare($sql)->execute($params);
send_json(['updated'=>true]);
?>
