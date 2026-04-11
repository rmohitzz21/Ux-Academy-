<?php
// ========================================
// UX Academy - Head Include
// ========================================

// Ensure config is loaded
if (!defined('BASE_PATH')) {
    require_once dirname(__FILE__) . '/config.php';
}

// Get current page for title
$pageTitle = $pageTitle ?? 'UX Pacific Academy';
$pageDescription = $pageDescription ?? 'Join our community of designers and developers creating the future of digital experiences.';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo e($pageDescription); ?>" />
    <meta name="keywords" content="UX Design, UI Design, Design Academy, Web Design" />
    <meta name="author" content="UX Pacific" />
    <meta name="theme-color" content="#667eea" />

    <title><?php echo e($pageTitle); ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>/img/faviconUXP444@4x-789.png" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/animated-hero.css" />

    <!-- Additional styles can be added here -->
</head>

<body>
