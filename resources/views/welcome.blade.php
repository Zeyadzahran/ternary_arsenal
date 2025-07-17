@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Arsenal | WW2 Arms Collector's Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Cinzel:wght@700&family=Playfair+Display:wght@700&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* Custom styles for welcome page that extend app.css */
        .welcome-hero {
            text-align: center;
            padding: 120px 20px 80px;
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-hero h1 {
            font-family: 'Cinzel', serif;
            font-size: 4rem;
            margin: 0;
            color: var(--electric-light);
            text-shadow: 0 0 10px rgba(151, 71, 255, 0.5);
            letter-spacing: 5px;
            line-height: 1.1;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }

        .welcome-hero h1 span {
            color: var(--electric-blue);
            font-family: 'Black Ops One', cursive;
            font-size: 4.5rem;
            letter-spacing: 5px;
            position: relative;
        }

        .welcome-hero .tagline {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin: 30px auto;
            max-width: 900px;
            color: var(--electric-light);
            letter-spacing: 2px;
            position: relative;
            padding: 30px 0;
        }

        .welcome-hero .tagline::before,
        .welcome-hero .tagline::after {
            content: '⚔';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--electric-purple);
            font-size: 2.5rem;
            opacity: 0.7;
        }

        .welcome-hero .tagline::before {
            left: -50px;
        }

        .welcome-hero .tagline::after {
            right: -50px;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 60px 0;
            flex-wrap: wrap;
        }

        .welcome-btn {
            padding: 15px 40px;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            z-index: 1;
            background: linear-gradient(90deg, var(--electric-blue), var(--electric-purple));
            color: var(--electric-dark);
        }

        .welcome-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(151, 71, 255, 0.4);
        }

        .welcome-btn.secondary {
            background: rgba(10, 10, 26, 0.6);
            border: 2px solid var(--electric-purple);
            color: var(--electric-light);
        }

        .welcome-btn.secondary:hover {
            background: var(--electric-purple);
            color: var(--electric-dark);
        }

        /* Country Sections */
        .country-section {
            padding: 100px 20px;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            scroll-margin-top: 100px;
        }

        .country-header {
            display: flex;
            align-items: center;
            margin-bottom: 60px;
        }

        .country-flag {
            width: 100px;
            height: 70px;
            margin-right: 40px;
            border-radius: 8px;
            border: 2px solid var(--electric-purple);
            box-shadow: 0 0 20px rgba(151, 71, 255, 0.3);
        }

        .country-title {
            font-family: 'Cinzel', serif;
            font-size: 2.5rem;
            color: var(--electric-light);
            letter-spacing: 3px;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 10px;
        }

        .country-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--electric-blue), var(--electric-purple));
        }

        .country-subtitle {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--electric-light);
            opacity: 0.8;
            font-style: italic;
        }

        .country-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .country-text {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
            color: var(--electric-light);
            opacity: 0.9;
        }

        .highlight {
            color: var(--electric-blue);
            font-weight: 600;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
            border-left: 3px solid var(--electric-purple);
        }

        .timeline-item {
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 20px;
            border-bottom: 1px dashed rgba(0, 245, 255, 0.2);
        }

        .timeline-year {
            font-family: 'Poppins', sans-serif;
            color: var(--electric-blue);
            font-size: 1.3rem;
            margin-bottom: 10px;
            position: relative;
            font-weight: 700;
        }

        .timeline-year::before {
            content: '';
            position: absolute;
            left: -38px;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            background: var(--electric-pink);
            border: 2px solid var(--electric-purple);
            border-radius: 50%;
        }

        .timeline-event {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--electric-light);
            opacity: 0.9;
        }

        .country-image {
            width: 100%;
            height: 400px;
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            border: 2px solid rgba(0, 245, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 245, 255, 0.1);
            position: relative;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        .country-image:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(151, 71, 255, 0.3);
            border-color: var(--electric-purple);
        }

        .country-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgba(10, 10, 26, 0.7) 0%, rgba(151, 71, 255, 0.1) 50%, rgba(10, 10, 26, 0.7) 100%);
        }

        .image-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background: rgba(10, 10, 26, 0.8);
            font-style: italic;
            color: var(--electric-light);
            font-size: 0.9rem;
            z-index: 1;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .country-content {
                grid-template-columns: 1fr;
            }

            .country-image {
                height: 300px;
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .welcome-hero h1 {
                font-size: 2.5rem;
            }

            .welcome-hero h1 span {
                font-size: 3rem;
            }

            .welcome-hero .tagline {
                font-size: 1.2rem;
                padding: 20px 0;
            }

            .welcome-hero .tagline::before,
            .welcome-hero .tagline::after {
                display: none;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 20px;
            }

            .welcome-btn {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }

            .country-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 40px;
            }

            .country-flag {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .country-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body class="bg-circuit">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div id="particles-js"></div>
    </div>
    
    <main class="container">
        <section class="welcome-hero">
            <h1>HISTORY'S <span>DEADLIEST</span> ARMS</h1>
            <p class="tagline">Authentic WW2 Weapons • Verified Collectibles • Battlefield Relics</p>
            
            <div class="cta-buttons">
                <a href="/register" class="welcome-btn">Join The Arsenal</a>
                <a href="/login" class="welcome-btn secondary">Operator Access</a>
                <a href="/product" class="welcome-btn">Browse Collection</a>
            </div>
        </section>
        
        <!-- Germany Section -->
        <section class="country-section" id="germany">
            <div class="country-header">
                <div class="country-flag" style="background: linear-gradient(180deg, #000000 33%, #dd0000 33%, #dd0000 66%, #ffce00 66%);"></div>
                <div>
                    <h2 class="country-title">GERMAN PERSPECTIVE</h2>
                    <p class="country-subtitle">The Third Reich's military innovations and strategic campaigns</p>
                </div>
            </div>
            
            <div class="country-content">
                <div>
                    <p class="country-text">Germany revolutionized modern warfare with <span class="highlight">Blitzkrieg tactics</span> that combined air power and armored units to overwhelm enemies quickly. Their technological advancements included the V-2 rocket, jet aircraft, and superior tank designs that gave them early dominance in the war.</p>
                    
                    <p class="country-text">By 1941, Germany controlled or allied with most of continental Europe through a series of lightning military campaigns. The <span class="highlight">Wehrmacht</span> emphasized mobility and decentralized decision-making through their Auftragstaktik system, often outmaneuvering more rigid Allied command structures.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">1939</div>
                            <div class="timeline-event">Invasion of Poland begins WWII</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1940</div>
                            <div class="timeline-event">Fall of France in just six weeks</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1941</div>
                            <div class="timeline-event">Operation Barbarossa invades Soviet Union</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1944-45</div>
                            <div class="timeline-event">Defeat and unconditional surrender</div>
                        </div>
                    </div>
                </div>
                
                <div class="country-image" style="background-image: url('https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="image-caption">German Panzer division advancing through Poland, September 1939</div>
                </div>
            </div>
        </section>
        
        <!-- Britain Section -->
        <section class="country-section" id="britain">
            <div class="country-header">
                <div class="country-flag" style="background: url('https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png'); background-size: cover;"></div>
                <div>
                    <h2 class="country-title">BRITISH PERSPECTIVE</h2>
                    <p class="country-subtitle">The United Kingdom's resilience and leadership during the darkest days</p>
                </div>
            </div>
            
            <div class="country-content">
                <div>
                    <p class="country-text">Britain endured <span class="highlight">57 consecutive nights of bombing</span> during the Blitz (1940-41), demonstrating remarkable civilian resilience. The RAF's victory in the Battle of Britain prevented German invasion and marked Hitler's first major defeat, achieved through superior radar technology and pilot skill.</p>
                    
                    <p class="country-text">Under <span class="highlight">Winston Churchill's</span> leadership, Britain stood alone against Nazi Germany in 1940-41, refusing to consider surrender despite overwhelming odds. British intelligence breakthroughs like cracking the Enigma code at Bletchley Park provided invaluable information that shortened the war.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">1939</div>
                            <div class="timeline-event">Declaration of war after Germany invades Poland</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1940</div>
                            <div class="timeline-event">Dunkirk evacuation saves 338,000 Allied troops</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1942</div>
                            <div class="timeline-event">Victory at El Alamein turns tide in North Africa</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1944</div>
                            <div class="timeline-event">D-Day landings begin liberation of Europe</div>
                        </div>
                    </div>
                </div>
                
                <div class="country-image" style="background-image: url('https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="image-caption">RAF Spitfires engage German bombers during the Battle of Britain, 1940</div>
                </div>
            </div>
        </section>
        
        <!-- Soviet Section -->
        <section class="country-section" id="soviet">
            <div class="country-header">
                <div class="country-flag" style="background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/1200px-Flag_of_Russia.svg.png'); background-size: cover;"></div>
                <div>
                    <h2 class="country-title">SOVIET PERSPECTIVE</h2>
                    <p class="country-subtitle">The Great Patriotic War and the defeat of Nazi Germany</p>
                </div>
            </div>
            
            <div class="country-content">
                <div>
                    <p class="country-text">The Soviet Union suffered approximately <span class="highlight">27 million deaths</span>, the highest of any nation in WWII. The <span class="highlight">Battle of Stalingrad</span> (1942-43) became the turning point where Soviet forces encircled and destroyed the German 6th Army, marking the beginning of Germany's retreat from the East.</p>
                    
                    <p class="country-text">Despite losing much of its western territories initially, Soviet industry evacuated and rebuilt entire factories east of the Urals. The <span class="highlight">T-34 tank</span> became emblematic of Soviet technological and industrial achievements, outproducing German tanks by wide margins.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">1941</div>
                            <div class="timeline-event">Operation Barbarossa begins - Germany invades USSR</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1942-43</div>
                            <div class="timeline-event">Battle of Stalingrad - turning point of the war</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1943</div>
                            <div class="timeline-event">Battle of Kursk - largest tank battle in history</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1945</div>
                            <div class="timeline-event">Battle of Berlin - Red Army captures German capital</div>
                        </div>
                    </div>
                </div>
                
                <div class="country-image" style="background-image: url('https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="image-caption">Soviet soldiers raising the flag over the Reichstag, Berlin 1945</div>
                </div>
            </div>
        </section>
        
        <!-- Swiss Section -->
        <section class="country-section" id="swiss">
            <div class="country-header">
                <div class="country-flag" style="background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/1200px-Flag_of_Switzerland.svg.png'); background-size: cover;"></div>
                <div>
                    <h2 class="country-title">SWISS PERSPECTIVE</h2>
                    <p class="country-subtitle">Armed neutrality during the global conflict</p>
                </div>
            </div>
            
            <div class="country-content">
                <div>
                    <p class="country-text">Switzerland maintained its neutrality through a combination of <span class="highlight">military preparedness</span>, geographic advantages, and economic concessions to both sides. The Swiss Army, under General Henri Guisan, developed the National Redoubt strategy - a plan to retreat into the Alpine mountains if invaded.</p>
                    
                    <p class="country-text">Swiss banks handled financial transactions for both Allied and Axis powers, leading to postwar controversies about Nazi gold. At the same time, Switzerland served as an important <span class="highlight">diplomatic hub</span> and protected thousands of refugees through organizations like the International Red Cross.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">1939</div>
                            <div class="timeline-event">Mobilization of Swiss Army as war begins</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1940</div>
                            <div class="timeline-event">National Redoubt strategy developed</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1942</div>
                            <div class="timeline-event">Strict border controls implemented</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1945</div>
                            <div class="timeline-event">Post-war negotiations about Nazi assets</div>
                        </div>
                    </div>
                </div>
                
                <div class="country-image" style="background-image: url('https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    <div class="image-caption">Swiss border guards patrol mountainous terrain, 1943</div>
                </div>
            </div>
        </section>
    </main>
    
    <script>
        // Scroll animations for country sections
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.country-section');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.querySelector('.country-header').style.opacity = '1';
                        entry.target.querySelector('.country-header').style.transform = 'translateY(0)';
                        entry.target.querySelector('.country-content').style.opacity = '1';
                        entry.target.querySelector('.country-content').style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            sections.forEach(section => {
                observer.observe(section);
                section.querySelector('.country-header').style.opacity = '0';
                section.querySelector('.country-header').style.transform = 'translateY(50px)';
                section.querySelector('.country-header').style.transition = 'all 0.8s ease-out';
                
                section.querySelector('.country-content').style.opacity = '0';
                section.querySelector('.country-content').style.transform = 'translateY(50px)';
                section.querySelector('.country-content').style.transition = 'all 0.8s ease-out 0.3s';
            });
            
            // GSAP animations for hero section
            if (typeof gsap !== 'undefined') {
                gsap.from('.welcome-hero h1', {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    ease: "power2.out"
                });
                
                gsap.from('.welcome-hero .tagline', {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    delay: 0.3,
                    ease: "power2.out"
                });
                
                gsap.from('.cta-buttons', {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    delay: 0.6,
                    ease: "power2.out"
                });
            }
        });
    </script>
</body>
</html>