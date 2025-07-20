
// import './bootstrap';
// import particlesJS from 'particles.js';
// import gsap from 'gsap';
// import { ScrollTrigger } from 'gsap/ScrollTrigger';

// // Register GSAP plugins
// gsap.registerPlugin(ScrollTrigger);

// document.addEventListener('DOMContentLoaded', function () {
//     console.log("DOM fully loaded and parsed");

//     // Initialize particles if available
//     if (typeof particlesJS === 'function') {
//         initParticles();
//     } else {
//         console.warn("particlesJS not loaded - skipping particle effects");
//     }

//     // Initialize animations if GSAP is available
//     if (typeof gsap !== 'undefined') {
//         initAnimations();
//     } else {
//         console.warn("GSAP not loaded - skipping animations");
//     }

//     // Cart count observer
//     const cartLink = document.querySelector('[data-count]');
//     if (cartLink) {
//         updateCartCount();
//     }
// });

// function initParticles() {
//     console.log("Initializing particle effects with adjusted settings...");

//     particlesJS('particles-js', {
//         particles: {
//             number: {
//                 value: 90,  // Slightly reduced from 100
//                 density: {
//                     enable: true,
//                     value_area: 800
//                 }
//             },
//             color: {
//                 value: ["#00F5FF", "#9747FF", "#FF00E5"]
//             },
//             shape: {
//                 type: "circle",
//                 stroke: {
//                     width: 0,
//                     color: "#000000"
//                 },
//                 polygon: {
//                     nb_sides: 5
//                 }
//             },
//             opacity: {
//                 value: 0.7,  // Slightly reduced from 0.8
//                 random: true,
//                 anim: {
//                     enable: true,
//                     speed: 1,
//                     opacity_min: 0.3,
//                     sync: false
//                 }
//             },
//             size: {
//                 value: 5,  // Reduced from 8 (original was 3)
//                 random: true,
//                 anim: {
//                     enable: true,
//                     speed: 3,
//                     size_min: 1.5,  // Reduced from 2
//                     sync: false
//                 }
//             },
//             line_linked: {
//                 enable: true,
//                 distance: 180,  // Slightly reduced from 200
//                 color: "#9747FF",
//                 opacity: 0.4,  // Slightly reduced from 0.5
//                 width: 1.5  // Reduced from 2
//             },
//             move: {
//                 enable: true,
//                 speed: 1.5,  // Reduced from 2
//                 direction: "none",
//                 random: true,
//                 straight: false,
//                 out_mode: "bounce",
//                 bounce: true,
//                 attract: {
//                     enable: true,
//                     rotateX: 600,
//                     rotateY: 1200
//                 }
//             }
//         },
//         interactivity: {
//             detect_on: "canvas",
//             events: {
//                 onhover: {
//                     enable: true,
//                     mode: "grab"
//                 },
//                 onclick: {
//                     enable: true,
//                     mode: "push"
//                 },
//                 resize: true
//             },
//             modes: {
//                 grab: {
//                     distance: 180,  // Reduced from 200
//                     line_linked: {
//                         opacity: 0.8  // Reduced from 1
//                     }
//                 },
//                 bubble: {
//                     distance: 400,
//                     size: 40,
//                     duration: 2,
//                     opacity: 8,
//                     speed: 3
//                 },
//                 repulse: {
//                     distance: 250,  // Reduced from 300
//                     duration: 0.4
//                 },
//                 push: {
//                     particles_nb: 5  // Reduced from 6
//                 },
//                 remove: {
//                     particles_nb: 2
//                 }
//             }
//         },
//         retina_detect: true
//     });
// }

// function initAnimations() {
//     console.log("Initializing GSAP animations...");

//     // Animate sections as they come into view
//     gsap.utils.toArray("section").forEach(section => {
//         gsap.from(section, {
//             scrollTrigger: {
//                 trigger: section,
//                 start: "top 80%",
//                 toggleActions: "play none none none"
//             },
//             opacity: 0,
//             y: 50,
//             duration: 0.8,
//             ease: "power2.out"
//         });
//     });

//     // Animate cards
//     gsap.utils.toArray(".card").forEach(card => {
//         gsap.from(card, {
//             scrollTrigger: {
//                 trigger: card,
//                 start: "top 90%",
//                 toggleActions: "play none none none"
//             },
//             opacity: 0,
//             y: 30,
//             duration: 0.6,
//             ease: "back.out"
//         });
//     });
// }

// function updateCartCount() {
//     // This would be replaced with actual cart count logic
//     const count = document.querySelector('[data-count]').getAttribute('data-count');
//     if (count > 0) {
//         document.querySelector('[data-count]').style.display = 'inline-block';
//     }
// }

// // Profile Page Specific JS
// function initProfilePage() {
//     // Add floating animation to profile avatar
//     gsap.to(".profile-avatar", {
//         y: 10,
//         duration: 3,
//         repeat: -1,
//         yoyo: true,
//         ease: "sine.inOut"
//     });

//     // Form input animations
//     const formInputs = document.querySelectorAll('.form-input');
//     formInputs.forEach(input => {
//         input.addEventListener('focus', () => {
//             gsap.to(input, {
//                 scale: 1.02,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });

//         input.addEventListener('blur', () => {
//             gsap.to(input, {
//                 scale: 1,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });
//     });

//     // Delete button shake animation
//     const deleteButtons = document.querySelectorAll('.btn-delete');
//     deleteButtons.forEach(button => {
//         button.addEventListener('mouseenter', () => {
//             gsap.to(button, {
//                 x: 5,
//                 duration: 0.1,
//                 repeat: 5,
//                 yoyo: true,
//                 ease: "power1.inOut"
//             });
//         });
//     });

//     // Add ripple effect to buttons
//     const buttons = document.querySelectorAll('.btn-main');
//     buttons.forEach(button => {
//         button.addEventListener('click', function (e) {
//             const x = e.clientX - e.target.getBoundingClientRect().left;
//             const y = e.clientY - e.target.getBoundingClientRect().top;

//             const ripple = document.createElement('span');
//             ripple.classList.add('ripple');
//             ripple.style.left = `${x}px`;
//             ripple.style.top = `${y}px`;

//             this.appendChild(ripple);

//             setTimeout(() => {
//                 ripple.remove();
//             }, 1000);
//         });
//     });
// }

// // Call this in your DOMContentLoaded event
// document.addEventListener('DOMContentLoaded', function () {
//     if (document.querySelector('.profile-container') || document.querySelector('.profile-edit-container')) {
//         initProfilePage();
//     }
// });

// function initReportForm() {
//     // Add focus animations to form inputs
//     const formInputs = document.querySelectorAll('.request-form .form-input');
//     formInputs.forEach(input => {
//         input.addEventListener('focus', () => {
//             gsap.to(input, {
//                 scale: 1.02,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });

//         input.addEventListener('blur', () => {
//             gsap.to(input, {
//                 scale: 1,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });
//     });

//     // Add ripple effect to submit button
//     const submitButton = document.querySelector('.btn-submit');
//     if (submitButton) {
//         submitButton.addEventListener('click', function (e) {
//             const x = e.clientX - e.target.getBoundingClientRect().left;
//             const y = e.clientY - e.target.getBoundingClientRect().top;

//             const ripple = document.createElement('span');
//             ripple.classList.add('ripple');
//             ripple.style.left = `${x}px`;
//             ripple.style.top = `${y}px`;

//             this.appendChild(ripple);

//             setTimeout(() => {
//                 ripple.remove();
//             }, 1000);
//         });
//     }

//     // Animate the form container
//     gsap.from('.request-card', {
//         opacity: 0,
//         y: 50,
//         duration: 0.8,
//         ease: "back.out"
//     });

//     // Animate the header icon
//     gsap.to('.request-header svg', {
//         y: 5,
//         duration: 3,
//         repeat: -1,
//         yoyo: true,
//         ease: "sine.inOut"
//     });
// }

// // Call this in your DOMContentLoaded event
// document.addEventListener('DOMContentLoaded', function () {
//     if (document.querySelector('.request-container')) {
//         initReportForm();
//     }
// });

// // Auth Page Animations
// function initAuthAnimations() {
//     // Form input focus effects
//     const formInputs = document.querySelectorAll('.auth-form .form-input');
//     formInputs.forEach(input => {
//         input.addEventListener('focus', () => {
//             gsap.to(input, {
//                 scale: 1.02,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });

//         input.addEventListener('blur', () => {
//             gsap.to(input, {
//                 scale: 1,
//                 duration: 0.2,
//                 ease: "power1.out"
//             });
//         });
//     });

//     // Button ripple effect
//     const authButtons = document.querySelectorAll('.auth-form .btn-main');
//     authButtons.forEach(button => {
//         button.addEventListener('click', function (e) {
//             const x = e.clientX - e.target.getBoundingClientRect().left;
//             const y = e.clientY - e.target.getBoundingClientRect().top;

//             const ripple = document.createElement('span');
//             ripple.classList.add('ripple');
//             ripple.style.left = `${x}px`;
//             ripple.style.top = `${y}px`;

//             this.appendChild(ripple);

//             setTimeout(() => {
//                 ripple.remove();
//             }, 1000);
//         });
//     });

//     // Auto-hide success message after 5 seconds
//     const successMessage = document.getElementById('success-message');
//     if (successMessage) {
//         setTimeout(() => {
//             gsap.to(successMessage, {
//                 opacity: 0,
//                 y: -20,
//                 duration: 0.5,
//                 onComplete: () => successMessage.remove()
//             });
//         }, 5000);
//     }
// }

// // Call this in your DOMContentLoaded event
// document.addEventListener('DOMContentLoaded', function () {
//     if (document.querySelector('.auth-container')) {
//         initAuthAnimations();
//     }
// });


// document.addEventListener('DOMContentLoaded', function() {
//     // Form animation
//     if (document.querySelector('.product-form-container')) {
//         gsap.from('.product-form-container', {
//             opacity: 0,
//             y: 50,
//             duration: 0.8,
//             ease: "back.out"
//         });

//         // Input focus animations
//         const inputs = document.querySelectorAll('.form-control, .form-select');
//         inputs.forEach(input => {
//             input.addEventListener('focus', () => {
//                 gsap.to(input, {
//                     scale: 1.02,
//                     duration: 0.2,
//                     ease: "power1.out"
//                 });
//             });
            
//             input.addEventListener('blur', () => {
//                 gsap.to(input, {
//                     scale: 1,
//                     duration: 0.2,
//                     ease: "power1.out"
//                 });
//             });
//         });

//         // Button ripple effect
//         const submitBtn = document.querySelector('.btn-submit-product');
//         if (submitBtn) {
//             submitBtn.addEventListener('click', function(e) {
//                 const x = e.clientX - e.target.getBoundingClientRect().left;
//                 const y = e.clientY - e.target.getBoundingClientRect().top;
//                 const ripple = document.createElement('span');
//                 ripple.classList.add('ripple');
//                 ripple.style.left = `${x}px`;
//                 ripple.style.top = `${y}px`;
//                 this.appendChild(ripple);
//                 setTimeout(() => { ripple.remove(); }, 1000);
//             });
//         }
//     }
// });

// document.addEventListener('DOMContentLoaded', function() {
//     // Table row animations
//     gsap.utils.toArray(".discount-table tr").forEach((row, i) => {
//         gsap.from(row, {
//             opacity: 0,
//             y: 20,
//             duration: 0.4,
//             delay: i * 0.05,
//             scrollTrigger: {
//                 trigger: row,
//                 start: "top 90%",
//                 toggleActions: "play none none none"
//             }
//         });
//     });

//     // Button hover effects
//     const buttons = document.querySelectorAll('.btn-edit, .btn-delete, .add-discount-btn');
//     buttons.forEach(button => {
//         button.addEventListener('mouseenter', () => {
//             gsap.to(button, {
//                 scale: 1.05,
//                 duration: 0.2
//             });
//         });
//         button.addEventListener('mouseleave', () => {
//             gsap.to(button, {
//                 scale: 1,
//                 duration: 0.2
//             });
//         });
//     });

//     // Filter select animation
//     const filterSelect = document.querySelector('.discount-filter select');
//     if (filterSelect) {
//         filterSelect.addEventListener('focus', () => {
//             gsap.to(filterSelect, {
//                 borderColor: 'var(--electric-purple)',
//                 duration: 0.3
//             });
//         });
//         filterSelect.addEventListener('blur', () => {
//             gsap.to(filterSelect, {
//                 borderColor: 'rgba(0, 245, 255, 0.4)',
//                 duration: 0.3
//             });
//         });
//     }
// });

// document.addEventListener('DOMContentLoaded', function() {
//     // Form animation
//     if (document.querySelector('.discount-form-container')) {
//         gsap.from('.discount-form-container', {
//             opacity: 0,
//             y: 50,
//             duration: 0.8,
//             ease: "back.out"
//         });

//         // Input focus animations
//         const inputs = document.querySelectorAll('.discount-form-select, .discount-form-input');
//         inputs.forEach(input => {
//             input.addEventListener('focus', () => {
//                 gsap.to(input, {
//                     scale: 1.02,
//                     duration: 0.2,
//                     ease: "power1.out"
//                 });
//             });
            
//             input.addEventListener('blur', () => {
//                 gsap.to(input, {
//                     scale: 1,
//                     duration: 0.2,
//                     ease: "power1.out"
//                 });
//             });
//         });

//         // Button ripple effect
//         const submitBtn = document.querySelector('.discount-submit-btn');
//         if (submitBtn) {
//             submitBtn.addEventListener('click', function(e) {
//                 const x = e.clientX - e.target.getBoundingClientRect().left;
//                 const y = e.clientY - e.target.getBoundingClientRect().top;
//                 const ripple = document.createElement('span');
//                 ripple.classList.add('ripple');
//                 ripple.style.left = `${x}px`;
//                 ripple.style.top = `${y}px`;
//                 this.appendChild(ripple);
//                 setTimeout(() => { ripple.remove(); }, 1000);
//             });
//         }
//     }
// });

// function initDiscountForm() {
//     // Add focus/blur effects to form elements
//     const formInputs = document.querySelectorAll('.discount-form-select, .discount-form-input');
//     formInputs.forEach(input => {
//         input.addEventListener('focus', () => {
//             gsap.to(input, { 
//                 scale: 1.02, 
//                 duration: 0.2, 
//                 ease: "power1.out",
//                 boxShadow: '0 0 0 3px rgba(151, 71, 255, 0.3)'
//             });
//         });
//         input.addEventListener('blur', () => {
//             gsap.to(input, { 
//                 scale: 1, 
//                 duration: 0.2, 
//                 ease: "power1.out",
//                 boxShadow: 'none'
//             });
//         });
//     });

//     // Add ripple effect to submit button
//     const submitBtn = document.querySelector('.discount-submit-btn');
//     if (submitBtn) {
//         submitBtn.addEventListener('click', function(e) {
//             const x = e.clientX - e.target.getBoundingClientRect().left;
//             const y = e.clientY - e.target.getBoundingClientRect().top;
//             const ripple = document.createElement('span');
//             ripple.classList.add('ripple');
//             ripple.style.left = `${x}px`;
//             ripple.style.top = `${y}px`;
//             this.appendChild(ripple);
//             setTimeout(() => { ripple.remove(); }, 1000);
//         });
//     }
// }

// // Add this to your DOMContentLoaded event listener
// if (document.querySelector('.discount-form-container')) {
//     initDiscountForm();
// }



// // Add this to your JavaScript to enhance form interactions
// document.addEventListener('DOMContentLoaded', function() {
//     // Add focus/blur effects to form inputs
//     const formInputs = document.querySelectorAll('.product-form .form-control, .product-form .form-select');
    
//     formInputs.forEach(input => {
//         input.addEventListener('focus', function() {
//             this.style.borderColor = 'var(--electric-purple)';
//             this.style.boxShadow = '0 0 0 3px rgba(151, 71, 255, 0.2)';
//         });
        
//         input.addEventListener('blur', function() {
//             this.style.borderColor = 'rgba(0, 245, 255, 0.4)';
//             this.style.boxShadow = 'none';
//         });
//     });
    
//     // Add animation to the form container
//     const formContainer = document.querySelector('.product-form-container');
//     if (formContainer) {
//         gsap.from(formContainer, {
//             opacity: 0,
//             y: 30,
//             duration: 0.8,
//             ease: "power2.out"
//         });
//     }
// });


// function initUsersTable() {
//     if (document.querySelector('.users-table')) {
//         gsap.from('.users-table tr', {
//             scrollTrigger: {
//                 trigger: '.users-table',
//                 start: "top 80%",
//                 toggleActions: "play none none none"
//             },
//             opacity: 0,
//             y: 20,
//             duration: 0.6,
//             stagger: 0.1,
//             ease: "power2.out"
//         });

//         const roleButtons = document.querySelectorAll('.btn-role');
//         roleButtons.forEach(button => {
//             button.addEventListener('click', function(e) {
//                 const x = e.clientX - e.target.getBoundingClientRect().left;
//                 const y = e.clientY - e.target.getBoundingClientRect().top;
//                 const ripple = document.createElement('span');
//                 ripple.classList.add('ripple');
//                 ripple.style.left = `${x}px`;
//                 ripple.style.top = `${y}px`;
//                 this.appendChild(ripple);
//                 setTimeout(() => { ripple.remove(); }, 1000);
//             });
//         });
//     }
// }

// // Add this to the DOMContentLoaded event listener
// document.addEventListener('DOMContentLoaded', function() {
//     // ... existing code ...
    
//     if (document.querySelector('.users-table')) {
//         initUsersTable();
//     }
// });


// // Enhanced Navbar Animations
// document.addEventListener('DOMContentLoaded', function() {
//     // Ripple effect for buttons
//     const buttons = document.querySelectorAll('.btn-main');
//     buttons.forEach(button => {
//         button.addEventListener('click', function(e) {
//             const x = e.clientX - e.target.getBoundingClientRect().left;
//             const y = e.clientY - e.target.getBoundingClientRect().top;
//             const ripple = document.createElement('span');
//             ripple.classList.add('ripple');
//             ripple.style.left = `${x}px`;
//             ripple.style.top = `${y}px`;
//             this.appendChild(ripple);
//             setTimeout(() => ripple.remove(), 600);
//         });
//     });

//     // Nav item hover animations
//     const navItems = document.querySelectorAll('nav a:not(.btn-main, .logo), .sub-nav a');
//     navItems.forEach(item => {
//         item.addEventListener('mouseenter', () => {
//             gsap.to(item, {
//                 y: -3,
//                 duration: 0.3,
//                 ease: "back.out(1.7)"
//             });
//         });
        
//         item.addEventListener('mouseleave', () => {
//             gsap.to(item, {
//                 y: 0,
//                 duration: 0.3,
//                 ease: "back.out(1.7)"
//             });
//         });
//     });

//     // Search input animation
//     const searchInput = document.querySelector('nav input[type="text"]');
//     if (searchInput) {
//         searchInput.addEventListener('focus', () => {
//             gsap.to(searchInput, {
//                 scale: 1.05,
//                 duration: 0.3,
//                 ease: "back.out(1.7)"
//             });
//         });
        
//         searchInput.addEventListener('blur', () => {
//             gsap.to(searchInput, {
//                 scale: 1,
//                 duration: 0.3,
//                 ease: "back.out(1.7)"
//             });
//         });
//     }

//     // Active link detection
//     const currentPath = window.location.pathname;
//     const navLinks = document.querySelectorAll('nav a, .sub-nav a');
    
//     navLinks.forEach(link => {
//         const linkPath = link.getAttribute('href');
//         if (currentPath === linkPath || 
//             (currentPath.startsWith(linkPath) && linkPath !== '/')) {
//             link.classList.add('active');
//         }
//     });

//     // Navbar scroll effect
//     let lastScroll = 0;
//     const navbar = document.querySelector('nav');
    
//     window.addEventListener('scroll', () => {
//         const currentScroll = window.pageYOffset;
        
//         if (currentScroll <= 0) {
//             navbar.style.transform = 'translateY(0)';
//             return;
//         }
        
//         if (currentScroll > lastScroll && currentScroll > 100) {
//             // Scroll down
//             navbar.style.transform = 'translateY(-100%)';
//         } else if (currentScroll < lastScroll) {
//             // Scroll up
//             navbar.style.transform = 'translateY(0)';
//         }
        
//         lastScroll = currentScroll;
//     });
// });

