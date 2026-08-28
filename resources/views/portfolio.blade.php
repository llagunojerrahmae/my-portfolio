<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio | Jerrah Mae Llaguno</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-bg': '#121212',
                        'dark-surface': '#1B1B1B',
                        'accent-pink': '#D88A92',
                        'text-gray': '#A0A0A0',
                    },
                    fontFamily: {
                        sans: ['Lato', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700;800&family=Lato:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome (icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Lato', sans-serif; overflow-x: hidden; }
        [x-cloak] { display: none !important; }

        /* ---- Floating gradient blobs ---- */
        .blob {
            position: fixed;
            border-radius: 9999px;
            filter: blur(90px);
            opacity: 0.25;
            z-index: 0;
            pointer-events: none;
            animation: float 12s ease-in-out infinite;
        }
        .blob-1 { top: -100px; left: -100px; width: 400px; height: 400px; background: #D88A92; animation-delay: 0s; }
        .blob-2 { bottom: -120px; right: -100px; width: 450px; height: 450px; background: #D88A92; animation-delay: 3s; }
        .blob-3 { top: 40%; left: 50%; width: 300px; height: 300px; background: #a45560; animation-delay: 6s; opacity: 0.15; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.1); }
            66% { transform: translate(-20px, 30px) scale(0.95); }
        }

        /* ---- Profile image glow pulse ---- */
        .profile-ring {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px 0px rgba(216, 138, 146, 0.4); }
            50% { box-shadow: 0 0 45px 10px rgba(216, 138, 146, 0.6); }
        }

        /* ---- Nav underline ---- */
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: -6px;
            width: 0%;
            height: 2px;
            background: #D88A92;
            transition: width 0.3s ease;
        }
        .nav-link.active::after,
        .nav-link:hover::after { width: 100%; }

        /* ---- Card hover ---- */
        .glow-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .glow-card:hover {
            transform: translateY(-6px);
            border-color: rgba(216, 138, 146, 0.6);
            box-shadow: 0 10px 30px -10px rgba(216, 138, 146, 0.35);
        }

        /* ---- Button shine ---- */
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0; left: -75%;
            width: 50%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
            transform: skewX(-25deg);
            transition: left 0.6s ease;
        }
        .btn-shine:hover::before { left: 125%; }

        /* ---- Icon bounce on card hover ---- */
        .glow-card:hover .card-icon { transform: scale(1.15) rotate(-4deg); }
        .card-icon { transition: transform 0.3s ease; }

        /* ---- Gradient text ---- */
        .gradient-text {
            background: linear-gradient(90deg, #D88A92, #f0b8be, #D88A92);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shine 4s linear infinite;
        }
        @keyframes shine {
            to { background-position: 200% center; }
        }

        /* ---- Scrollbar ---- */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #121212; }
        ::-webkit-scrollbar-thumb { background: #D88A92; border-radius: 10px; }
    </style>
</head>

<body class="bg-dark-bg text-white antialiased relative" x-data="{ tab: 'home', menuOpen: false }">

    <!-- Decorative floating blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- ============ NAVIGATION ============ -->
    <header class="sticky top-0 z-50 bg-dark-bg/80 backdrop-blur-lg border-b border-white/5">
        <nav class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between relative z-10">
            <!-- Logo -->
            <button @click="tab = 'home'" class="font-serif text-xl font-bold tracking-wide hover:scale-105 transition-transform">
                My<span class="gradient-text">Portfolio</span>
            </button>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-10 text-sm font-medium tracking-wider">
                <li>
                    <button @click="tab = 'home'"
                            :class="tab === 'home' ? 'text-accent-pink active' : 'text-text-gray hover:text-accent-pink'"
                            class="nav-link transition">HOME</button>
                </li>
                <li>
                    <button @click="tab = 'about'"
                            :class="tab === 'about' ? 'text-accent-pink active' : 'text-text-gray hover:text-accent-pink'"
                            class="nav-link transition">ABOUT</button>
                </li>
                <li>
                    <button @click="tab = 'skills'"
                            :class="tab === 'skills' ? 'text-accent-pink active' : 'text-text-gray hover:text-accent-pink'"
                            class="nav-link transition">SKILLS</button>
                </li>
                <li>
                    <button @click="tab = 'experience'"
                            :class="tab === 'experience' ? 'text-accent-pink active' : 'text-text-gray hover:text-accent-pink'"
                            class="nav-link transition">EXPERIENCE</button>
                </li>
                <li>
                    <button @click="tab = 'contact'"
                            :class="tab === 'contact' ? 'text-accent-pink active' : 'text-text-gray hover:text-accent-pink'"
                            class="nav-link transition">CONTACT</button>
                </li>
            </ul>

            <!-- Mobile Toggle -->
            <button @click="menuOpen = !menuOpen" class="md:hidden text-2xl text-white focus:outline-none">
                <i class="fa-solid" :class="menuOpen ? 'fa-xmark' : 'fa-bars'"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div x-show="menuOpen" x-cloak x-transition @click.away="menuOpen = false"
             class="md:hidden bg-dark-surface border-t border-white/5 relative z-10">
            <ul class="flex flex-col gap-4 px-6 py-6 text-sm font-medium tracking-wider">
                <li>
                    <button @click="tab = 'home'; menuOpen = false"
                            :class="tab === 'home' ? 'text-accent-pink' : 'text-text-gray'"
                            class="transition">HOME</button>
                </li>
                <li>
                    <button @click="tab = 'about'; menuOpen = false"
                            :class="tab === 'about' ? 'text-accent-pink' : 'text-text-gray'"
                            class="transition">ABOUT</button>
                </li>
                <li>
                    <button @click="tab = 'skills'; menuOpen = false"
                            :class="tab === 'skills' ? 'text-accent-pink' : 'text-text-gray'"
                            class="transition">SKILLS</button>
                </li>
                <li>
                    <button @click="tab = 'experience'; menuOpen = false"
                            :class="tab === 'experience' ? 'text-accent-pink' : 'text-text-gray'"
                            class="transition">EXPERIENCE</button>
                </li>
                <li>
                    <button @click="tab = 'contact'; menuOpen = false"
                            :class="tab === 'contact' ? 'text-accent-pink' : 'text-text-gray'"
                            class="transition">CONTACT</button>
                </li>
            </ul>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-16 min-h-[70vh] relative z-10">

        <!-- ============ HOME ============ -->
        <section x-show="tab === 'home'" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="hidden">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- Left: Profile Image -->
                <div class="flex justify-center md:justify-start order-1 md:order-1">
                    <div class="relative w-64 h-64 md:w-80 md:h-80">
                        <div class="absolute inset-0 rounded-full bg-accent-pink/20 blur-2xl"></div>
                        <div class="profile-ring relative w-full h-full rounded-full overflow-hidden border-4 border-accent-pink/40 hover:scale-105 transition-transform duration-500">
                            <img src="{{ asset('image/jerrah.png') }}"
                                 alt="Jerrah Mae Llaguno"
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Decorative dot -->
                        <div class="absolute -bottom-2 -right-2 bg-accent-pink text-dark-bg w-14 h-14 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                            <i class="fa-solid fa-code text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Right: Intro Text -->
                <div class="text-center md:text-left order-2 md:order-2">
                    <p class="text-accent-pink font-semibold tracking-widest text-sm mb-3">
                        <i class="fa-solid fa-hand-sparkles mr-1"></i> WELCOME TO MY PORTFOLIO
                    </p>
                    <h1 class="font-serif text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                        Hi, I'm <span class="gradient-text">Jerrah Mae Llaguno!</span>
                    </h1>
                    <h2 class="font-serif text-text-gray text-lg font-medium tracking-wide mb-6">
                        3RD YEAR IT STUDENT | DEVELOPER
                    </h2>
                    <p class="text-text-gray leading-relaxed mb-8 max-w-lg mx-auto md:mx-0">
                        I'm a passionate Information Technology student who loves building clean, functional,
                        and user-friendly applications. I enjoy learning new technologies and turning ideas
                        into real, working projects.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <button @click="tab = 'skills'"
                                class="btn-shine px-8 py-3 rounded-full bg-accent-pink text-dark-bg font-semibold text-center hover:opacity-90 hover:-translate-y-1 transition-all shadow-lg shadow-accent-pink/20">
                            View My Skill
                        </button>
                        <button @click="tab = 'contact'"
                                class="btn-shine px-8 py-3 rounded-full border-2 border-accent-pink text-accent-pink font-semibold text-center hover:bg-accent-pink hover:text-dark-bg hover:-translate-y-1 transition-all">
                            Contact Me
                        </button>
                    </div>
                </div>
            </div>
                        <!-- Tech Stack Preview -->
            <div class="mt-20">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-px flex-1 bg-white/10"></div>
                    <span class="text-text-gray text-xs font-semibold tracking-[0.2em]">TECH STACK</span>
                    <div class="h-px flex-1 bg-white/10"></div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6">
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-cplusplus-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">C++</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-javascript-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">JavaScript</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-php-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">PHP</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon fa-solid fa-database text-accent-pink text-3xl"></i>
                        <span class="text-xs text-text-gray">SQL</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-html5-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">HTML5</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-css3-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">CSS3</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon devicon-laravel-plain colored text-3xl"></i>
                        <span class="text-xs text-text-gray">Laravel</span>
                    </div>
                    <div class="glow-card group bg-dark-surface rounded-xl px-5 py-4 border border-white/5 flex flex-col items-center gap-2 w-24">
                        <i class="card-icon fa-brands fa-github text-2xl"></i>
                        <span class="text-xs text-text-gray">Git/GitHub</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ ABOUT ============ -->
        <section x-show="tab === 'about'" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="hidden">
            <h2 class="font-serif text-2xl md:text-3xl font-bold mb-2">ABOUT ME</h2>
            <div class="w-16 h-1 bg-accent-pink rounded-full mb-8"></div>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="md:col-span-2 space-y-5 text-text-gray leading-relaxed">
                    <p>
                        I am Jerrah Mae Llaguno, a 3rd year Information Technology student who is passionate
                        about building software that actually helps people. My interest in tech started from
                        simply being curious about how apps and websites work behind the scenes, and that
                        curiosity eventually grew into a genuine love for coding and problem-solving.
                    </p>
                    <p>
                        Throughout my studies, I've had the chance to work on both web and mobile projects,
                        which allowed me to explore different tools, frameworks, and workflows. I enjoy the
                        entire process of development — from planning and designing a solution, to writing
                        the code, testing it, and refining it until it works the way it should.
                    </p>
                    <p>
                        Outside of academics, I like exploring new technologies on my own, working on personal
                        projects, and collaborating with classmates on group work where I can practice not
                        just my technical skills but also communication and teamwork. I believe that being a
                        good developer isn't only about knowing how to code — it's also about being adaptable,
                        patient, and willing to keep learning.
                    </p>
                    <p>
                        My goal is to grow into a well-rounded developer who can confidently handle real-world
                        projects, while continuing to build good habits like time management, attention to
                        detail, and clear communication with a team.
                    </p>
                </div>

                <div class="glow-card bg-dark-surface rounded-2xl p-6 border border-white/5 h-fit">
                    <h3 class="font-serif text-lg font-bold mb-4">Quick Facts</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex justify-between border-b border-white/5 pb-3">
                            <span class="text-text-gray">Status</span>
                            <span class="font-medium">Student</span>
                        </li>
                        <li class="flex justify-between border-b border-white/5 pb-3">
                            <span class="text-text-gray">Year Level</span>
                            <span class="font-medium">3rd Year</span>
                        </li>
                        <li class="flex justify-between border-b border-white/5 pb-3">
                            <span class="text-text-gray">Course</span>
                            <span class="font-medium">BSIT</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-text-gray">Availability</span>
                            <span class="text-accent-pink font-medium">Open to work</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

                <!-- ============ SKILLS ============ -->
        <section x-show="tab === 'skills'" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="hidden">
            <h2 class="font-serif text-2xl md:text-3xl font-bold mb-2">SKILLS</h2>
            <div class="w-16 h-1 bg-accent-pink rounded-full mb-10"></div>

            <p class="text-text-gray leading-relaxed max-w-2xl mb-10">
                Aside from what I know technically, here are the personal skills and habits I bring
                with me in every project and in working with a team.
            </p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-comments text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Communication</h3>
                    <p class="text-text-gray text-sm">Comfortable explaining ideas clearly, whether to teammates or non-technical people.</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-people-group text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Teamwork</h3>
                    <p class="text-text-gray text-sm">Used to collaborating on group projects, splitting tasks, and supporting teammates.</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-puzzle-piece text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Problem-Solving</h3>
                    <p class="text-text-gray text-sm">Enjoy breaking down complex problems into smaller, manageable steps.</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-arrows-rotate text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Adaptability</h3>
                    <p class="text-text-gray text-sm">Open to learning new tools and adjusting quickly to new environments or requirements.</p>
               </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-clock text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Time Management</h3>
                    <p class="text-text-gray text-sm">Able to balance academics, projects, and personal learning without missing deadlines.</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-magnifying-glass text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Attention to Detail</h3>
                    <p class="text-text-gray text-sm">Careful when reviewing my own work, catching mistakes before they become bigger issues.</p>
                </div>
            </div>
</section>
        <!-- ============ EXPERIENCE ============ -->
<section x-show="tab === 'experience'" x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="hidden">
    <h2 class="font-serif text-2xl md:text-3xl font-bold mb-2">EXPERIENCE</h2>
    <div class="w-16 h-1 bg-accent-pink rounded-full mb-10"></div>

    <div class="relative border-l-2 border-accent-pink/30 pl-8 space-y-10 ml-2">

        <!-- Academic Projects -->
        <div class="relative glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
            <span class="absolute -left-[41px] top-6 w-4 h-4 rounded-full bg-accent-pink shadow-lg shadow-accent-pink/40"></span>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                <h3 class="font-serif font-semibold text-white">Academic Projects</h3>
                <span class="text-accent-pink text-sm">2024 - Present</span>
            </div>
            <p class="text-text-gray text-sm leading-relaxed mb-4">
                Built several school projects, collaborating with classmates and applying
                what I learned in class to real, working outputs — from planning and coding
                to testing and presenting the final system.
            </p>
            
            <!-- List of Projects -->
            <div class="pt-3 border-t border-white/5">
                <span class="text-xs uppercase tracking-wider text-text-gray font-semibold block mb-2">Featured Projects:</span>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-full text-xs bg-accent-pink/10 text-accent-pink border border-accent-pink/20 font-medium">
                        JJMICS VogueVista Magazine
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs bg-accent-pink/10 text-accent-pink border border-accent-pink/20 font-medium">
                        CCDI Enrollment System
                    </span>
                </div>
            </div>
        </div>

        <!-- Group Projects & Case Studies -->
        <div class="relative glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
            <span class="absolute -left-[41px] top-6 w-4 h-4 rounded-full bg-accent-pink shadow-lg shadow-accent-pink/40"></span>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                <h3 class="font-serif font-semibold text-white">Group Projects & Case Studies</h3>
                <span class="text-accent-pink text-sm">2024 - Present</span>
            </div>
            <p class="text-text-gray text-sm leading-relaxed">
                Worked with teammates on system analysis and design case studies, practicing
                documentation, requirements gathering, and basic project planning alongside
                the technical side of development.
            </p>
        </div>

        <!-- Self-Directed Learning -->
        <div class="relative glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
            <span class="absolute -left-[41px] top-6 w-4 h-4 rounded-full bg-accent-pink shadow-lg shadow-accent-pink/40"></span>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                <h3 class="font-serif font-semibold text-white">Self-Directed Learning</h3>
                <span class="text-accent-pink text-sm">2024 - Present</span>
            </div>
            <p class="text-text-gray text-sm leading-relaxed">
                Continuously exploring new tools, frameworks, and concepts outside of class
                through personal practice, tutorials, and small side projects to strengthen
                my skills.
            </p>
        </div>
    </div>
</section>

        <!-- ============ CONTACT ============ -->
        <section x-show="tab === 'contact'" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="hidden"
            class="text-center">
            <h2 class="font-serif text-2xl md:text-3xl font-bold mb-2">GET IN TOUCH</h2>
            <div class="w-16 h-1 bg-accent-pink rounded-full mx-auto mb-8"></div>
            <p class="text-text-gray max-w-xl mx-auto mb-10">
                Interested in working together or just want to say hi? Feel free to reach out —
                I'd love to hear from you.
            </p>

            <!-- Contact Info Cards -->
            <div class="grid sm:grid-cols-3 gap-6 max-w-3xl mx-auto mb-10">
                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-location-dot text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Address</h3>
                    <p class="text-text-gray text-sm">Pilar, Sorsogon, Philippines</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-phone text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Phone</h3>
                    <p class="text-text-gray text-sm">+63 900 1245 689</p>
                </div>

                <div class="glow-card bg-dark-surface rounded-xl p-6 border border-white/5">
                    <i class="card-icon fa-solid fa-envelope text-accent-pink text-2xl mb-3"></i>
                    <h3 class="font-serif font-semibold mb-1">Email</h3>
                    <p class="text-text-gray text-sm">jerrahmae@gmail.com</p>
                </div>
            </div>

            <a href="mailto:jerrahmae@gmail.com"
               class="btn-shine inline-block px-8 py-3 rounded-full bg-accent-pink text-dark-bg font-semibold hover:opacity-90 hover:-translate-y-1 transition-all shadow-lg shadow-accent-pink/20">
                Email Me
            </a>
        </section>

    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="border-t border-white/5 relative z-10">
        <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col items-center gap-6">
            <div class="flex gap-6 text-2xl text-text-gray">
                <a href="#" class="hover:text-accent-pink hover:-translate-y-1 transition-all" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="#" class="hover:text-accent-pink hover:-translate-y-1 transition-all" aria-label="GitHub">
                    <i class="fa-brands fa-github"></i>
                </a>
                <a href="mailto:jerrahmae@example.com" class="hover:text-accent-pink hover:-translate-y-1 transition-all" aria-label="Email">
                    <i class="fa-solid fa-envelope"></i>
                </a>
            </div>
            <p class="text-text-gray text-sm text-center">
                &copy; {{ date('Y') }} Jerrah Mae Llaguno. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>