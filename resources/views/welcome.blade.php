<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Arsenal | WW2 Arms Collector's Market</title>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Cinzel:wght@700&family=Playfair+Display:wght@700&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --battlefield: #1a1a1a;
            --rust: #8b4513;
            --bullet: #5c5c5c;
            --blood: #8a0303;
            --gold: #d4af37;
            --axis-red: #cc0000;
            --allied-blue: #3a6ea5;
            --soviet-red: #c11b17;
            --swiss-red: #ff0000;
            --swiss-white: #ffffff;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto Condensed', sans-serif;
            background-color: var(--battlefield);
            color: #e0e0e0;
            overflow-x: hidden;
            background-image: 
                linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1543351611-58f69d7c1781?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-attachment: fixed;
        }
        
        .war-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><rect width="100%" height="100%" fill="none" stroke="%238b4513" stroke-width="2" stroke-dasharray="15,10" opacity="0.3"/></svg>'),
                linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(138,3,3,0.1) 50%, rgba(0,0,0,0.9) 100%);
            z-index: -2;
        }
        
        .bullet-decals {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120"><circle cx="25" cy="35" r="3" fill="black" stroke="%238b4513" stroke-width="1.5"/><circle cx="65" cy="80" r="4" fill="black" stroke="%238b4513" stroke-width="1.5"/><circle cx="90" cy="50" r="2" fill="black" stroke="%238b4513" stroke-width="1.5"/><circle cx="40" cy="95" r="3.5" fill="black" stroke="%238b4513" stroke-width="1.5"/></svg>');
            background-size: 120px 120px;
            opacity: 0.7;
            z-index: -1;
        }
        
        .navbar {
            display: flex;
            justify-content: center;
            padding: 25px 0;
            background: rgba(10, 10, 10, 0.9);
            border-bottom: 3px solid var(--rust);
            position: relative;
            backdrop-filter: blur(5px);
        }
        
        .navbar::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--blood), transparent);
        }
        
        .nav-title {
            font-family: 'Black Ops One', cursive;
            font-size: 3rem;
            color: var(--gold);
            text-shadow: 3px 3px 0 var(--blood);
            letter-spacing: 5px;
            position: relative;
        }
        
        .nav-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }
        
        .war-hero {
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
        
        .war-hero h1 {
            font-family: 'Cinzel', serif;
            font-size: 6rem;
            margin: 0;
            color: #fff;
            text-shadow: 4px 4px 0 var(--blood), 
                         8px 8px 0 #000;
            letter-spacing: 8px;
            line-height: 1.1;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1.5s forwards 0.5s;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .war-hero h1 span {
            color: var(--gold);
            font-family: 'Black Ops One', cursive;
            font-size: 6.5rem;
            letter-spacing: 5px;
            position: relative;
        }
        
        .war-hero h1 span::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }
        
        .war-hero .tagline {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin: 30px auto;
            max-width: 900px;
            color: #fff;
            text-shadow: 2px 2px 3px #000;
            letter-spacing: 2px;
            position: relative;
            padding: 30px 0;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1.5s forwards 1s;
        }
        
        .war-hero .tagline::before, 
        .war-hero .tagline::after {
            content: '⚔';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            font-size: 2.5rem;
            opacity: 0.7;
        }
        
        .war-hero .tagline::before {
            left: -50px;
        }
        
        .war-hero .tagline::after {
            right: -50px;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 60px 0;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 1.5s forwards 1.5s;
        }
        
        .war-btn {
            padding: 20px 70px;
            border-radius: 0;
            font-family: 'Black Ops One', cursive;
            font-size: 1.8rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 3px;
            box-shadow: 6px 6px 0 rgba(0,0,0,0.6);
            z-index: 1;
            transform-style: preserve-3d;
        }
        
        .war-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }
        
        .war-btn:hover {
            transform: translateY(-8px) rotateX(15deg);
            box-shadow: 12px 15px 0 rgba(0,0,0,0.6);
        }
        
        .war-btn:hover::before {
            left: 100%;
        }
        
        .war-btn:active {
            transform: translateY(4px);
            box-shadow: 3px 3px 0 rgba(0,0,0,0.6);
        }
        
        .btn-join {
            background: var(--blood);
            color: #fff;
            border: 4px solid var(--gold);
        }
        
        .btn-join:hover {
            background: var(--gold);
            color: var(--blood);
            text-shadow: 0 0 5px rgba(0,0,0,0.3);
        }
        
        .btn-login {
            background: rgba(42, 52, 57, 0.9);
            color: var(--gold);
            border: 4px solid var(--bullet);
        }
        
        .btn-login:hover {
            background: var(--bullet);
            color: #fff;
        }
        
        .country-section {
            padding: 100px 20px;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            scroll-margin-top: 100px;
        }
        
        .country-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100vw;
            height: 100%;
            background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.8) 100%);
            z-index: -1;
        }
        
        .country-header {
            display: flex;
            align-items: center;
            margin-bottom: 60px;
            opacity: 0;
            transform: translateX(-100px);
            transition: all 1s ease;
        }
        
        .country-header.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .country-flag {
            width: 120px;
            height: 80px;
            margin-right: 40px;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
            border: 3px solid var(--gold);
            position: relative;
            overflow: hidden;
        }
        
        .country-flag::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0,0,0,0.1) 0%, rgba(255,255,255,0.1) 50%, rgba(0,0,0,0.1) 100%);
        }
        
        .country-title {
            font-family: 'Cinzel', serif;
            font-size: 3.5rem;
            color: #fff;
            text-shadow: 3px 3px 0 var(--blood);
            letter-spacing: 3px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .country-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }
        
        .country-subtitle {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold);
            margin-top: 10px;
            font-style: italic;
        }
        
        .country-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease 0.3s;
        }
        
        .country-content.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .country-text {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .highlight {
            color: var(--gold);
            font-weight: 700;
        }
        
        .timeline {
            position: relative;
            padding-left: 30px;
            border-left: 3px solid var(--gold);
        }
        
        .timeline-item {
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 20px;
            border-bottom: 1px dashed rgba(255,255,255,0.2);
        }
        
        .timeline-year {
            font-family: 'Black Ops One', cursive;
            color: var(--gold);
            font-size: 1.8rem;
            margin-bottom: 10px;
            position: relative;
        }
        
        .timeline-year::before {
            content: '';
            position: absolute;
            left: -38px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            background: var(--blood);
            border: 3px solid var(--gold);
            border-radius: 50%;
        }
        
        .timeline-event {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .country-image {
            width: 100%;
            height: 400px;
            background-size: cover;
            background-position: center;
            border: 5px solid var(--rust);
            box-shadow: 10px 10px 30px rgba(0,0,0,0.7);
            position: relative;
            transition: all 0.5s ease;
        }
        
        .country-image:hover {
            transform: scale(1.02);
            box-shadow: 15px 15px 40px rgba(0,0,0,0.8);
        }
        
        .country-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.7) 100%);
        }
        
        .image-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            font-style: italic;
            color: var(--gold);
            font-size: 1.1rem;
        }
        
        /* Country-specific colors */
        .germany-section .country-title {
            color: #fff;
            text-shadow: 3px 3px 0 var(--axis-red);
        }
        
        .germany-section .country-title::after {
            background: linear-gradient(90deg, var(--axis-red), transparent);
        }
        
        .germany-section .country-flag {
            background: linear-gradient(180deg, #000000 33%, #dd0000 33%, #dd0000 66%, #ffce00 66%);
            border-color: var(--axis-red);
        }
        
        .britain-section .country-title {
            color: #fff;
            text-shadow: 3px 3px 0 var(--allied-blue);
        }
        
        .britain-section .country-title::after {
            background: linear-gradient(90deg, var(--allied-blue), transparent);
        }
        
        .britain-section .country-flag {
            background: url('https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png');
            background-size: cover;
            border-color: var(--allied-blue);
        }
        
        .soviet-section .country-title {
            color: #fff;
            text-shadow: 3px 3px 0 var(--soviet-red);
        }
        
        .soviet-section .country-title::after {
            background: linear-gradient(90deg, var(--soviet-red), transparent);
        }
        
        .soviet-section .country-flag {
            background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/1200px-Flag_of_Russia.svg.png');
            background-size: cover;
            border-color: var(--soviet-red);
        }
        
        .swiss-section .country-title {
            color: #fff;
            text-shadow: 3px 3px 0 var(--swiss-red);
        }
        
        .swiss-section .country-title::after {
            background: linear-gradient(90deg, var(--swiss-red), transparent);
        }
        
        .swiss-section .country-flag {
            background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/1200px-Flag_of_Switzerland.svg.png');
            background-size: cover;
            border-color: var(--swiss-white);
        }
        
        .ammo-strip {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: repeating-linear-gradient(90deg, 
                var(--bullet), 
                var(--bullet) 25px, 
                var(--blood) 25px, 
                var(--blood) 50px);
            z-index: 100;
        }
        
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
            .nav-title {
                font-size: 2rem;
            }
            
            .war-hero h1 {
                font-size: 3.5rem;
            }
            
            .war-hero h1 span {
                font-size: 4rem;
            }
            
            .war-hero .tagline {
                font-size: 1.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                gap: 25px;
            }
            
            .war-btn {
                width: 100%;
                max-width: 350px;
                margin: 0 auto;
                font-size: 1.5rem;
                padding: 18px 40px;
            }
            
            .country-header {
                flex-direction: column;
                text-align: center;
                margin-bottom: 40px;
            }
            
            .country-flag {
                margin-right: 0;
                margin-bottom: 30px;
            }
            
            .country-title {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="war-overlay"></div>
    <div class="bullet-decals"></div>
    
    <nav class="navbar">
        <div class="nav-title">TERNARY ARSENAL</div>
    </nav>
    
    <section class="war-hero">
        <h1>HISTORY'S <span>DEADLIEST</span> ARMS</h1>
        <p class="tagline">Authentic WW2 Weapons • Verified Collectibles • Battlefield Relics</p>
        
        <div class="cta-buttons">
            <a href="/register" class="war-btn btn-join">Join The Arsenal</a>
            <a href="/login" class="war-btn btn-login">Operator Access</a>
        </div>
    </section>
    
    <!-- Germany Section -->
    <section class="country-section germany-section" id="germany">
        <div class="country-header">
            <div class="country-flag"></div>
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
    <section class="country-section britain-section" id="britain">
        <div class="country-header">
            <div class="country-flag"></div>
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
    <section class="country-section soviet-section" id="soviet">
        <div class="country-header">
            <div class="country-flag"></div>
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
            
            <div class="country-image" style="background-image: url('https://images.unsplash.com/photo-1576435728744-7c61a5d67a9e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="image-caption">Soviet soldiers raising the flag over the Reichstag, Berlin 1945</div>
            </div>
        </div>
    </section>
    
    <!-- Swiss Section -->
    <section class="country-section swiss-section" id="swiss">
        <div class="country-header">
            <div class="country-flag"></div>
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
    
    <div class="ammo-strip"></div>
    
    <script>
        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });
        
        document.querySelectorAll('.country-header, .country-content').forEach(el => {
            observer.observe(el);
        });
        
        // Artillery sound when buttons are hovered
        const warButtons = document.querySelectorAll('.war-btn');
        const artillerySound = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-explosion-impact-1684.mp3');
        artillerySound.volume = 0.3;
        
        warButtons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                artillerySound.currentTime = 0;
                artillerySound.play();
                
                // Create explosion effect
                const explosion = document.createElement('div');
                explosion.style.position = 'absolute';
                explosion.style.width = '150px';
                explosion.style.height = '150px';
                explosion.style.background = 'radial-gradient(circle, rgba(212,175,55,0.5) 0%, rgba(138,3,3,0) 70%)';
                explosion.style.borderRadius = '50%';
                explosion.style.filter = 'blur(8px)';
                explosion.style.left = Math.random() * 70 + 15 + '%';
                explosion.style.top = Math.random() * 70 + 15 + '%';
                explosion.style.zIndex = '-1';
                explosion.style.animation = 'fadeOut 1.5s forwards';
                
                document.body.appendChild(explosion);
                
                setTimeout(() => {
                    explosion.remove();
                }, 1500);
            });
        });
        
        // Add keyframes for explosion
        const styleSheet = document.createElement("style");
        styleSheet.innerHTML = `
            @keyframes fadeOut { 
                0% { opacity: 1; transform: scale(0.3); } 
                100% { opacity: 0; transform: scale(1.5); } 
            }
        `;
        document.head.appendChild(styleSheet);
    </script>
</body>
</html>