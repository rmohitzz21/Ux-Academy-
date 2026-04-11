<?php
require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/backend/security.php';
$pageTitle = 'Terms of Service - UX Pacific Academy';
$currentPage = 'terms';
require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>


    <main id="home" class="main">
        <section id="contact" class="contact-section">
            <h2 class="section-title contact-title">Contact Us</h2>
            <p class="section-subtitle contact-subtitle">
                Have a question or want to learn more about UX Pacific Community? We’d love to hear from you.
                Send us a message and we’ll respond as soon as possible.
            </p>

            <div class="contact-grid">
                <!-- LEFT: Image card -->
                <div class="contact-image">
                    <img src="<?php echo SITE_URL; ?>/img/ct.png" alt="Contact screen mockup">
                </div>

                <!-- RIGHT: Form (no card background) -->
                <form class="contact-form" action="#" method="post">
                    <div class="contact-row">
                        <div class="contact-field">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" placeholder="Enter your name here">
                        </div>
                        <div class="contact-field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" placeholder="Enter your email address">
                        </div>
                    </div>

                    <div class="contact-row">
                        <div class="contact-field">
                            <label for="phone">Phone Number</label>
                            <input id="phone" name="phone" type="tel" placeholder="+91 xxxxx- xxxxx">
                        </div>
                        <div class="contact-field">
                            <label for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Write your Subject">
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5"
                            placeholder="Enter your message here...."></textarea>
                    </div>

                    <div class="contact-footer">
                        <label class="contact-checkbox">
                            <input type="checkbox">
                            <span>
                                I Agree to
                                <a href="#" class="contact-link">Terms &amp; Condition</a>
                                of UXPacific
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary contact-submit">Submit</button>
                </form>
            </div>
        </section>

        <!-- CTA / READY SECTION -->

    </main>


    <!-- FINAL CTA SECTION -->
    <section class="final-cta">
        <div class="final-cta-card">
            <h2>Shop. Collab. Create.</h2>

            <p>
                Explore UX Pacific’s exclusive merchandise, booklets, and design
                templates made for creators like you. Collaborate with our growing
                community to learn, share, and bring new ideas to life.
            </p>

            <div class="final-cta-actions">
                <a href="#" class="btn-primary">Start a Collaboration</a>
                <a href="#" class="btn-outline">Visit the Shop</a>
            </div>
        </div>
    </section>


<?php
require_once INCLUDES_PATH . '/footer.php';
?>

    <script src="\<?php echo SITE_URL; ?>/js/main.js"></script>
    <script src="\<?php echo SITE_URL; ?>/js/animated-hero.js"></script>
