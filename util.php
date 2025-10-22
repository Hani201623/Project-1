<?php
header('Content-Type: application/json');

function send_json($data, $status=200){
  http_response_code($status);
  echo json_encode($data);
  exit;
}

function get_json_body(){
  $raw = file_get_contents('php://input');
  $data = json_decode($raw, true);
  return $data ?: [];
}

function get_auth_header() {
  // Try common server vars first
  if (!empty($_SERVER['HTTP_AUTHORIZATION'])) return $_SERVER['HTTP_AUTHORIZATION'];
  if (!empty($_SERVER['Authorization'])) return $_SERVER['Authorization'];
  if (!empty($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) return $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];

  // Fallback for Apache on Windows
  if (function_exists('apache_request_headers')) {
    $h = apache_request_headers();
    foreach ($h as $k => $v) {
      if (strcasecmp($k, 'Authorization') === 0) return $v;
    }
  }
  return '';
}

function bearer_user(){
  $hdr = get_auth_header();
  if (preg_match('/Bearer\s+(.+)/i', $hdr, $m)) {
    $token = trim($m[1]);
    if ($token === 'DEMO_TOKEN_123') return ['id'=>1,'username'=>'demo'];
  }
  return null;
}

function require_auth(){
  $u = bearer_user();
  if (!$u) send_json(['error'=>'Unauthorized'], 401);
  return $u;
}
