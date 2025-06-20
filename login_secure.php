<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

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

$username = trim($input['username'] ?? '');
$password = trim($input['password'] ?? '');

// Validate input
if (empty($username) || empty($password)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Username and password are required']);
    exit;
}

// Secure credentials (in production, these should be in environment variables)
$correctUsername = 'MiranCS';
$correctPassword = '558858';

// Hash the correct password (this should be done once and stored)
// For demonstration, we'll hash it each time, but in production you'd store the hash
$hashedPassword = password_hash($correctPassword, PASSWORD_DEFAULT);

// Verify credentials
if ($username === $correctUsername && password_verify($password, $hashedPassword)) {
    // Start session for additional security
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Set session variables
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['login_time'] = time();
    
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