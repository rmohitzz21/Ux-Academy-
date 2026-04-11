<?php
// ========================================
// UX Academy - Home Page
// ========================================

require_once dirname(__FILE__) . '/includes/config.php';
require_once dirname(__FILE__) . '/backend/security.php';

// Set page info
$pageTitle = 'UX Pacific Academy - Learn UX/UI Design';
$pageDescription = 'Join UX Pacific Academy to gain real-world design skills, work on live projects, and apply for internships.';
$currentPage = 'index';

// Generate CSRF token for modal
$csrf_token = generateCsrfToken();

// Include head
require_once INCLUDES_PATH . '/head.php';
require_once INCLUDES_PATH . '/navbar.php';
?>

  <!-- Added animated hero section -->
  <section class="animated-hero">
    <div class="hero-container">
      <div class="hero-content">
        <!-- Badge Button -->
        <div class="hero-badge-wrapper">
          
          <p  class="hero-badge">
             <span class="badge-icon" aria-hidden="true">
                <img src="<?php echo SITE_URL; ?>/img/star.png" alt="" height="15" width="15" loading="eager">
              </span> 
            Welcome to UX Pacific Academy
            <!-- <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"></line>
              <polyline points="12 5 19 12 12 19"></polyline>
            </svg> -->
          </p>
        </div>

        <!-- Animated Title -->
        <div class="hero-title-wrapper">
          <h1 class="hero-title">
            <span class="title-static">A Space where people</span>
            <span class="title-animated-wrapper">
              <span class="title-animated" id="animatedTitle"></span>
            </span>
          </h1>

          <p class="hero-description">
            Join UX Pacific Academy to gain real-world design skills, work on live projects, and apply directly for
            internships and junior design roles.

          </p>
        </div>

        <!-- CTA Buttons -->
        <div class="hero-buttons">
          <!-- <a href="#" class="btn-hero btn-outline">
            Jump on a call 
            <svg class="phone-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
          </a> -->
          <div class="cta-wrapper">
            <div class="hover-image">
              <img src="<?php echo SITE_URL; ?>/img/std.png" alt="" />
            </div>


            <a href="#" class="btn-primary" id="openModal">
              Register Now
              <!-- <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg> -->
            </a>
          </div>
        </div>

        <div class="modal-overlay" id="modalOverlay"></div>

        <!-- Glass Modal -->
        <div class="glass-modal application-modal" id="glassModal">
          <button class="close-btn" id="closeModal">×</button>
    
          <h2>Start Your Journey</h2>
          <p class="subtitle">
            Secure your spot in our upcoming cohort. Let us know a bit about yourself.
          </p>
    
          <form id="applicationForm">
            <div class="form-row" style="display: flex; gap: 16px;">
              <div class="form-group" style="flex: 1;">
                <label>Full Name</label>
                <input type="text" placeholder="e.g. John Doe" required />
              </div>
              <div class="form-group" style="flex: 1;">
                <label>Email Address</label>
                <input type="email" placeholder="john@example.com" required />
              </div>
            </div>
    
            <div class="form-row" style="display: flex; gap: 16px;">
              <div class="form-group" style="flex: 1;">
                <label>Phone Number</label>
                <input type="tel" placeholder="+91 XXXXX XXXXX" required />
              </div>
              <div class="form-group" style="flex: 1;">
                <label>Program</label>
                <select required class="modal-select">
                  <option value="" disabled selected>Select a program...</option>
                  <option value="uiux">UI/UX Design Program</option>
                  <option value="graphic">Graphic Design Basics</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Why do you want to join?</label>
              <textarea class="modal-textarea" rows="2" placeholder="Tell us about your design goals..." required></textarea>
            </div>
    
            <button type="submit" class="submit-btn btn-primary" style="width: 100%; margin-top: 10px;">Submit Application</button>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!-- What Section  -->
  <section class="what-section" id="what-section">
    <div class="what-container">
      <!-- Header -->
      <div class="what-header">
        <h2>What We Do</h2>
        <p>We help learners build real UX/UI skills and real careers.</p>
      </div>

      <div class="what-section-content">
        <!-- Top Grid -->
        <div class="what-top-grid">
          <!-- Image -->
          <div class="what-image">
            <img src="<?php echo SITE_URL; ?>/img/ux1.jpg" alt="What we do" />
          </div>

          <!-- About Us -->
          <div class="what-about">
            <h3>About Us</h3>
            <p>
              UXPacific Academy is a learning platform built for future UX/UI
              designers. We focus on practical learning, real projects, and
              career growth.
            </p>
            <p>
              Our goal is to help students move from learning to working with
              confidence.
            </p>
          </div>
        </div>

        <!-- Bottom Cards -->
        <div class="what-cards">
          <div class="what-card">
            <div class="card-icon">
              <img src="<?php echo SITE_URL; ?>/img/l1.png" alt="" srcset="" width="50" height="50">
            </div>
            <h4>We Build Design Community</h4>
            <p>
              We Connect Students, Mentors and Designers in one creative space to share ideas, feedback and
              opportunities.
            </p>
          </div>

          <div class="what-card">
            <div class="card-icon">
              <img src="<?php echo SITE_URL; ?>/img/l2.png" alt="" srcset="" width="50" height="50">
            </div>
            <h4>We Create Real Opportunities</h4>
            <p>
              We offer internships, project Collaborations, and entry-level roles so you gain real-world experience.
            </p>
          </div>

          <div class="what-card">
            <div class="card-icon">
              <img src="<?php echo SITE_URL; ?>/img/l3.png" alt="" srcset="" width="50" height="50">
            </div>
            <h4>We Support Career Growth</h4>
            <p>
              We guide you with portfolio reviews, applications, and hiring support to help you move from learning to
              working.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="learn-section">
    <div class="learn-container">
      <!-- Small write-up -->

      <!-- Section title -->
      <h2 class="learn-title">
        What You Will Learn
      </h2>

      <p class="learn-intro">
        Learn industry-ready skills with practical knowledge designed to help
        you grow with confidence.
      </p>

      <!-- Cards -->
      <div class="learn-cards">
        <!-- Card 1 -->
        <div class="learn-card green">
          <div class="learn-icon">
            <img src="<?php echo SITE_URL; ?>/img/ui.png" alt="" srcset="">
          </div>
          <h4>UI Design & Visual Systems</h4>
          <p>
            Learn layout design, typography, color systems, components and responsive UI.
            Create clean, modern interfaces using tools like Figma.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="learn-card pink">
          <div class="learn-icon">
            <img src="<?php echo SITE_URL; ?>/img/research.png" alt="" srcset="">
          </div>
          <h4>UX Design & Fundamentals</h4>
          <p>
            Learn design thinking, user research, personas, user journey, wireframing, and usability testing.
            Understand how to solve real user problems with a structured UX process.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="learn-card teal">
          <div class="learn-icon">
            <img src="<?php echo SITE_URL; ?>/img/grapphic.png" alt="" srcset="">
          </div>
          <h4>Graphic & Visual Design Basics</h4>
          <p>
            Learn visual hierarchy, branding basics, icons, posters, and social media creatives.
            Build strong visual skills that support UI and UX work.
          </p>
        </div>
      </div>
    </div>
  </section>

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
            <button class="btn-primary" id="applyNowBtnPricing">Unlock Pricing</button>
          </div>

        </div>
      </div>
  </section>

  <!-- what you get -->
  <section class="what-you-get-section">
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

  <div class="reviews-grid-container">
    <div class="reviews-grid">
      <!-- This is the original set of cards that will be duplicated by JS -->
      <div class="review-card-set" id="original-cards">
        <!-- Card 1 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Project Experience</div>
          </div>
          <div class="quote">
            We appreciate the professionalism and clarity UX Pacific brought
            to the process and would gladly collaborate again.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/Oval (1).png" />
            </div>
            <div class="author-info">
              <div class="name">Andrew Ajai Singh</div>
              <div class="title">Distinct Buzz</div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="testimonial-card" style="background-color: #4338ca">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Use engaging activities and mix up groups to boost interaction,
            cut distractions, and make the workshop more effective.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Dharmik Bhavsar" src="<?php echo SITE_URL; ?>/img/Oval (2).png" />
            </div>
            <div class="author-info">
              <div class="name">Dharmik Bhavsar</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="testimonial-card" style="background-color: #4f46e5">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Got to explore fresh and engaging activities throughout the
            session. They added a fun and creative touch to the overall
            learning experience!
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Diya Mehta" src="./img/DMDM.png" />
            </div>
            <div class="author-info">
              <div class="name">Diya Mehta</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Project Experience</div>
          </div>
          <div class="quote">
            Working with UXPacific for the UX draft was an insightful
            experience. The team's approach was structured, detailed, and
            highly actionable.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Dr. Vishal Singh" src="<?php echo SITE_URL; ?>/img/Oval.png" />
            </div>
            <div class="author-info">
              <div class="name">Dr. Vishal Singh</div>
              <div class="title">CEDAR Himalaya</div>
            </div>
          </div>
        </div>
        <!-- Card 5 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Loved the hands-on activities and feedback they really clarified
            the concepts. Great experience connecting with the team
            and participants!
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/yuggie.png" />
            </div>
            <div class="author-info">
              <div class="name">Yugaan Parmar</div>
              <div class="title">UI/UX & Graphic Designer</div>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Gained deeper knowledge, especially through the process of
            creating the hero and understood how structure and design
            come together !
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/Devanshi.png" />
            </div>
            <div class="author-info">
              <div class="name">Devanshi Akhja</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>

        <!-- Card 7  -->

        <!-- Card 1 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Project Experience</div>
          </div>
          <div class="quote">
            We appreciate the professionalism and clarity UX Pacific brought
            to the process and would gladly collaborate again.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/Oval (1).png" />
            </div>
            <div class="author-info">
              <div class="name">Andrew Ajai Singh</div>
              <div class="title">Distinct Buzz</div>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="testimonial-card" style="background-color: #4338ca">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Use engaging activities and mix up groups to boost interaction,
            cut distractions, and make the workshop more effective.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Dharmik Bhavsar" src="<?php echo SITE_URL; ?>/img/Oval (2).png" />
            </div>
            <div class="author-info">
              <div class="name">Dharmik Bhavsar</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="testimonial-card" style="background-color: #4f46e5">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Got to explore fresh and engaging activities throughout the
            session. They added a fun and creative touch to the overall
            learning experience!
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Diya Mehta" src="./img/DMDM.png" />
            </div>
            <div class="author-info">
              <div class="name">Diya Mehta</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Project Experience</div>
          </div>
          <div class="quote">
            Working with UXPacific for the UX draft was an insightful
            experience. The team's approach was structured, detailed, and
            highly actionable.
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Dr. Vishal Singh" src="<?php echo SITE_URL; ?>/img/Oval.png" />
            </div>
            <div class="author-info">
              <div class="name">Dr. Vishal Singh</div>
              <div class="title">CEDAR Himalaya</div>
            </div>
          </div>
        </div>
        <!-- Card 5 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Loved the hands-on activities and feedback they really clarified
            the concepts. Great experience connecting with the team
            and participants!
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/yuggie.png" />
            </div>
            <div class="author-info">
              <div class="name">Yugaan Parmar</div>
              <div class="title">UI/UX & Graphic Designer</div>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="testimonial-card" style="background-color: #312e81">
          <div class="card-header">
            <div class="stars">
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
              <svg fill="#ffd166" viewbox="0 0 24 24">
                <path
                  d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 20.201 4.665 24 6 15.595 0 9.748l8.332-1.73L12 .587z">
                </path>
              </svg>
            </div>
            <div class="pill">Workshop Experience</div>
          </div>
          <div class="quote">
            Gained deeper knowledge, especially through the process of
            creating the hero and understood how structure and design
            come together !
          </div>
          <div class="author">
            <div class="avatar">
              <img alt="Andrew Ajai Singh" src="<?php echo SITE_URL; ?>/img/Devanshi.png" />
            </div>
            <div class="author-info">
              <div class="name">Devanshi Akhja</div>
              <div class="title">Student</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Rest of your existing sections remain unchanged -->
  <!-- What Section, Learn Section, Program Details, etc. -->


<?php
// Include footer
require_once INCLUDES_PATH . '/footer.php';
?>

    <!-- Main JavaScript -->
    <script src="<?php echo SITE_URL; ?>/js/main.js"></script>
    <script src="<?php echo SITE_URL; ?>/js/animated-hero.js"></script>
