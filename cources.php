<?php
require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/backend/security.php';
$pageTitle = 'Courses - UX Pacific Academy';
$currentPage = 'courses';
require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>

  <!-- <section class="main-h1">
    <h1>Program Details</h1>
    <p class="subtitle">
    A cohort-driven program where you build real projects, gain industry experience, and grow into a confident designer.
    </p>
  </section> -->

  <section class="program-details">
      <!-- Header -->
      <div class="what-section-content">
        <div class="program-header">
          <h1 class="header">Program Details</h1>
          <p>Build strong UX foundations and step into the design industry with clarity and confidence.</p>
        </div>

        <!-- Content -->
         <div class="program-container">
        <div class="program-content">

          <!-- Left Info -->
          <div class="program-info">
            <div class="info-item">
              <span class="">
                <img src="<?php echo SITE_URL; ?>/img/AboutSection.png" alt="Location" width="40" height="40">
              </span>
              <span>Ahmedabad</span>
            </div>

            <div class="info-item">
              <span class="">
                <img src="<?php echo SITE_URL; ?>/img/AboutSection-1.png" alt="coursetype" width="40" height="40">
              </span>
              <span>Offline</span>
            </div>

            <div class="info-item">
              <span class="">
                <img src="<?php echo SITE_URL; ?>/img/AboutSection-2.png" alt="date" width="40" height="40">
              </span>
              <span>Start : October, 2026</span>
            </div>
          </div>

          <div class="divider"></div>

          <!-- Mentors -->
          <div class="mentors">
            <h3>Mentors</h3>

            <div class="mentor-card">
              <img src="<?php echo SITE_URL; ?>/img/hbb.png" alt="Mentor">
              <div>
                <h4>Aradhya Arya</h4>
                <p>UI/UX Designer</p>
              </div>
              <span class="linkedin">in</span>
            </div>

            <div class="mentor-card">
              <img src="<?php echo SITE_URL; ?>/img/vwv.png" alt="Mentor">
              <div>
                <h4>Zula Prajapati</h4>
                <p>UI/UX Designer</p>
              </div>
              <span class="linkedin">in</span>
            </div>
          </div>

          <div class="divider"></div>

          <!-- Pricing -->
          <div class="pricing">
            <h3>Pricing</h3>
            <div class="price">
              <span class="" style="font-size: 20px;">Want to know the program fee?</span>
            </div>
            <p class="note">This is a curated program. Pricing is shared after application.</p>
            <button class="btn-primary" id="applyCourseBtn">Unlock Pricing</button>
          </div>

        </div>
      </div>
  </section>

  <section class="wyg-section">
    <div class="what-you-get-container">
  
      <!-- Header -->
      <div class="what-you-get-header">
        <h2>What You Will Get?</h2>
        <p>
          Everything you need to grow as a designer skills, experience,
          certification, and real career opportunities.
        </p>
  
        <a href="#" class="btn-primary">
          Download Syllabus
        </a>
      </div>
  
      <!-- GRID -->
      <div class="what-you-get-grid">
  
        <!-- LEFT COLUMN -->
        <div class="what-you-get-column">
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>A Creative Design Community</h4>
              <p>Connect with designers, mentors, and peers to collaborate and grow together.</p>
            </div>
          </div>
  
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>Live Projects & Case Studies</h4>
              <p>Work on real-world projects and build strong, portfolio-ready case studies.</p>
            </div>
          </div>
  
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>Internships & Industry Exposure</h4>
              <p>Apply for internships directly and gain hands-on experience in real design roles.</p>
            </div>
          </div>
        </div>
  
        <!-- CENTER DIVIDER -->
        <div class="what-you-get-divider"></div>
  
        <!-- RIGHT COLUMN -->
        <div class="what-you-get-column">
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>Career Guidance & Job Support</h4>
              <p>Get help with resumes, portfolios, interviews, and job applications.</p>
            </div>
          </div>
  
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>Mentor Feedback & Reviews</h4>
              <p>Improve your work with structured feedback from experienced designers.</p>
            </div>
          </div>
  
          <div class="get-item">
            <span class="check-icon">✓</span>
            <div class="get-text">
              <h4>Verified Completion Certificate</h4>
              <p>Receive an industry-recognized certificate after successful program completion.</p>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>


  <section class="howprgmworks">
  <div class="program-section">
  <h2 class="program-title">How the Program Works</h2>
  <p class="program-subtitle">Your journey from beginner to job-ready designer</p>
  <section class="steps-section">
  <div class="steps-wrapper">
  <!-- <div class="steps-line"></div> -->

    <div class="steps">
      <div class="step">
        <div class="step-icon"><img src="<?php echo SITE_URL; ?>/img/p1.png" alt="" srcset="" height="40px" width="40px"></div>
        <h3>Join the Community</h3>
        <p>Become part of our design community and connect with mentors and peers.</p>
      </div>

      <div class="step">
        <div class="step-icon"><img src="<?php echo SITE_URL; ?>/img/p2.png" alt="" srcset="" height="40px" width="40px"></div>
        <h3>Work on Real Projects</h3>
        <p>Apply your skills on live projects and build professional case studies.</p>
      </div>

      <div class="step">
        <div class="step-icon"><img src="<?php echo SITE_URL; ?>/img/p3.png" alt="" height="40px" width="40px"></div>
        <h3>Apply for Internships</h3>
        <p>Access exclusive internship opportunities with our partner companies.</p>
      </div>

      <div class="step">
        <div class="step-icon"><img src="<?php echo SITE_URL; ?>/img/p4.png" alt="" height="40px" width="40px"></div>
        <h3>Get Career Support & Certificate</h3>
        <p>Receive job guidance, portfolio reviews, and your completion certificate.</p>
      </div>
    </div>
  </div>
  </section>
  </div>

  </section>

<section class="certificate-section">
      <!-- Certificate -->
  <div class="certificate">
  <!-- Left Content -->
   
    <div class="certificate-preview">
      <img src="<?php echo SITE_URL; ?>/img/v5.png" alt="" srcset="" height="200px" width="200px" style="margin-bottom: 20px; margin-left: 70px; margin-right: 70px;">
    <h4>UX Pacific Academy</h4>
    <h2>Certificate of Completion</h2>
    </div>
  <!-- Right Content -->
    <div class="certificate-content">
    <h2 class="certificate-title">Verified Completion Certificate</h2>

    <p class="certificate-desc">
      Upon completing the program, you'll receive a verified certificate that
      demonstrates your commitment, skills, and readiness for professional design work.
    </p>

    <div class="certificate-features">
      <div class="cert-item">
        <div class="cert-icon">
          <img src="<?php echo SITE_URL; ?>/img/v1.png" height="40" width="40" />
        </div>
        <span>Used for job applications</span>
      </div>

      <div class="cert-item">
        <div class="cert-icon">
          <img src="./img/v2.png" height="40" width="40" />
        </div>
        <span>Add to LinkedIn & portfolio</span>
      </div>

      <div class="cert-item">
        <div class="cert-icon">
          <img src="./img/v3.png" height="40" width="40" />
        </div>
        <span>Proof of skills</span>
      </div>
    </div>
    </div>
  </div>
</section>


<?php
require_once INCLUDES_PATH . '/footer.php';
?>

    <script src="\<?php echo SITE_URL; ?>/js/main.js"></script>
    <script src="\<?php echo SITE_URL; ?>/js/animated-hero.js"></script>
