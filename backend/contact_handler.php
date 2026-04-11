<?php
// ========================================
// UX Academy - Contact Form Handler
// Email-Only Mode (No Database Storage)
// ========================================

// Prevent direct access
if (PHP_SAPI === 'cli') {
    die('This file cannot be accessed from the command line.');
}

// Include dependencies
require_once dirname(dirname(__FILE__)) . '/includes/config.php';
require_once dirname(__FILE__) . '/security.php';
require_once dirname(__FILE__) . '/validation.php';
require_once dirname(__FILE__) . '/mailer.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendError('Method not allowed', [], 405);
}

// Verify CSRF token
if (!verifyCsrfForSubmission()) {
    logSecurityEvent('csrf_token_failure', 'Invalid or missing CSRF token');
    sendError('Security token validation failed. Please refresh and try again.', array(), 403);
}

// Get JSON input
$input = isJsonRequest() ? getJsonInput() : $_POST;

// Validate required fields
$requiredFields = ['name', 'email', 'phone', 'subject', 'message'];
foreach ($requiredFields as $field) {
    if (empty($input[$field])) {
        sendError('Missing required fields', [$field => "This field is required"], 400);
    }
}

// Check rate limiting (session-based)
$rateLimit = checkRateLimit('contact');
if (!$rateLimit['allowed']) {
    logSecurityEvent('rate_limit_exceeded', 'Contact form submission rate limited');
    sendError(
        'You are submitting too frequently. Please wait a moment and try again.',
        array(),
        429
    );
}

// Validate form data
$validation = validateContactForm($input);
if (!$validation['valid']) {
    sendError('Validation failed', $validation['errors'], 400);
}

// Get clean data
$data = getValidatedData($input, ['name', 'email', 'phone', 'subject', 'message']);

// Send email notification (no database storage)
try {
    sendContactNotificationEmail($data);
    sendConfirmationEmail($data['email'], $data['name']);

    logActivity('contact_form_submitted', "Name: {$data['name']}, Email: {$data['email']}");

    sendSuccess(
        'Thank you! Your message has been received. We will get back to you shortly.',
        []
    );

} catch (Exception $e) {
    error_log("Email sending error: " . $e->getMessage());
    logActivity('email_send_failed', "Error: " . $e->getMessage());
    sendError('An error occurred while sending your message. Please try again later.', array(), 500);
}

