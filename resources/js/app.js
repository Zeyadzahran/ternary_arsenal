import './bootstrap';
import particlesJS from 'particles.js';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed");

    // Initialize particles if available
    if (typeof particlesJS === 'function') {
        initParticles();
    } else {
        console.warn("particlesJS not loaded - skipping particle effects");
    }

    // Initialize animations if GSAP is available
    if (typeof gsap !== 'undefined') {
        initAnimations();
    } else {
        console.warn("GSAP not loaded - skipping animations");
    }

    // Cart count observer
    const cartLink = document.querySelector('[data-count]');
    if (cartLink) {
        updateCartCount();
    }
});

function initParticles() {
    console.log("Initializing particle effects...");

    particlesJS('particles-js', {
        particles: {
            number: { value: 80, density: { enable: true, value_area: 800 } },
            color: { value: ["#00F5FF", "#9747FF", "#FF00E5"] },
            shape: { type: "circle" },
            opacity: { value: 0.5, random: true, anim: { enable: true, speed: 1 } },
            size: { value: 3, random: true, anim: { enable: true, speed: 2 } },
            line_linked: { enable: true, distance: 150, color: "#9747FF", opacity: 0.2, width: 1 },
            move: { enable: true, speed: 1, direction: "none" }
        },
        interactivity: {
            detect_on: "window",
            events: {
                onhover: { enable: true, mode: "grab" },
                onclick: { enable: true, mode: "push" },
                resize: true
            },
            modes: {
                grab: { distance: 140, line_linked: { opacity: 0.5 } },
                push: { particles_nb: 4 }
            }
        },
        retina_detect: true
    });
}

function initAnimations() {
    console.log("Initializing GSAP animations...");

    // Animate sections as they come into view
    gsap.utils.toArray("section").forEach(section => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: "power2.out"
        });
    });

    // Animate cards
    gsap.utils.toArray(".card").forEach(card => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 90%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 30,
            duration: 0.6,
            ease: "back.out"
        });
    });
}

function updateCartCount() {
    // This would be replaced with actual cart count logic
    const count = document.querySelector('[data-count]').getAttribute('data-count');
    if (count > 0) {
        document.querySelector('[data-count]').style.display = 'inline-block';
    }
}

// Profile Page Specific JS
function initProfilePage() {
    // Add floating animation to profile avatar
    gsap.to(".profile-avatar", {
        y: 10,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });

    // Form input animations
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            gsap.to(input, {
                scale: 1.02,
                duration: 0.2,
                ease: "power1.out"
            });
        });

        input.addEventListener('blur', () => {
            gsap.to(input, {
                scale: 1,
                duration: 0.2,
                ease: "power1.out"
            });
        });
    });

    // Delete button shake animation
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            gsap.to(button, {
                x: 5,
                duration: 0.1,
                repeat: 5,
                yoyo: true,
                ease: "power1.inOut"
            });
        });
    });

    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.btn-main');
    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;

            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 1000);
        });
    });
}

// Call this in your DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.profile-container') || document.querySelector('.profile-edit-container')) {
        initProfilePage();
    }
});
function initReportForm() {
    // Add focus animations to form inputs
    const formInputs = document.querySelectorAll('.request-form .form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            gsap.to(input, {
                scale: 1.02,
                duration: 0.2,
                ease: "power1.out"
            });
        });

        input.addEventListener('blur', () => {
            gsap.to(input, {
                scale: 1,
                duration: 0.2,
                ease: "power1.out"
            });
        });
    });

    // Add ripple effect to submit button
    const submitButton = document.querySelector('.btn-submit');
    if (submitButton) {
        submitButton.addEventListener('click', function (e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;

            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 1000);
        });
    }

    // Animate the form container
    gsap.from('.request-card', {
        opacity: 0,
        y: 50,
        duration: 0.8,
        ease: "back.out"
    });

    // Animate the header icon
    gsap.to('.request-header svg', {
        y: 5,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
}

// Call this in your DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.request-container')) {
        initReportForm();
    }
});

// Auth Page Animations
function initAuthAnimations() {
    // Form input focus effects
    const formInputs = document.querySelectorAll('.auth-form .form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            gsap.to(input, {
                scale: 1.02,
                duration: 0.2,
                ease: "power1.out"
            });
        });

        input.addEventListener('blur', () => {
            gsap.to(input, {
                scale: 1,
                duration: 0.2,
                ease: "power1.out"
            });
        });
    });

    // Button ripple effect
    const authButtons = document.querySelectorAll('.auth-form .btn-main');
    authButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;

            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 1000);
        });
    });

    // Auto-hide success message after 5 seconds
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        setTimeout(() => {
            gsap.to(successMessage, {
                opacity: 0,
                y: -20,
                duration: 0.5,
                onComplete: () => successMessage.remove()
            });
        }, 5000);
    }
}

// Call this in your DOMContentLoaded event
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.auth-container')) {
        initAuthAnimations();
    }
});

