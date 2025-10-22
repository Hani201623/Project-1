<?php
header('Content-Type: application/json');

// Basic route check: confirms the file is reachable.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(["error" => "Use POST"]);
  exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === 'demo' && $password === 'demo') {
  echo json_encode([
    "access_token" => "DEMO_TOKEN_123",
    "token_type"   => "Bearer",
    "user"         => ["username" => "demo"]
  ]);
} else {
  http_response_code(401);
  echo json_encode(["error" => "Invalid credentials"]);
}
 	