<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

$username = $input['username'] ?? '';
$password = $input['password'] ?? '';

// Secure password verification
$correctUsername = 'MiranCS';
$correctPassword = '558858';

// Use password_verify for secure comparison (if you want to use hashed passwords)
// For now, using direct comparison but you can hash the password
$hashedPassword = password_hash($correctPassword, PASSWORD_DEFAULT);

if ($username === $correctUsername && password_verify($password, $hashedPassword)) {
    echo json_encode([
        'success' => true,
        'message' => 'Login successful'
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'هەڵەیە. دووبارە هەوڵ بدە!'
    ]);
}
?> 