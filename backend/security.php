<?php
// ========================================
// UX Academy - Security & Sanitization
// ========================================

/**
 * Escape HTML output to prevent XSS attacks
 */
function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize input for database storage
 */
function sanitize($input) {
    if (is_array($input)) {
        return array_map('sanitize', $input);
    }

    // Remove whitespace from start and end
    $input = trim($input);

    // Remove any HTML/PHP tags
    $input = strip_tags($input);

    // Escape for safe output
    return $input;
}

/**
 * Validate email address
 */
function isValidEmail($email) {
    $email = sanitize($email);
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number (basic check)
 * Allows formats: +91 9876543210, 9876543210, +1-234-567-8900, etc.
 */
function isValidPhone($phone) {
    $phone = sanitize($phone);
    // Remove all non-numeric characters except + and -
    $digits = preg_replace('/[^\d\+\-]/', '', $phone);
    // Check if it has at least 7 digits and max 15 digits (E.164 standard)
    return strlen($digits) >= 7 && strlen($digits) <= 15;
}

/**
 * Rate limit check using sessions
 * Returns: ['allowed' => true/false, 'reset_time' => timestamp]
 */
function checkRateLimit($formType = 'contact') {
    $minutesLimit = FORM_RATE_LIMIT_MINUTES;
    $submissionsLimit = FORM_RATE_LIMIT_SUBMISSIONS;
    $ip = getClientIP();

    // Initialize or get stored rate limit data
    $rateLimitKey = 'rate_limit_' . $formType . '_' . md5($ip);

    if (!isset($_SESSION[$rateLimitKey])) {
        // First submission from this IP
        $_SESSION[$rateLimitKey] = [
            'count' => 1,
            'first_time' => time(),
            'last_time' => time()
        ];

        return [
            'allowed' => true,
            'reset_time' => time() + ($minutesLimit * 60)
        ];
    }

    $limit = $_SESSION[$rateLimitKey];
    $timeSinceLastSubmission = time() - $limit['last_time'];
    $resetWindow = $minutesLimit * 60;

    // If enough time has passed, reset counter
    if ($timeSinceLastSubmission >= $resetWindow) {
        $_SESSION[$rateLimitKey] = [
            'count' => 1,
            'first_time' => time(),
            'last_time' => time()
        ];

        return [
            'allowed' => true,
            'reset_time' => time() + $resetWindow
        ];
    }

    // Check if limit exceeded
    if ($limit['count'] >= $submissionsLimit) {
        $resetTime = $resetWindow - $timeSinceLastSubmission;
        logActivity('rate_limit_exceeded', "IP: $ip, Form: $formType, Attempts: {$limit['count']}");

        return [
            'allowed' => false,
            'reset_time' => time() + $resetTime
        ];
    }

    // Increment counter
    $_SESSION[$rateLimitKey]['count']++;
    $_SESSION[$rateLimitKey]['last_time'] = time();

    return [
        'allowed' => true,
        'reset_time' => time() + $resetWindow
    ];
}

/**
 * Check if request is JSON
 */
function isJsonRequest() {
    return isset($_SERVER['CONTENT_TYPE']) &&
           strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false;
}

/**
 * Get JSON input from request body
 */
function getJsonInput() {
    $input = file_get_contents('php://input');
    return json_decode($input, true) ?: [];
}

/**
 * Verify CSRF for form submissions
 */
function verifyCsrfForSubmission() {
    $token = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isJsonRequest()) {
            $data = getJsonInput();
            $token = $data['csrf_token'] ?? null;
        } else {
            $token = $_POST['csrf_token'] ?? null;
        }
    }

    return verifyCsrfToken($token);
}

/**
 * Log security event
 */
function logSecurityEvent($event, $details = '') {
    $ip = getClientIP();
    $userAgent = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500);

    error_log("[SECURITY] $event | IP: $ip | Details: $details | User-Agent: $userAgent");
    logActivity('security_event', "$event | $details");
}
