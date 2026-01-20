@extends('layouts.base')
@section('content')

    <style>
        /* Google Fonts Import */
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Cinzel:wght@400;600;700&family=Parisienne&family=Dancing+Script:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .welcome-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5530 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* Animated Background Particles */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(34, 197, 94, 0.6);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
        }

        .particle:nth-child(2n) {
            background: rgba(59, 130, 246, 0.6);
            animation-duration: 12s;
            animation-delay: -2s;
        }

        .particle:nth-child(3n) {
            background: rgba(16, 185, 129, 0.4);
            animation-duration: 10s;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            50% {
                transform: translateY(-100px) rotate(180deg);
            }
        }

        /* Main Welcome Text */
        .welcome-text {
            text-align: center;
            z-index: 10;
            position: relative;
        }

        /* Welcome Line - Line 1 */
        .welcome-line {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-size: clamp(2rem, 5vw, 4rem);
            font-weight: 400;
            color: rgba(255, 255, 255, 0.9);
            text-align: center;
            margin-bottom: 1.5rem;
            animation: welcomeSlideIn 1.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            opacity: 0;
            transform: translateY(-30px);
            letter-spacing: 0.05em;
        }

        /* QT QMS Line - Line 2 */
        .qt-qms-line {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4rem;
            margin-bottom: 2rem;
            animation: qtQmsSlideIn 2s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.5s forwards;
            opacity: 0;
            transform: translateY(50px);
        }

        .qt-highlight {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-size: clamp(4rem, 10vw, 8rem);
            font-weight: 900;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 40px rgba(34, 197, 94, 0.6);
            display: inline-block;
            animation: qtGlow 3s ease-in-out infinite alternate;
            letter-spacing: -0.02em;
        }

        .qms-highlight {
            font-family: 'Playfair Display', 'Georgia', serif;
            font-size: clamp(4rem, 10vw, 8rem);
            font-weight: 900;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #1d4ed8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 40px rgba(30, 64, 175, 0.6);
            display: inline-block;
            animation: qmsGlow 3s ease-in-out infinite alternate;
            animation-delay: 1.5s;
            letter-spacing: -0.02em;
        }

        @keyframes welcomeSlideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes qtQmsSlideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes qtGlow {
            0% {
                filter: brightness(1) drop-shadow(0 0 15px rgba(34, 197, 94, 0.4));
            }

            100% {
                filter: brightness(1.3) drop-shadow(0 0 25px rgba(34, 197, 94, 0.8));
            }
        }

        @keyframes qmsGlow {
            0% {
                filter: brightness(1) drop-shadow(0 0 15px rgba(30, 64, 175, 0.4));
            }

            100% {
                filter: brightness(1.3) drop-shadow(0 0 25px rgba(30, 64, 175, 0.8));
            }
        }

        /* QT Tagline - Line 3 */
        .qt-tagline {
            font-family: 'Parisienne', 'Dancing Script', cursive;
            font-size: clamp(1.5rem, 3.5vw, 2.8rem);
            font-weight: 400;
            background: linear-gradient(135deg, #22c55e 0%, rgb(29, 195, 90) 30%, rgb(9, 191, 39) 70%, rgb(17, 218, 57) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 2.5rem;
            animation: taglineSlideIn 2s ease-out 1.5s forwards;
            opacity: 0;
            transform: translateY(20px);
            letter-spacing: 0.02em;
            text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .qt-tagline::before {
            content: '✦';
            position: absolute;
            left: -2.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: #22c55e;
            font-size: 1.5rem;
            animation: sparkle 2s ease-in-out infinite alternate;
        }

        .qt-tagline::after {
            content: '✦';
            position: absolute;
            right: -2.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: #1e40af;
            font-size: 1.5rem;
            animation: sparkle 2s ease-in-out infinite alternate;
            animation-delay: 1s;
        }

        @keyframes sparkle {
            0% {
                opacity: 0.6;
                transform: translateY(-50%) scale(1);
            }

            100% {
                opacity: 1;
                transform: translateY(-50%) scale(1.2);
            }
        }

        /* Final Line - Line 4 */
        .final-line {
            font-family: 'Cinzel', 'Times New Roman', serif;
            font-size: clamp(1.2rem, 2.8vw, 2rem);
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            animation: finalLineSlideIn 2s ease-out 2s forwards;
            opacity: 0;
            transform: translateY(20px);
            margin-bottom: 3rem;
        }

        @keyframes diamondSpin {
            0% {
                transform: translateY(-50%) rotate(0deg);
            }

            100% {
                transform: translateY(-50%) rotate(360deg);
            }
        }

        @keyframes taglineSlideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes finalLineSlideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        /* Animated Button */
        .action-button {
            margin-top: 3rem;
            z-index: 10;
            animation: buttonSlideIn 2s ease-out 2s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #22c55e, #1e40af);
            border: none;
            color: white;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 30px rgba(34, 197, 94, 0.4);
        }

        @keyframes buttonSlideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Geometric Shapes */
        .geometric-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: shapeFloat 15s infinite ease-in-out;
        }

        .shape-1 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #22c55e, #1e40af);
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            background: linear-gradient(45deg, #1e40af, #22c55e);
            top: 20%;
            right: 15%;
            animation-delay: -5s;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #16a34a, #1e3a8a);
            bottom: 20%;
            left: 20%;
            animation-delay: -10s;
        }

        @keyframes shapeFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f2027, #2c5530);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            animation: fadeOut 1s ease-out 3s forwards;
        }

        .loading-spinner {
            width: 80px;
            height: 80px;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-left: 4px solid #22c55e;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .qt-qms-line {
                gap: 2rem;
                flex-wrap: wrap;
            }

            .welcome-container {
                padding: 2rem 1rem;
            }

            .qt-tagline::before,
            .qt-tagline::after {
                display: none;
            }
        }
    </style>

    <!-- Loading Animation -->
    <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="welcome-container">
        <!-- Animated Background Particles -->
        <div class="particle" style="top: 20%; left: 10%;"></div>
        <div class="particle" style="top: 80%; left: 80%;"></div>
        <div class="particle" style="top: 30%; left: 70%;"></div>
        <div class="particle" style="top: 70%; left: 20%;"></div>
        <div class="particle" style="top: 40%; left: 90%;"></div>
        <div class="particle" style="top: 60%; left: 5%;"></div>
        <div class="particle" style="top: 10%; left: 50%;"></div>
        <div class="particle" style="top: 90%; left: 40%;"></div>

        <!-- Geometric Shapes -->
        <div class="geometric-shape shape-1"></div>
        <div class="geometric-shape shape-2"></div>
        <div class="geometric-shape shape-3"></div>

        <!-- Main Content -->
        <div class="welcome-text">
            <h1 class="welcome-line">Welcome To</h1>
            <div class="qt-qms-line">
                <span class="qt-highlight">QT</span>
                <span class="qms-highlight">QMS</span>
            </div>
            <p class="qt-tagline">Quality comes before Trust</p>
            <p class="final-line">Quality Management System</p>
        </div>

        <!-- Action Button -->
        <div class="action-button">
            <a href="{{ route('quality.dashboard') }}" class="btn-primary">
                Get Started
            </a>
        </div>
    </div>

    <script>
        // Add more particles dynamically
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.welcome-container');

            // Create additional floating particles
            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                particle.style.animationDuration = (Math.random() * 5 + 8) + 's';
                container.appendChild(particle);
            }

            // Add typing effect to taglines
            const qtTagline = document.querySelector('.qt-tagline');
            const qmsTagline = document.querySelector('.qms-tagline');
            const qtOriginalText = qtTagline.textContent;
            const qmsOriginalText = qmsTagline.textContent;

            qtTagline.textContent = '';
            qmsTagline.textContent = '';

            setTimeout(() => {
                let i = 0;
                const qtTypeInterval = setInterval(() => {
                    qtTagline.textContent += qtOriginalText[i];
                    i++;
                    if (i >= qtOriginalText.length) {
                        clearInterval(qtTypeInterval);
                    }
                }, 80);

                // Start QMS tagline typing simultaneously
                let j = 0;
                const qmsTypeInterval = setInterval(() => {
                    qmsTagline.textContent += qmsOriginalText[j];
                    j++;
                    if (j >= qmsOriginalText.length) {
                        clearInterval(qmsTypeInterval);
                    }
                }, 85);
            }, 2800);

            // Add smooth scroll reveal animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);
        });

        // Add mouse movement parallax effect
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;

            document.querySelectorAll('.geometric-shape').forEach((shape, index) => {
                const speed = (index + 1) * 0.02;
                const x = (mouseX - 0.5) * speed * 100;
                const y = (mouseY - 0.5) * speed * 100;
                shape.style.transform += ` translate(${x}px, ${y}px)`;
            });
        });
    </script>

@endsection