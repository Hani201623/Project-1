<?php
require_once __DIR__ . '/../code/util.php';
$user = require_auth();
send_json(['user' => $user]);
