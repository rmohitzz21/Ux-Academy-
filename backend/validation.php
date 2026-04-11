<?php
// ========================================
// UX Academy - Form Validation
// ========================================

/**
 * Validate contact form data
 * Returns: ['valid' => true/false, 'errors' => [field => message]]
 */
function validateContactForm($data) {
    $errors = [];

    // Name validation
    if (empty($data['name'])) {
        $errors['name'] = 'Name is required';
    } else {
        $name = sanitize($data['name']);
        if (strlen($name) < 3) {
            $errors['name'] = 'Name must be at least 3 characters';
        } elseif (strlen($name) > 255) {
            $errors['name'] = 'Name must not exceed 255 characters';
        } elseif (!preg_match('/^[a-zA-Z\s\-\.\']+$/', $name)) {
            $errors['name'] = 'Name contains invalid characters';
        }
    }

    // Email validation
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required';
    } else {
        $email = sanitize($data['email']);
        if (!isValidEmail($email)) {
            $errors['email'] = 'Please enter a valid email address';
        } elseif (strlen($email) > 255) {
            $errors['email'] = 'Email must not exceed 255 characters';
        }
    }

    // Phone validation
    if (empty($data['phone'])) {
        $errors['phone'] = 'Phone number is required';
    } else {
        $phone = sanitize($data['phone']);
        if (!isValidPhone($phone)) {
            $errors['phone'] = 'Please enter a valid phone number';
        } elseif (strlen($phone) > 20) {
            $errors['phone'] = 'Phone number must not exceed 20 characters';
        }
    }

    // Subject validation
    if (empty($data['subject'])) {
        $errors['subject'] = 'Subject is required';
    } else {
        $subject = sanitize($data['subject']);
        if (strlen($subject) < 3) {
            $errors['subject'] = 'Subject must be at least 3 characters';
        } elseif (strlen($subject) > 255) {
            $errors['subject'] = 'Subject must not exceed 255 characters';
        }
    }

    // Message validation
    if (empty($data['message'])) {
        $errors['message'] = 'Message is required';
    } else {
        $message = sanitize($data['message']);
        if (strlen($message) < 10) {
            $errors['message'] = 'Message must be at least 10 characters';
        } elseif (strlen($message) > 5000) {
            $errors['message'] = 'Message must not exceed 5000 characters';
        }
    }

    return [
        'valid' => count($errors) === 0,
        'errors' => $errors
    ];
}

/**
 * Validate application form data
 */
function validateApplicationForm($data) {
    $errors = [];

    // Full Name
    if (empty($data['fullName'])) {
        $errors['fullName'] = 'Full name is required';
    } else {
        $name = sanitize($data['fullName']);
        if (strlen($name) < 3 || strlen($name) > 255) {
            $errors['fullName'] = 'Full name must be between 3 and 255 characters';
        }
    }

    // Email
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required';
    } else {
        if (!isValidEmail($data['email'])) {
            $errors['email'] = 'Please enter a valid email address';
        }
    }

    // Phone
    if (empty($data['phone'])) {
        $errors['phone'] = 'Phone number is required';
    } else {
        if (!isValidPhone($data['phone'])) {
            $errors['phone'] = 'Please enter a valid phone number';
        }
    }

    // Program (if present)
    if (!empty($data['program'])) {
        $validPrograms = ['UI/UX Design', 'Graphic Design', 'Web Design'];
        if (!in_array($data['program'], $validPrograms)) {
            $errors['program'] = 'Please select a valid program';
        }
    }

    // Message
    if (empty($data['message']) || strlen(sanitize($data['message'])) < 10) {
        $errors['message'] = 'Message must be at least 10 characters';
    }

    return [
        'valid' => count($errors) === 0,
        'errors' => $errors
    ];
}

/**
 * Validate pricing form
 */
function validatePricingForm($data) {
    $errors = [];

    // Name
    if (empty($data['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (strlen(sanitize($data['name'])) < 3) {
        $errors['name'] = 'Name must be at least 3 characters';
    }

    // Email
    if (empty($data['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!isValidEmail($data['email'])) {
        $errors['email'] = 'Please enter a valid email address';
    }

    return [
        'valid' => count($errors) === 0,
        'errors' => $errors
    ];
}

/**
 * Clean and return validated data
 */
function getValidatedData($data, $allowedFields) {
    $validated = [];

    foreach ($allowedFields as $field) {
        $validated[$field] = sanitize($data[$field] ?? '');
    }

    return $validated;
}
