<?php
// ========================================
// UX Academy - Email Notification Handler
// ========================================

/**
 * Send admin notification email when new contact form is submitted
 */
function sendContactNotificationEmail($data) {
    $subject = 'New Contact Form Submission: ' . e($data['subject']);

    $messageBody = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #667eea; }
        .footer { background: #f0f0f0; padding: 15px; border-radius: 0 0 5px 5px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Submission</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>Name:</div>
                <div>" . e($data['name']) . "</div>
            </div>
            <div class='field'>
                <div class='label'>Email:</div>
                <div>" . e($data['email']) . "</div>
            </div>
            <div class='field'>
                <div class='label'>Phone:</div>
                <div>" . e($data['phone']) . "</div>
            </div>
            <div class='field'>
                <div class='label'>Subject:</div>
                <div>" . e($data['subject']) . "</div>
            </div>
            <div class='field'>
                <div class='label'>Message:</div>
                <div>" . nl2br(e($data['message'])) . "</div>
            </div>
        </div>
        <div class='footer'>
            <p>Submitted at: " . date('Y-m-d H:i:s') . " | From: " . getClientIP() . "</p>
        </div>
    </div>
</body>
</html>
    ";

    return sendEmail(
        ADMIN_EMAIL,
        ADMIN_NAME,
        $subject,
        $messageBody,
        e($data['email']),
        e($data['name'])
    );
}

/**
 * Send confirmation email to the user
 */
function sendConfirmationEmail($email, $name) {
    $subject = 'We Received Your Message - ' . SITE_NAME;

    $messageBody = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .footer { background: #f0f0f0; padding: 15px; border-radius: 0 0 5px 5px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Thank You for Contacting Us</h2>
        </div>
        <div class='content'>
            <p>Hello " . e($name) . ",</p>
            <p>We have received your message and thank you for reaching out to " . SITE_NAME . ".</p>
            <p>Our team will review your inquiry and get back to you as soon as possible. If your message is urgent,
            you can also reach us directly at " . e(ADMIN_EMAIL) . "</p>
            <p><strong>Best regards,</strong><br>" . e(ADMIN_NAME) . "</p>
        </div>
        <div class='footer'>
            <p>© " . date('Y') . " " . SITE_NAME . ". All rights reserved.</p>
        </div>
    </div>
</body>
</html>
    ";

    return sendEmail(
        $email,
        $name,
        $subject,
        $messageBody,
        MAIL_FROM_EMAIL,
        MAIL_FROM_NAME
    );
}

/**
 * Generic email sending function
 * Tries PHPMailer first, falls back to mail() function
 */
function sendEmail($toEmail, $toName, $subject, $content, $fromEmail = null, $fromName = null) {
    $fromEmail = $fromEmail ?: MAIL_FROM_EMAIL;
    $fromName = $fromName ?: MAIL_FROM_NAME;

    // Try using PHPMailer if available
    if (tryPHPMailer($toEmail, $toName, $subject, $content, $fromEmail, $fromName)) {
        return true;
    }

    // Fallback to PHP mail() function
    return sendEmailWithMailFunction($toEmail, $toName, $subject, $content, $fromEmail, $fromName);
}

/**
 * Send email using PHPMailer (preferred method)
 */
function tryPHPMailer($toEmail, $toName, $subject, $content, $fromEmail, $fromName) {
    try {
        // Check if PHPMailer is available
        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            return false;
        }

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = MAIL_ENCRYPTION;
        $mail->Port = MAIL_PORT;

        // Recipients
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);
        $mail->addReplyTo($fromEmail, $fromName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = strip_tags($content);

        // Send
        $mail->send();

        logActivity('email_sent_phpmailer', "To: $toEmail, Subject: $subject");
        return true;

    } catch (Exception $e) {
        error_log("PHPMailer Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Send email using PHP mail() function (fallback)
 */
function sendEmailWithMailFunction($toEmail, $toName, $subject, $content, $fromEmail, $fromName) {
    try {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $fromName . " <" . $fromEmail . ">\r\n";
        $headers .= "Reply-To: " . $fromEmail . "\r\n";

        $to = $toName ? "$toName <$toEmail>" : $toEmail;

        $result = mail($to, $subject, $content, $headers);

        if ($result) {
            logActivity('email_sent_mail_function', "To: $toEmail, Subject: $subject");
        } else {
            error_log("Mail function failed for: $toEmail");
        }

        return $result;

    } catch (Exception $e) {
        error_log("Mail Function Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Send email to admin for new application
 */
function sendApplicationNotificationEmail($data) {
    $subject = 'New Application Received';

    $messageBody = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: #667eea; color: white; padding: 20px; }
        .content { padding: 20px; background: #f9f9f9; }
        .field { margin: 10px 0; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Application Submission</h2>
        </div>
        <div class='content'>
            <div class='field'><strong>Name:</strong> " . e($data['fullName'] ?? '') . "</div>
            <div class='field'><strong>Email:</strong> " . e($data['email'] ?? '') . "</div>
            <div class='field'><strong>Phone:</strong> " . e($data['phone'] ?? '') . "</div>
            <div class='field'><strong>Message:</strong> " . nl2br(e($data['message'] ?? '')) . "</div>
        </div>
    </div>
</body>
</html>
    ";

    return sendEmail(
        ADMIN_EMAIL,
        ADMIN_NAME,
        $subject,
        $messageBody,
        $data['email'] ?? MAIL_FROM_EMAIL,
        $data['fullName'] ?? ''
    );
}
