<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ternary Arsenal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Space+Mono:wght@700&display=swap" rel="stylesheet">

    <!-- GSAP & Particles.js -->
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
    <!-- Animated Background -->
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
    <!-- Injected Full Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("DOM fully loaded and parsed");

            if (typeof particlesJS === 'function') {
                initParticles();
            } else {
                console.warn("particlesJS not loaded - skipping particle effects");
            }

            if (typeof gsap !== 'undefined') {
                initAnimations();
            } else {
                console.warn("GSAP not loaded - skipping animations");
            }

            const cartLink = document.querySelector('[data-count]');
            if (cartLink) {
                updateCartCount();
            }

            if (document.querySelector('.profile-container') || document.querySelector('.profile-edit-container')) {
                initProfilePage();
            }

            if (document.querySelector('.request-container')) {
                initReportForm();
            }

            if (document.querySelector('.auth-container')) {
                initAuthAnimations();
            }
        });

        function initParticles() {
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

        function initAnimations() {
            gsap.utils.toArray("section").forEach(section => {
                gsap.from(section, {
                    scrollTrigger: {
                        trigger: section,
                        start: "top 80%",
                        toggleActions: "play none none none"
                    },
                    opacity: 0, y: 50, duration: 0.8, ease: "power2.out"
                });
            });

            gsap.utils.toArray(".card").forEach(card => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: "top 90%",
                        toggleActions: "play none none none"
                    },
                    opacity: 0, y: 30, duration: 0.6, ease: "back.out"
                });
            });
        }

        function updateCartCount() {
            const count = document.querySelector('[data-count]').getAttribute('data-count');
            if (count > 0) {
                document.querySelector('[data-count]').style.display = 'inline-block';
            }
        }

        function initProfilePage() {
            gsap.to(".profile-avatar", {
                y: 10, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut"
            });

            const formInputs = document.querySelectorAll('.form-input');
            formInputs.forEach(input => {
                input.addEventListener('focus', () => {
                    gsap.to(input, { scale: 1.02, duration: 0.2, ease: "power1.out" });
                });
                input.addEventListener('blur', () => {
                    gsap.to(input, { scale: 1, duration: 0.2, ease: "power1.out" });
                });
            });

            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('mouseenter', () => {
                    gsap.to(button, {
                        x: 5, duration: 0.1, repeat: 5, yoyo: true, ease: "power1.inOut"
                    });
                });
            });

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
                    setTimeout(() => { ripple.remove(); }, 1000);
                });
            });
        }

        function initReportForm() {
            const formInputs = document.querySelectorAll('.request-form .form-input');
            formInputs.forEach(input => {
                input.addEventListener('focus', () => {
                    gsap.to(input, { scale: 1.02, duration: 0.2, ease: "power1.out" });
                });
                input.addEventListener('blur', () => {
                    gsap.to(input, { scale: 1, duration: 0.2, ease: "power1.out" });
                });
            });

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
                    setTimeout(() => { ripple.remove(); }, 1000);
                });
            }

            gsap.from('.request-card', {
                opacity: 0, y: 50, duration: 0.8, ease: "back.out"
            });

            gsap.to('.request-header svg', {
                y: 5, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut"
            });
        }

        function initAuthAnimations() {
            const formInputs = document.querySelectorAll('.auth-form .form-input');
            formInputs.forEach(input => {
                input.addEventListener('focus', () => {
                    gsap.to(input, { scale: 1.02, duration: 0.2, ease: "power1.out" });
                });
                input.addEventListener('blur', () => {
                    gsap.to(input, { scale: 1, duration: 0.2, ease: "power1.out" });
                });
            });

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
                    setTimeout(() => { ripple.remove(); }, 1000);
                });
            });

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
    </script>

    @yield('scripts')
</body>
</html>
