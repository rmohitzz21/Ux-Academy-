<?php
require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/backend/security.php';
$pageTitle = 'Application Form - UX Pacific Academy';
$currentPage = 'apply';
require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>

    <section class="page-hero">
        <div class="container">
            <h1>Join UX Pacific</h1>
            <p>Start your journey to becoming a professional UX/UI designer</p>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="content-card" style="margin-bottom: 48px;">
                <h2>Why Join UX Pacific?</h2>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 16px; padding-left: 24px; position: relative;">
                        <span style="position: absolute; left: 0;">✓</span>
                        <strong>Real-world projects</strong> - Work on actual client projects from day one
                    </li>
                    <li style="margin-bottom: 16px; padding-left: 24px; position: relative;">
                        <span style="position: absolute; left: 0;">✓</span>
                        <strong>Industry mentors</strong> - Learn from experienced UX/UI professionals
                    </li>
                    <li style="margin-bottom: 16px; padding-left: 24px; position: relative;">
                        <span style="position: absolute; left: 0;">✓</span>
                        <strong>Career support</strong> - Get help with portfolios, resumes, and job applications
                    </li>
                    <li style="margin-bottom: 16px; padding-left: 24px; position: relative;">
                        <span style="position: absolute; left: 0;">✓</span>
                        <strong>Portfolio building</strong> - Create projects that showcase your skills
                    </li>
                    <li style="margin-bottom: 16px; padding-left: 24px; position: relative;">
                        <span style="position: absolute; left: 0;">✓</span>
                        <strong>Community</strong> - Join a network of designers and creators
                    </li>
                </ul>
                
                <h2 style="margin-top: 32px;">Eligibility</h2>
                <p>
                    Our program is open to beginners and intermediate designers. No prior experience required—just passion for design and willingness to learn.
                </p>
            </div>
            
            <div class="contact-form-card">
                <h2 style="text-align: center; margin-bottom: 32px;">Application Form</h2>
                <form id="applyForm" class="contact-form">
                    <div class="form-group">
                        <label for="apply-name">Full Name *</label>
                        <input type="text" id="apply-name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apply-email">Email *</label>
                        <input type="email" id="apply-email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apply-phone">Phone Number *</label>
                        <input type="tel" id="apply-phone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apply-experience">Design Experience</label>
                        <select id="apply-experience" name="experience" style="padding: 12px 16px; border-radius: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; font-size: 15px; font-family: 'Inter', sans-serif;">
                            <option value="">Select experience level</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="apply-message">Why do you want to join UX Pacific? *</label>
                        <textarea id="apply-message" name="message" rows="6" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary" style="width: 100%;">Submit Application</button>
                    
                    <div id="formMessage" class="form-message"></div>
                </form>
            </div>
        </div>
    </section>


<?php
require_once INCLUDES_PATH . '/footer.php';
?>

    <script src="\<?php echo SITE_URL; ?>/js/main.js"></script>
    <script src="\<?php echo SITE_URL; ?>/js/animated-hero.js"></script>
