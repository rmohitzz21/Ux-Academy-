<?php
require_once dirname(__FILE__) . '/includes/config.php';

$pageTitle = 'Privacy Policy - UX Pacific Academy';
$pageDescription = 'Privacy Policy for UX Pacific Academy.';
$currentPage = 'privacy';

require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>

    <main id="home" class="main">
        <div class="hero-title-wrapper">
            <h1>Privacy Policy</h1>
            <p class="subtitle">
                Your privacy is important to us. Learn how we collect, use, and protect your personal information.
            </p>
        </div>

        <section class="privacy-section" style="padding: 40px 20px; max-width: 900px; margin: 0 auto;">
            <h2 style="margin-top: 30px; margin-bottom: 15px;">Introduction</h2>
            <p>
                This Privacy Policy ("Policy") explains how UX Pacific Academy ("we," "us," "our," or "Company") collects, uses, discloses, and otherwise processes personal information in connection with the website www.uxpacific.com (the "Website") and related services ("Services").
            </p>

            <h2 style="margin-top: 30px; margin-bottom: 15px;">Information We Collect</h2>
            <p>
                We collect information you provide directly to us, such as when you fill out a form, sign up for our courses, or contact us. This may include:
            </p>
            <ul style="margin: 15px 0; padding-left: 20px;">
                <li>Name and email address</li>
                <li>Phone number</li>
                <li>Portfolio or website links</li>
                <li>Educational background</li>
                <li>Career information</li>
            </ul>

            <h2 style="margin-top: 30px; margin-bottom: 15px;">How We Use Your Information</h2>
            <p>
                We use the information we collect for various purposes:
            </p>
            <ul style="margin: 15px 0; padding-left: 20px;">
                <li>To provide and improve our Services</li>
                <li>To communicate with you about your inquiries</li>
                <li>To send you educational materials and updates</li>
                <li>To process your applications</li>
                <li>To comply with legal obligations</li>
            </ul>

            <h2 style="margin-top: 30px; margin-bottom: 15px;">Data Security</h2>
            <p>
                We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.
            </p>

            <h2 style="margin-top: 30px; margin-bottom: 15px;">Contact Us</h2>
            <p>
                If you have questions about this Privacy Policy or our privacy practices, please contact us at:
            </p>
            <p style="margin-left: 20px;">
                <strong>Email:</strong> <?php echo e(ADMIN_EMAIL); ?><br>
                <strong>Address:</strong> UX Pacific, Ahmedabad, India
            </p>
        </section>
    </main>

<?php
require_once INCLUDES_PATH . '/footer.php';
?>

    <script src="<?php echo SITE_URL; ?>/js/main.js"></script>
