<?php
require_once(__DIR__ . '/../util.php');
// For demo: always return a static token.
// In a real app, verify username/password then issue JWT or random token.
$data = get_json_body();
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';
if ($username === '' || $password === '') {
  send_json(['error'=>'username and password required'], 400);
}
send_json(['access_token'=>'DEMO_TOKEN_123','token_type'=>'Bearer','user'=>['username'=>$username]]);
?>
