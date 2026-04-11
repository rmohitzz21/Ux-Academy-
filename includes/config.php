<?php
// ========================================
// UX Academy - Database & Configuration
// ========================================

// Session configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to users
ini_set('log_errors', 1);

// Define base directory
define('BASE_PATH', dirname(dirname(__FILE__)));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('BACKEND_PATH', BASE_PATH . '/backend');

// Load environment variables from .env
function loadEnv($file) {
    if (!file_exists($file)) {
        throw new Exception("Environment file not found: $file");
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse key=value
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if ($key && $value) {
            putenv("$key=$value");
            $_ENV[$key] = $value;
        }
    }
}

// Load .env file
try {
    loadEnv(BASE_PATH . '/.env');
} catch (Exception $e) {
    error_log("Error loading .env: " . $e->getMessage());
}

// ========================================
// Database Configuration Constants
// ========================================
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: 3306);
define('DB_NAME', getenv('DB_NAME') ?: 'ux_academy');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_CHARSET', 'utf8mb4');

// ========================================
// Site Configuration Constants
// ========================================
define('SITE_NAME', getenv('SITE_NAME') ?: 'UX Pacific Academy');
define('SITE_URL', getenv('SITE_URL') ?: 'http://localhost/Ux/Ux-Academy-');
define('ADMIN_EMAIL', getenv('ADMIN_EMAIL') ?: 'hello@uxpacific.com');
define('ADMIN_NAME', getenv('ADMIN_NAME') ?: 'UX Pacific');

// ========================================
// Email Configuration Constants
// ========================================
define('MAIL_HOST', getenv('MAIL_HOST') ?: 'localhost');
define('MAIL_PORT', getenv('MAIL_PORT') ?: 587);
define('MAIL_USERNAME', getenv('MAIL_USERNAME') ?: '');
define('MAIL_PASSWORD', getenv('MAIL_PASSWORD') ?: '');
define('MAIL_FROM_EMAIL', getenv('MAIL_FROM_EMAIL') ?: ADMIN_EMAIL);
define('MAIL_FROM_NAME', getenv('MAIL_FROM_NAME') ?: ADMIN_NAME);
define('MAIL_ENCRYPTION', getenv('MAIL_ENCRYPTION') ?: 'tls');

// ========================================
// Security Configuration Constants
// ========================================
define('FORM_RATE_LIMIT_MINUTES', getenv('FORM_RATE_LIMIT_MINUTES') ?: 1);
define('FORM_RATE_LIMIT_SUBMISSIONS', getenv('FORM_RATE_LIMIT_SUBMISSIONS') ?: 1);
define('CSRF_TOKEN_LENGTH', getenv('CSRF_TOKEN_LENGTH') ?: 32);
define('SESSION_LIFETIME', getenv('SESSION_LIFETIME') ?: 3600);

// ========================================
// Environment & Debug Constants
// ========================================
define('ENVIRONMENT', getenv('ENVIRONMENT') ?: 'development');
define('DEBUG', getenv('DEBUG') === 'true');
define('LOG_ERRORS', getenv('LOG_ERRORS') === 'true');
define('LOG_PATH', BASE_PATH . (getenv('LOG_PATH') ?: '/logs'));

// ========================================
// Email-Only Mode (No Database)
// ========================================
// This version uses email notifications only.
// No database connection required.

// ========================================
// Utility Functions
// ========================================

/**
 * Get the client's IP address
 */
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '127.0.0.1';
}

/**
 * Log an activity to file
 */
function logActivity($action, $details = '') {
    if (!LOG_ERRORS) {
        return;
    }

    // Create logs directory if it doesn't exist
    $logsDir = BASE_PATH . '/logs';
    if (!is_dir($logsDir)) {
        @mkdir($logsDir, 0755, true);
    }

    $logFile = $logsDir . '/activity.log';
    $timestamp = date('Y-m-d H:i:s');
    $ip = getClientIP();
    $message = "[$timestamp] [$action] $details (IP: $ip)\n";

    @file_put_contents($logFile, $message, FILE_APPEND);
}

/**
 * Send JSON response
 */
function sendJSON($data, $status = 200) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

/**
 * Send error response
 */
function sendError($message, $errors = [], $status = 400) {
    sendJSON([
        'success' => false,
        'message' => $message,
        'errors' => $errors
    ], $status);
}

/**
 * Send success response
 */
function sendSuccess($message, $data = [], $status = 200) {
    sendJSON(array_merge([
        'success' => true,
        'message' => $message
    ], $data), $status);
}

// ========================================
// Session Management
// ========================================

/**
 * Generate CSRF token
 */
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(CSRF_TOKEN_LENGTH));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Get CSRF token
 */
function getCsrfToken() {
    return $_SESSION['csrf_token'] ?? '';
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
