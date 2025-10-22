<?php
require_once(__DIR__ . '/../util.php');
$user = require_auth();
send_json(['user'=>$user]);
?>
