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
      // Logic to actually submit form via fetch could go here.
      // For now, simulate success:
      const btn = applicationForm.querySelector('button[type="submit"]');
      const originalText = btn.innerText;
      btn.innerText = "Application Submitted!";
      btn.style.background = "#22c55e"; // Success green color
      setTimeout(() => {
        closeModal();
        applicationForm.reset();
        btn.innerText = originalText;
        btn.style.background = ""; // Reset to gradient
      }, 2000);
    });
  }