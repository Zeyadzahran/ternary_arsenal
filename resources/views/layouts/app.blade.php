<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ternary Arsenal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                        space: ['Space Mono', 'monospace'],
                    },
                    colors: {
                        electric: {
                            blue: '#00F5FF',
                            purple: '#9747FF',
                            pink: '#FF00E5',
                            dark: '#0A0A1A',
                            light: '#E0E0FF',
                        },
                    },
                    backgroundImage: {
                        'circuit': "url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2IiBoZWlnaHQ9IjYiPgo8cmVjdCB3aWR0aD0iNiIgaGVpZ2h0PSI2IiBmaWxsPSIjMEEwQTFBIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNiA2TTYgMEwwIDZaIiBzdHJva2U9IiMwMEY1RkYiIHN0cm9rZS13aWR0aD0iMC4yIiBzdHJva2Utb3BhY2l0eT0iMC4yIi8+Cjwvc3ZnPg==')",
                        'gradient-radial': 'radial-gradient(circle at center, var(--tw-gradient-stops))',
                    }
                }
            }
        }
    </script>

    @yield('head')
</head>

<body class="bg-circuit">
    <div class="animated-bg">
        <div id="particles-js"></div>
    </div>
    @auth
    @include('layouts.navbar')
    @endauth
    
    <main class="container">
        @yield('content')
    </main>
    
    @auth
    @include('layouts.footer')
    @endauth
    
  
    <script>
        class TernaryArsenalApp {
            constructor() {
                this.isInitialized = false;
                this.animationElements = new Map();
                this.observers = new Map();
            }

            init() {
                if (this.isInitialized) return;
                
                console.log("Initializing Ternary Arsenal App...");
                
                requestAnimationFrame(() => {
                    this.initializeComponents();
                    this.setupEventListeners();
                    this.isInitialized = true;
                });
            }

            initializeComponents() {
                if (typeof particlesJS === 'function') {
                    this.initParticles();
                } else {
                    console.warn("particlesJS not loaded - skipping particle effects");
                }

                // Initialize GSAP animations
                if (typeof gsap !== 'undefined') {
                    this.initAnimations();
                } else {
                    console.warn("GSAP not loaded - skipping animations");
                }

                // Initialize page-specific features
                this.initPageFeatures();
            }

            // Keep the EXACT same particle configuration
            initParticles() {
                console.log("Initializing particle effects with adjusted settings...");

                particlesJS('particles-js', {
                    particles: {
                        number: { value: 90, density: { enable: true, value_area: 800 }},
                        color: { value: ["#00F5FF", "#9747FF", "#FF00E5"] },
                        shape: {
                            type: "circle", stroke: { width: 0, color: "#000000" },
                            polygon: { nb_sides: 5 }
                        },
                        opacity: {
                            value: 0.7, random: true,
                            anim: { enable: true, speed: 1, opacity_min: 0.3, sync: false }
                        },
                        size: {
                            value: 5, random: true,
                            anim: { enable: true, speed: 3, size_min: 1.5, sync: false }
                        },
                        line_linked: {
                            enable: true, distance: 180,
                            color: "#9747FF", opacity: 0.4, width: 1.5
                        },
                        move: {
                            enable: true, speed: 1.5, direction: "none", random: true,
                            straight: false, out_mode: "bounce", bounce: true,
                            attract: { enable: true, rotateX: 600, rotateY: 1200 }
                        }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: { enable: true, mode: "grab" },
                            onclick: { enable: true, mode: "push" },
                            resize: true
                        },
                        modes: {
                            grab: { distance: 180, line_linked: { opacity: 0.8 }},
                            bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
                            repulse: { distance: 250, duration: 0.4 },
                            push: { particles_nb: 5 },
                            remove: { particles_nb: 2 }
                        }
                    },
                    retina_detect: true
                });
            }

            initAnimations() {
                // Use Intersection Observer for better performance
                const observerOptions = {
                    root: null,
                    rootMargin: '0px 0px -20% 0px',
                    threshold: 0.1
                };

                // Animate sections
                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            gsap.from(entry.target, {
                                opacity: 0, y: 50, duration: 0.8, ease: "power2.out"
                            });
                            sectionObserver.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll("section").forEach(section => {
                    sectionObserver.observe(section);
                });

                // Animate cards
                const cardObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            gsap.from(entry.target, {
                                opacity: 0, y: 30, duration: 0.6, ease: "back.out"
                            });
                            cardObserver.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll(".card").forEach(card => {
                    cardObserver.observe(card);
                });

                this.observers.set('sections', sectionObserver);
                this.observers.set('cards', cardObserver);
            }

            initPageFeatures() {
                const cartLink = document.querySelector('[data-count]');
                if (cartLink) {
                    this.updateCartCount();
                }

                const pageTypes = [
                    { selector: '.profile-container, .profile-edit-container', init: () => this.initProfilePage() },
                    { selector: '.request-container', init: () => this.initReportForm() },
                    { selector: '.auth-container', init: () => this.initAuthAnimations() }
                ];

                pageTypes.forEach(({ selector, init }) => {
                    if (document.querySelector(selector)) {
                        init();
                    }
                });
            }

            setupEventListeners() {
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        this.handleResize();
                    }, 250);
                });

                document.addEventListener('click', (e) => {
                    if (e.target.classList.contains('btn-main')) {
                        this.createRippleEffect(e);
                    }
                });

                document.addEventListener('focus', (e) => {
                    if (e.target.classList.contains('form-input')) {
                        this.handleInputFocus(e.target);
                    }
                }, true);

                document.addEventListener('blur', (e) => {
                    if (e.target.classList.contains('form-input')) {
                        this.handleInputBlur(e.target);
                    }
                }, true);
            }

            handleResize() {
                if (window.pJSDom && window.pJSDom.length > 0) {
                    window.pJSDom[0].pJS.fn.canvasSize();
                }
            }

            createRippleEffect(event) {
                const target = event.target;
                const rect = target.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;
                
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                ripple.style.cssText = `
                    position: absolute;
                    left: ${x}px;
                    top: ${y}px;
                    width: 0;
                    height: 0;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    transform: translate(-50%, -50%);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;
                
                target.style.position = 'relative';
                target.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            }

            handleInputFocus(input) {
                if (!this.animationElements.has(input)) {
                    this.animationElements.set(input, { focused: false });
                }
                
                if (!this.animationElements.get(input).focused) {
                    gsap.to(input, { scale: 1.02, duration: 0.2, ease: "power1.out" });
                    this.animationElements.get(input).focused = true;
                }
            }

            handleInputBlur(input) {
                if (this.animationElements.has(input)) {
                    gsap.to(input, { scale: 1, duration: 0.2, ease: "power1.out" });
                    this.animationElements.get(input).focused = false;
                }
            }

            updateCartCount() {
                const cartElement = document.querySelector('[data-count]');
                if (cartElement) {
                    const count = parseInt(cartElement.getAttribute('data-count')) || 0;
                    cartElement.style.display = count > 0 ? 'inline-block' : 'none';
                }
            }

            initProfilePage() {
                const avatar = document.querySelector('.profile-avatar');
                if (avatar) {
                    gsap.to(avatar, {
                        y: 10, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut"
                    });
                }

                document.querySelectorAll('.btn-delete').forEach(button => {
                    button.addEventListener('mouseenter', () => {
                        gsap.to(button, {
                            x: 5, duration: 0.1, repeat: 5, yoyo: true, ease: "power1.inOut"
                        });
                    });
                });
            }

            initReportForm() {
                const requestCard = document.querySelector('.request-card');
                if (requestCard) {
                    gsap.from(requestCard, {
                        opacity: 0, y: 50, duration: 0.8, ease: "back.out"
                    });
                }

                const headerIcon = document.querySelector('.request-header svg');
                if (headerIcon) {
                    gsap.to(headerIcon, {
                        y: 5, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut"
                    });
                }
            }

            initAuthAnimations() {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    setTimeout(() => {
                        gsap.to(successMessage, {
                            opacity: 0, y: -20, duration: 0.5,
                            onComplete: () => successMessage.remove()
                        });
                    }, 5000);
                }
            }

            destroy() {
                this.observers.forEach(observer => observer.disconnect());
                this.observers.clear();
                this.animationElements.clear();
                this.isInitialized = false;
            }
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                0% { width: 0; height: 0; opacity: 1; }
                100% { width: 40px; height: 40px; opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        let app;
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                app = new TernaryArsenalApp();
                app.init();
            });
        } else {
            app = new TernaryArsenalApp();
            app.init();
        }

        // Expose app instance for debugging
        window.TernaryApp = app;
    </script>

    @yield('scripts')
</body>
</html>