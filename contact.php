<?php
// ========================================
// UX Academy - Contact Page
// ========================================

require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/backend/security.php';

// Set page info
$pageTitle = 'Contact Us - UX Pacific Academy';
$pageDescription = 'Get in touch with us. We\'d love to hear from you!';
$currentPage = 'contact';

// Generate CSRF token for form
$csrf_token = generateCsrfToken();

// Include head
require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>

    <main id="home" class="main">

        <div class="hero-title-wrapper">
            <h1>Contact Us</h1>
            <p class="subtitle">
                Have a question or want to learn more about UX Pacific Community? We'd love to hear from you.
                Send us a message and we'll respond as soon as possible.
            </p>
        </div>

        <section id="contact" class="contact-section">
            <div class="contact-grid">
                <!-- LEFT: Image card -->
                <div class="contact-image">
                    <img src="<?php echo SITE_URL; ?>/img/ct.png" alt="Contact screen mockup">
                </div>

                <!-- RIGHT: Form (no card background) -->
                <form class="contact-form">
                    <!-- CSRF Token -->
                    <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token); ?>">

                    <div class="contact-row">
                        <div class="contact-field">
                            <label for="name">Name <span style="color: red;">*</span></label>
                            <input id="name" name="name" type="text" placeholder="Enter your name here" required>
                        </div>
                        <div class="contact-field">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input id="email" name="email" type="email" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-field">
                            <label for="phone">Phone Number <span style="color: red;">*</span></label>
                            <input id="phone" name="phone" type="tel" placeholder="+91 xxxxx- xxxxx" required>
                        </div>
                        <div class="contact-field">
                            <label for="subject">Subject <span style="color: red;">*</span></label>
                            <input id="subject" name="subject" type="text" placeholder="Write your Subject" required>
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="message">Message <span style="color: red;">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Enter your message here...." required></textarea>
                    </div>

                    <!-- Success/Error Message Display -->
                    <div id="formMessage" style="display: none; padding: 10px; margin-bottom: 15px; border-radius: 4px; font-weight: 500;"></div>

                    <div class="contact-footer">
                        <label class="contact-checkbox">
                            <input type="checkbox" required>
                            <span>
                                I Agree to
                                <a href="<?php echo SITE_URL; ?>/terms.php" class="contact-link">Terms &amp; Condition</a>
                                of UXPacific
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary contact-submit">Submit</button>
                </form>
            </div>
        </section>

    </main>

<?php
// Include footer
require_once INCLUDES_PATH . '/footer.php';
?>

    <!-- Main JavaScript -->
    <script src="<?php echo SITE_URL; ?>/js/main.js"></script>
    <script src="<?php echo SITE_URL; ?>/js/animated-hero.js"></script>
