// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    let toggle = document.querySelector('.navbar-toggle');
    const menu = document.querySelector('.navbar-menu');
    
    if (toggle && menu) {
        // Strip inline event listeners that duplicate the toggle action
        const newToggle = toggle.cloneNode(true);
        toggle.parentNode.replaceChild(newToggle, toggle);
        toggle = newToggle;
        
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.classList.toggle('show');
            toggle.classList.toggle('active');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.remove('show');
                toggle.classList.remove('active');
            }
        });
        
        // Close menu when clicking a nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('show');
                toggle.classList.remove('active');
            });
        });
    }
    
    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
    // Active Nav Link on Scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    function updateActiveNav() {
        if (sections.length === 0) return; // Only process on pages with sections
        
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 250) {
                current = section.getAttribute('id');
            }
        });
        
        // If we are on home page (which has '#what-section' link)
        const hasHashLinks = Array.from(navLinks).some(link => link.getAttribute('href').startsWith('#'));
        
        if (hasHashLinks) {
            // First, remove active class from Home and hash links
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === 'index.html' || href === '/' || href.startsWith('#')) {
                    link.classList.remove('active');
                }
            });
            
            let activeLinkSet = false;
            
            if (current) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === `#${current}` || href.endsWith(`#${current}`)) {
                        link.classList.add('active');
                        activeLinkSet = true;
                    }
                });
            }
            
            // If no matching section link was found (e.g. at the top of the page), default to Home
            if (!activeLinkSet) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === 'index.html' || href === '/') {
                        link.classList.add('active');
                    }
                });
            }
        }
    }
    
    window.addEventListener('scroll', updateActiveNav);
    window.addEventListener('load', updateActiveNav);
    
    // Scroll Reveal Animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.what-card, .learn-card, .testimonial-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
    
    // Testimonial Slider Pause on Hover
    const slider = document.querySelector('.testimonials-track');
    if (slider) {
        const sliderContainer = document.querySelector('.testimonials-slider');
        sliderContainer.addEventListener('mouseenter', () => {
            slider.style.animationPlayState = 'paused';
        });
        sliderContainer.addEventListener('mouseleave', () => {
            slider.style.animationPlayState = 'running';
        });
    }

    // Infinite Testimonials Loop
    const reviewsGrid = document.querySelector('.reviews-grid');
    const originalCardSet = document.getElementById('original-cards');

    if (reviewsGrid && originalCardSet) {
        // Duplicate the card set for infinite scrolling
        const clone = originalCardSet.cloneNode(true);
        clone.id = '';  // Remove ID from clone to avoid duplicates
        reviewsGrid.appendChild(clone);

        // Pause animation on hover
        reviewsGrid.addEventListener('mouseenter', () => {
            reviewsGrid.style.animationPlayState = 'paused';
        });

        reviewsGrid.addEventListener('mouseleave', () => {
            reviewsGrid.style.animationPlayState = 'running';
        });
    }
    
    // CTA Button Click Animation
    document.querySelectorAll('.btn-primary-gradient, .btn-primary, .program-cta').forEach(btn => {
        btn.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
});


  const openBtns = [
    document.getElementById("openModal")
  ];
  const closeBtn = document.getElementById("closeModal");
  const modal = document.getElementById("glassModal");
  const overlay = document.getElementById("modalOverlay");
  const applicationForm = document.getElementById("applicationForm");

  openBtns.forEach(btn => {
    if (btn) {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        if(modal) modal.classList.add("active");
        if(overlay) overlay.classList.add("active");
      });
    }
  });

  if (closeBtn) closeBtn.addEventListener("click", closeModal);
  if (overlay) overlay.addEventListener("click", closeModal);

  function closeModal() {
    if (modal) modal.classList.remove("active");
    if (overlay) overlay.classList.remove("active");
  }

  if (applicationForm) {
    applicationForm.addEventListener("submit", (e) => {
      e.preventDefault();
      submitApplicationForm(applicationForm);
    });
  }

  // Contact Form Handler (for contact.php)
  const contactForm = document.querySelector('.contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      submitContactForm(contactForm);
    });
  }
});

/**
 * Submit application form via AJAX
 */
function submitApplicationForm(form) {
  const btn = form.querySelector('button[type="submit"]');
  const originalText = btn.innerText;

  // Disable button and show loading state
  btn.disabled = true;
  btn.innerText = "Submitting...";

  const formData = new FormData(form);
  const data = Object.fromEntries(formData);

  fetch('/Ux/Ux-Academy-/backend/contact_handler.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      btn.innerText = "Application Submitted!";
      btn.style.background = "#22c55e";
      setTimeout(() => {
        closeModal();
        form.reset();
        btn.innerText = originalText;
        btn.style.background = "";
        btn.disabled = false;
      }, 2000);
    } else {
      // Show errors
      displayFormErrors(form, data.errors);
      btn.innerText = originalText;
      btn.disabled = false;
    }
  })
  .catch(error => {
    console.error('Error:', error);
    btn.innerText = "Error - Try Again";
    btn.style.background = "#ef4444";
    setTimeout(() => {
      btn.innerText = originalText;
      btn.style.background = "";
      btn.disabled = false;
    }, 2000);
  });
}

/**
 * Submit contact form via AJAX
 */
function submitContactForm(form) {
  const btn = form.querySelector('button[type="submit"]');
  const messageDiv = form.querySelector('[class*="message"]') || form.parentElement.querySelector('[class*="message"]');
  const originalText = btn.innerText;

  // Disable button and show loading state
  btn.disabled = true;
  btn.innerText = "Sending...";

  const formData = new FormData(form);
  const data = Object.fromEntries(formData);

  fetch('/Ux/Ux-Academy-/backend/contact_handler.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(result => {
    if (result.success) {
      btn.innerText = "Message Sent!";
      btn.style.background = "#22c55e";

      if (messageDiv) {
        messageDiv.style.color = '#22c55e';
        messageDiv.innerHTML = 'Thank you! Your message has been received.';
        messageDiv.style.display = 'block';
      }

      setTimeout(() => {
        form.reset();
        btn.innerText = originalText;
        btn.style.background = "";
        btn.disabled = false;
        if (messageDiv) {
          messageDiv.style.display = 'none';
          messageDiv.innerHTML = '';
        }
      }, 3000);
    } else {
      // Show errors
      displayFormErrors(form, result.errors);
      btn.innerText = originalText;
      btn.disabled = false;

      if (messageDiv) {
        messageDiv.style.color = '#ef4444';
        messageDiv.innerHTML = result.message || 'Validation failed';
        messageDiv.style.display = 'block';
      }
    }
  })
  .catch(error => {
    console.error('Error:', error);
    btn.innerText = "Error - Try Again";
    btn.style.background = "#ef4444";

    if (messageDiv) {
      messageDiv.style.color = '#ef4444';
      messageDiv.innerHTML = 'An error occurred. Please try again.';
      messageDiv.style.display = 'block';
    }

    setTimeout(() => {
      btn.innerText = originalText;
      btn.style.background = "";
      btn.disabled = false;
    }, 2000);
  });
}

/**
 * Display form validation errors
 */
function displayFormErrors(form, errors) {
  if (!errors || Object.keys(errors).length === 0) {
    return;
  }

  // Clear previous errors
  form.querySelectorAll('.error-message').forEach(el => el.remove());
  form.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

  // Display new errors
  for (const [field, message] of Object.entries(errors)) {
    const input = form.querySelector(`[name="${field}"]`);
    if (input) {
      input.classList.add('input-error');
      const errorMsg = document.createElement('div');
      errorMsg.className = 'error-message';
      errorMsg.textContent = message;
      errorMsg.style.color = '#ef4444';
      errorMsg.style.fontSize = '12px';
      errorMsg.style.marginTop = '5px';
      input.parentElement.appendChild(errorMsg);
    }
  }
}