/**
 * Timber Homes - Main JavaScript
 * Handles navigation, animations, and interactive features
 */

(function() {
    'use strict';

    // ========================================
    // MOBILE MENU TOGGLE
    // ========================================
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mainNav = document.getElementById('mainNav');

    if (mobileMenuToggle && mainNav) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
            document.body.style.overflow = mainNav.classList.contains('active') ? 'hidden' : '';
        });

        // Close menu when clicking on a link
        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuToggle.classList.remove('active');
                mainNav.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // ========================================
    // STICKY HEADER ON SCROLL
    // ========================================
    const header = document.getElementById('header');
    let lastScroll = 0;

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });

    // ========================================
    // SMOOTH SCROLLING FOR ANCHOR LINKS
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    const headerHeight = header.offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ========================================
    // ACTIVE NAVIGATION ON SCROLL
    // ========================================
    const sections = document.querySelectorAll('section[id]');
    const navItems = document.querySelectorAll('.main-navigation a');

    function updateActiveNav() {
        const scrollPosition = window.pageYOffset + 200;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('href') === `#${sectionId}`) {
                        item.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav);

    // ========================================
    // SCROLL REVEAL ANIMATIONS
    // ========================================
    const revealElements = document.querySelectorAll('.reveal');

    const revealOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(element => {
        revealOnScroll.observe(element);
    });

    // ========================================
    // CONTACT FORM HANDLING
    // ========================================
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);

            // Basic validation
            if (!data.name || !data.email || !data.message) {
                alert('Please fill in all required fields.');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(data.email)) {
                alert('Please enter a valid email address.');
                return;
            }

            // In a real implementation, you would send this to your server
            // For WordPress, you might use AJAX to send to admin-ajax.php
            console.log('Form submitted:', data);

            // Show success message
            alert('Thank you for your message! We will get back to you soon.');
            
            // Reset form
            this.reset();

            // WordPress AJAX example (uncomment when integrating with WordPress):
            /*
            fetch(wpAjax.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'submit_contact_form',
                    nonce: wpAjax.nonce,
                    ...data
                })
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Thank you for your message! We will get back to you soon.');
                    this.reset();
                } else {
                    alert('There was an error sending your message. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error sending your message. Please try again.');
            });
            */
        });
    }

    // ========================================
    // PORTFOLIO FILTER (Optional Enhancement)
    // ========================================
    // You can add filtering functionality for portfolio items here

    // ========================================
    // LAZY LOADING IMAGES (Optional Enhancement)
    // ========================================
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }

    // ========================================
    // COUNTER ANIMATION FOR STATS
    // ========================================
    const counters = document.querySelectorAll('.why-us-number');
    
    const animateCounter = (element) => {
        const target = element.textContent;
        const isNumber = /^\d+$/.test(target);
        
        if (!isNumber) return;
        
        const duration = 2000;
        const steps = 60;
        const increment = parseInt(target) / steps;
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= parseInt(target)) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + '+';
            }
        }, duration / steps);
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCounter(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });

    // ========================================
    // INITIALIZE ON DOM READY
    // ========================================
    console.log('Timber Homes - Theme initialized');

})();
