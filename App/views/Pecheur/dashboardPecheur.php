<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FishPro | Advanced Enterprise OS</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec6d",
                        "primary-dark": "#0ca64d",
                        "bg-main": "#050a08",
                        "surface": "#0d1612",
                        "surface-light": "#16251e",
                        "accent-blue": "#0ea5e9",
                        "accent-purple": "#a855f7"
                    },
                    fontFamily: {
                        "sans": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 8s linear infinite',
                    }
                },
            },
        }
    </script>

    <style>
        .material-symbols-rounded {
            font-family: 'Material Symbols Rounded' !important;
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            /* حجم افتراضي */
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
            /* تحسين النعومة */
            -webkit-font-smoothing: antialiased;
        }

        /* Custom UI Patterns */
        .glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-heavy {
            background: rgba(5, 10, 8, 0.8);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(19, 236, 109, 0.1);
        }

        .glass-hover:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(19, 236, 109, 0.3);
            transform: translateY(-2px);
        }

        .sidebar-item-active {
            background: linear-gradient(90deg, rgba(19, 236, 109, 0.15) 0%, transparent 100%);
            border-left: 3px solid #13ec6d;
            color: #13ec6d;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #13ec6d33;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #13ec6d66;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            animation: slideInRight 0.5s ease forwards;
        }

        /* Level Progress Styling */
        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-value {
            height: 100%;
            background: linear-gradient(90deg, #13ec6d, #0ea5e9);
            width: 75%;
            transition: width 1s ease-in-out;
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(19, 236, 109, 0.05), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }
    </style>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #measureInput {
            font-family: 'JetBrains Mono', monospace;

        }

        #captureModal:not(.hidden) {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="bg-bg-main text-slate-300 font-sans antialiased overflow-hidden selection:bg-primary/30 selection:text-white">

    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-[10%] -right-[10%] size-[600px] bg-primary/5 blur-[150px] rounded-full animate-pulse-slow"></div>
        <div class="absolute -bottom-[10%] -left-[10%] size-[600px] bg-emerald-900/10 blur-[150px] rounded-full animate-pulse-slow" style="animation-delay: 2s"></div>
    </div>

    <div class="relative flex h-screen w-full z-10">

        <aside class="w-72 glass border-r border-white/5 flex flex-col shrink-0">
            <div class="p-8">
                <div class="flex items-center gap-3">
                    <div class="size-11 bg-primary rounded-2xl flex items-center justify-center shadow-[0_0_25px_rgba(19,236,109,0.3)] animate-float">
                        <span class="material-symbols-rounded text-bg-main font-bold text-2xl">waves</span>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-tighter text-white italic uppercase block leading-none">FishPro</span>
                        <span class="text-[9px] text-primary font-bold uppercase tracking-[0.3em] opacity-60">Professional OS</span>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-1.5 custom-scrollbar overflow-y-auto">
                <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-4 mt-2">Intelligence Ops</p>
                <a href="#" onclick="switchPage('dashboard')" id="link-dashboard" class="sidebar-item-active flex items-center gap-4 px-4 py-3.5 rounded-xl transition-all group">
                    <span class="material-symbols-rounded">query_stats</span>
                    <span class="text-sm font-bold tracking-tight">Analytics Console</span>
                </a>
                <a href="#" onclick="switchPage('tournaments')" id="link-tournaments" class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-white/5 transition-all group text-slate-400">
                    <span class="material-symbols-rounded group-hover:text-primary transition-colors">trophy</span>
                    <span class="text-sm font-bold tracking-tight group-hover:text-white transition-colors">Tournois Live</span>
                </a>
                <a href="#" onclick="switchPage('rankings')" id="link-rankings" class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-white/5 transition-all group text-slate-400">
                    <span class="material-symbols-rounded group-hover:text-primary transition-colors">equalizer</span>
                    <span class="text-sm font-bold tracking-tight group-hover:text-white transition-colors">Global Ranking</span>
                </a>

                <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-4 pt-6">Resources</p>
                <a href="#" class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-white/5 transition-all group text-slate-400">
                    <span class="material-symbols-rounded group-hover:text-primary transition-colors">map</span>
                    <span class="text-sm font-bold tracking-tight group-hover:text-white transition-colors">Hotspots Map</span>
                </a>

                <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-4 pt-6">Account Terminal</p>
                <a href="#" onclick="switchPage('profile')" id="link-profile" class="flex items-center gap-4 px-4 py-3.5 rounded-xl hover:bg-white/5 transition-all group text-slate-400">
                    <span class="material-symbols-rounded group-hover:text-primary transition-colors">account_circle</span>
                    <span class="text-sm font-bold tracking-tight group-hover:text-white transition-colors">Mon Profil</span>
                </a>
            </nav>

            <div class="p-6">
                <div class="glass p-4 rounded-2xl border-white/10 bg-primary/5 hover:bg-primary/10 transition-colors cursor-pointer group">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name=Abdellah&background=13ec6d&color=050a08" class="size-10 rounded-xl group-hover:scale-105 transition-transform">
                            <div class="absolute -bottom-1 -right-1 size-3 bg-primary border-2 border-bg-main rounded-full"></div>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-[11px] font-black text-white truncate uppercase italic">Abdellah Lmrini</p>
                            <div class="flex items-center gap-1.5 mt-0.5">
                                <div class="size-1.5 bg-primary rounded-full animate-pulse"></div>
                                <p class="text-[9px] text-primary font-bold tracking-widest uppercase">Rank: Elite #12</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between text-[8px] font-black uppercase mb-1.5 tracking-tighter">
                            <span class="text-slate-400">XP Progress</span>
                            <span class="text-primary">78%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">

            <header class="h-20 glass border-b border-white/5 px-10 flex items-center justify-between shrink-0 z-20">
                <div class="flex items-center gap-8">
                    <div class="relative hidden xl:block">
                        <span class="material-symbols-rounded absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-lg">search</span>
                        <input type="text" placeholder="Command search: (e.g. /captures, /rankings...)" class="bg-white/5 border-white/5 rounded-2xl pl-12 pr-6 py-2.5 text-[11px] w-96 focus:ring-1 focus:ring-primary/40 focus:bg-white/10 transition-all outline-none">
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div class="hidden md:flex flex-col items-end">
                        <span id="digital-clock" class="text-sm font-black text-white italic tabular-nums">14:32:01</span>
                        <span class="text-[9px] font-bold text-primary uppercase tracking-[0.2em]">Network Synced</span>
                    </div>
                    <div class="w-px h-8 bg-white/5"></div>
                    <button onclick="toggleCaptureModal()" class="px-6 py-3 bg-primary text-bg-main rounded-2xl font-black text-[10px] uppercase tracking-[0.15em] hover:shadow-[0_0_40px_rgba(19,236,109,0.4)] transition-all transform active:scale-95 flex items-center gap-3">
                        <span class="material-symbols-rounded text-lg">add_circle</span> New Record
                    </button>
                </div>
            </header>

            <div id="page-content" class="flex-1 overflow-y-auto custom-scrollbar p-10 space-y-10">

                <div id="view-dashboard" class="animate-slide-in space-y-10">
                    <div class="flex justify-between items-end">
                        <div>
                            <h1 class="text-4xl font-black text-white italic uppercase tracking-tighter underline decoration-primary decoration-4 underline-offset-[12px]">Analytics Console</h1>
                            <p class="text-slate-500 text-xs mt-4 font-medium">Real-time biometric data and capture stream.</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="p-3 glass rounded-xl hover:bg-white/10 transition-colors"><span class="material-symbols-rounded text-lg">refresh</span></button>
                            <button class="p-3 glass rounded-xl hover:bg-white/10 transition-colors"><span class="material-symbols-rounded text-lg">download</span></button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                        <div class="glass p-8 rounded-[2rem] glass-hover transition-all relative overflow-hidden group">
                            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                                <span class="material-symbols-rounded text-6xl">database</span>
                            </div>
                            <h3 class="text-4xl font-black tracking-tighter text-white uppercase italic">1,402 <small class="text-sm opacity-50 font-medium">kg</small></h3>
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">Biomasse Totale</p>
                            <div class="mt-4 flex items-center gap-2 text-primary text-[10px] font-black">
                                <span class="material-symbols-rounded text-sm">trending_up</span> +12.5% vs Prev. Month
                            </div>
                        </div>

                        <div class="glass p-8 rounded-[2rem] glass-hover transition-all relative overflow-hidden group">
                            <h3 class="text-4xl font-black tracking-tighter text-white uppercase italic">158</h3>
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">Total Sessions</p>
                            <div class="mt-4 flex items-center gap-2 text-accent-blue text-[10px] font-black">
                                <span class="material-symbols-rounded text-sm">schedule</span> Avg 4.2h / Session
                            </div>
                        </div>

                        <div class="glass p-8 rounded-[2rem] glass-hover transition-all relative overflow-hidden group">
                            <h3 class="text-4xl font-black tracking-tighter text-white uppercase italic">89%</h3>
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">Release Rate</p>
                            <div class="mt-4 flex items-center gap-2 text-primary text-[10px] font-black">
                                <span class="material-symbols-rounded text-sm">eco</span> Sustainable Pro Level
                            </div>
                        </div>

                        <div class="glass p-8 rounded-[2rem] glass-hover transition-all relative overflow-hidden group border-primary/20 bg-primary/5">
                            <h3 class="text-4xl font-black tracking-tighter text-white uppercase italic">#12</h3>
                            <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mt-2">Global Standing</p>
                            <div class="mt-4 flex items-center gap-2 text-white text-[10px] font-black">
                                <span class="material-symbols-rounded text-sm">workspace_premium</span> Top 1% World Wide
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                        <div class="xl:col-span-2 glass rounded-[2.5rem] p-10">
                            <div class="flex justify-between items-center mb-10">
                                <h3 class="text-xl font-black italic uppercase tracking-tight flex items-center gap-3">
                                    <span class="size-3 bg-primary rounded-full animate-pulse"></span> Performance Spectrum
                                </h3>
                                <div class="flex bg-white/5 p-1.5 rounded-2xl border border-white/5">
                                    <button class="px-6 py-2 rounded-xl text-[10px] font-black uppercase bg-primary text-bg-main shadow-lg">Weekly</button>
                                    <button class="px-6 py-2 rounded-xl text-[10px] font-black uppercase text-slate-400 hover:text-white transition-colors">Monthly</button>
                                </div>
                            </div>
                            <div class="h-[400px] w-full">
                                <canvas id="mainActivityChart"></canvas>
                            </div>
                        </div>

                        <div class="glass rounded-[2.5rem] p-10 flex flex-col">
                            <h3 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-8 flex items-center justify-between">
                                Leaderboard Live <span class="bg-red-500 size-2 rounded-full animate-pulse"></span>
                            </h3>
                            <div class="space-y-6 flex-1 overflow-y-auto custom-scrollbar pr-2">
                                <div class="flex items-center justify-between group cursor-pointer p-3 hover:bg-white/5 rounded-2xl transition-all">
                                    <div class="flex items-center gap-4">
                                        <span class="text-2xl font-black italic text-primary/20 group-hover:text-primary transition-colors italic">01</span>
                                        <img src="https://ui-avatars.com/api/?name=Samir+Alami&background=white&color=000" class="size-11 rounded-xl">
                                        <div>
                                            <p class="text-sm font-black text-white uppercase italic">Samir Alami</p>
                                            <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">Master Angler • 2.8k pts</p>
                                        </div>
                                    </div>
                                    <span class="material-symbols-rounded text-primary opacity-0 group-hover:opacity-100 transition-all translate-x-2 group-hover:translate-x-0">arrow_forward_ios</span>
                                </div>
                                <div class="flex items-center justify-between group cursor-pointer p-3 hover:bg-white/5 rounded-2xl transition-all">
                                    <div class="flex items-center gap-4">
                                        <span class="text-2xl font-black italic text-slate-700 italic">02</span>
                                        <img src="https://ui-avatars.com/api/?name=Yassine+B&background=13ec6d&color=000" class="size-11 rounded-xl">
                                        <div>
                                            <p class="text-sm font-black text-white uppercase italic">Yassine Bel</p>
                                            <p class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">Expert • 2.1k pts</p>
                                        </div>
                                    </div>
                                    <span class="material-symbols-rounded text-primary opacity-0 group-hover:opacity-100 transition-all">arrow_forward_ios</span>
                                </div>
                            </div>
                            <button class="w-full mt-8 py-4 glass border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-white/5 transition-colors">View All Rankings</button>
                        </div>
                    </div>
                </div>

                <div id="view-profile" class="hidden animate-slide-in space-y-10 pb-20">
                    <div class="max-w-6xl mx-auto space-y-8">

                        <div class="glass p-12 rounded-[3.5rem] relative overflow-hidden border-primary/10">
                            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>

                            <div class="flex flex-col lg:flex-row items-center gap-12 relative z-10">
                                <div class="relative">
                                    <div class="size-48 rounded-[3rem] p-1 bg-gradient-to-tr from-primary to-accent-blue shadow-2xl">
                                        <img id="avatar-preview" src="https://ui-avatars.com/api/?name=Abdellah&size=256&background=050a08&color=13ec6d" class="size-full rounded-[2.8rem] object-cover">
                                    </div>
                                    <label class="absolute -bottom-3 -right-3 size-14 bg-white text-bg-main rounded-[1.5rem] flex items-center justify-center cursor-pointer hover:scale-110 active:scale-90 transition-all shadow-2xl">
                                        <span class="material-symbols-rounded text-2xl">add_a_photo</span>
                                        <input type="file" class="hidden" onchange="previewImage(this, 'avatar-preview')">
                                    </label>
                                </div>

                                <div class="flex-1 text-center lg:text-left">
                                    <div class="flex flex-wrap justify-center lg:justify-start gap-3 mb-4">
                                        <span class="px-4 py-1.5 glass border-primary/30 rounded-full text-[9px] font-black text-primary uppercase tracking-widest">Pro License #FP-2026</span>
                                        <span class="px-4 py-1.5 glass border-accent-blue/30 rounded-full text-[9px] font-black text-accent-blue uppercase tracking-widest">Verified Account</span>
                                    </div>
                                    <h2 class="text-6xl font-black italic uppercase tracking-tighter text-white">Abdellah Lmrini</h2>
                                    <p class="text-slate-400 font-bold uppercase tracking-[0.4em] text-xs mt-3 flex items-center justify-center lg:justify-start gap-3">
                                        <span class="material-symbols-rounded text-primary text-sm font-bold">location_on</span> Safi / Sidi Kaouki Region • Morocco
                                    </p>

                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-10">
                                        <div class="glass p-4 rounded-2xl text-center border-white/5">
                                            <p class="text-[9px] font-black text-slate-500 uppercase mb-1">Total Points</p>
                                            <p class="text-xl font-black text-white italic">42,850</p>
                                        </div>
                                        <div class="glass p-4 rounded-2xl text-center border-white/5">
                                            <p class="text-[9px] font-black text-slate-500 uppercase mb-1">Win Rate</p>
                                            <p class="text-xl font-black text-primary italic">64%</p>
                                        </div>
                                        <div class="glass p-4 rounded-2xl text-center border-white/5">
                                            <p class="text-[9px] font-black text-slate-500 uppercase mb-1">Badges</p>
                                            <p class="text-xl font-black text-accent-purple italic">18</p>
                                        </div>
                                        <div class="glass p-4 rounded-2xl text-center border-white/5">
                                            <p class="text-[9px] font-black text-slate-500 uppercase mb-1">Region</p>
                                            <p class="text-xl font-black text-white italic">S-6</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                            <div class="lg:col-span-2 space-y-8">
                                <div class="glass p-10 rounded-[3rem] space-y-10 border-white/5">
                                    <div class="flex items-center gap-4">
                                        <div class="size-10 bg-primary/10 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-rounded text-primary">fingerprint</span>
                                        </div>
                                        <h4 class="text-lg font-black uppercase italic text-white tracking-tight">Identity & Parameters</h4>
                                    </div>

                                    <form action="index.php?action=updateProfile" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">

                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase text-slate-500 px-2 tracking-widest italic">Pseudo Global</label>
                                            <input type="text" name="nomUser"
                                                class="w-full bg-white/5 border-white/10 rounded-2xl p-4 text-sm focus:ring-emerald-500 focus:border-emerald-500 transition-all text-white font-bold"
                                                value="<?= htmlspecialchars($Pecheur->getNomUser()); ?>">
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase text-slate-500 px-2 tracking-widest italic">Email Terminal</label>
                                            <input type="email" name="emailUser" readonly
                                                class="w-full bg-white/5 border-white/10 opacity-50 cursor-not-allowed rounded-2xl p-4 text-sm text-white font-bold"
                                                value="<?= htmlspecialchars($Pecheur->getEmailUser()); ?>">
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase text-slate-500 px-2 tracking-widest italic">Spécialité Principale</label>
                                            <div class="relative">
                                                <select name="specialite" class="w-full bg-white/5 border-white/10 rounded-2xl p-4 text-sm focus:ring-emerald-500 focus:border-emerald-500 transition-all text-white font-bold appearance-none">
                                                    <?php
                                                    $specs = ['Surfcasting Elite', 'Spinning Coastal', 'Pêche au Gros (Big Game)', 'Chasse sous-marine'];
                                                    foreach ($specs as $s):
                                                    ?>
                                                        <option value="<?= $s ?>" <?= ($Pecheur->getSpecialite() == $s) ? 'selected' : '' ?>>
                                                            <?= $s ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="material-symbols-rounded absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 pointer-events-none">expand_more</span>
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="text-[10px] font-black uppercase text-slate-500 px-2 tracking-widest italic">Région Opérationnelle</label>
                                            <input type="text" name="region"
                                                class="w-full bg-white/5 border-white/10 rounded-2xl p-4 text-sm focus:ring-emerald-500 focus:border-emerald-500 transition-all text-white font-bold"
                                                value="<?= htmlspecialchars($Pecheur->getRegion()); ?>">
                                        </div>

                                        <div class="md:col-span-2 space-y-2">
                                            <label class="text-[10px] font-black uppercase text-slate-500 px-2 tracking-widest italic">Affiliation Club</label>
                                            <input type="text" name="club"
                                                placeholder="Ex: Club Royal de Pêche"
                                                class="w-full bg-white/5 border-white/10 rounded-2xl p-4 text-sm focus:ring-emerald-500 focus:border-emerald-500 transition-all text-white font-bold"
                                                value="<?= htmlspecialchars($Pecheur->getClub() ?? 'Indépendant'); ?>">
                                        </div>

                                        <div class="md:col-span-2 pt-6">
                                            <button type="submit"
                                                class="px-10 py-5 bg-emerald-500 text-slate-950 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:shadow-[0_0_30px_rgba(16,236,109,0.3)] hover:-translate-y-1 transition-all active:scale-95">
                                                Save Profile DNA
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="space-y-8">
                                <div class="glass p-10 rounded-[3rem] border-white/5 flex flex-col items-center">
                                    <h4 class="text-[10px] font-black uppercase text-primary tracking-[0.3em] mb-10 italic">Expertise Radar</h4>
                                    <div class="w-full aspect-square relative">
                                        <canvas id="radarExpertiseChart"></canvas>
                                    </div>
                                    <div class="mt-10 space-y-4 w-full">
                                        <div class="flex justify-between items-center glass p-4 rounded-2xl border-white/5">
                                            <span class="text-[10px] font-black uppercase text-slate-400">Status</span>
                                            <span class="px-3 py-1 bg-primary/20 text-primary text-[9px] font-black rounded-lg uppercase">Active duty</span>
                                        </div>
                                        <div class="flex justify-between items-center glass p-4 rounded-2xl border-white/5">
                                            <span class="text-[10px] font-black uppercase text-slate-400">Team</span>
                                            <span class="text-[10px] font-black text-white italic">Atlantic Predators</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="view-tournaments" class="hidden animate-slide-in space-y-10">
                    <div class="flex justify-between items-center">
                        <h2 class="text-4xl font-black text-white italic uppercase tracking-tighter">Live Tournaments</h2>
                        <div class="flex gap-4">
                            <span class="flex items-center gap-2 px-4 py-2 glass rounded-xl text-[10px] font-bold text-red-500 uppercase tracking-widest border-red-500/20">
                                <span class="size-2 bg-red-500 rounded-full animate-pulse"></span> 3 Live events
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="glass rounded-[3rem] overflow-hidden group border-white/5 hover:border-primary/30 transition-all">
                            <div class="h-48 bg-gradient-to-r from-emerald-900 to-bg-main relative p-8">
                                <div class="absolute inset-0 shimmer opacity-10"></div>
                                <div class="relative z-10">
                                    <span class="px-3 py-1 bg-primary text-bg-main text-[9px] font-black rounded-lg uppercase">Grand Prix</span>
                                    <h3 class="text-3xl font-black text-white uppercase italic mt-4 italic">Safi Surf Elite 2026</h3>
                                    <p class="text-slate-400 text-xs mt-2 font-bold tracking-widest uppercase">Prize Pool: 15,000 MAD</p>
                                </div>
                            </div>
                            <div class="p-8 space-y-6">
                                <div class="flex justify-between text-xs font-bold text-slate-500 uppercase">
                                    <span>Participants: 42/50</span>
                                    <span>Ends in: 2d 14h</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-value" style="width: 84%"></div>
                                </div>
                                <button class="w-full py-4 bg-white/5 hover:bg-primary hover:text-bg-main transition-all rounded-2xl text-[10px] font-black uppercase tracking-widest">Register Now</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
    <div id="captureModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 sm:p-6 transition-all duration-500">
        <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-xl transition-opacity" onclick="toggleCaptureModal()"></div>

        <div class="relative z-10 w-full max-w-2xl bg-[#0f172a]/90 border border-emerald-500/20 rounded-[3rem] shadow-[0_25px_80px_-15px_rgba(0,0,0,0.6)] overflow-hidden">

            <div class="max-h-[85vh] overflow-y-auto no-scrollbar p-8 md:p-12">

                <div class="flex justify-between items-start mb-12">
                    <div>
                        <h3 class="text-4xl font-black italic uppercase tracking-tighter text-white leading-[0.8]">
                            Capture <span class="text-emerald-500">Sync</span>
                        </h3>
                        <p class="text-emerald-500/50 text-[9px] font-black uppercase tracking-[0.3em] mt-3 flex items-center gap-2">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            Biometric System Active
                        </p>
                    </div>
                    <button onclick="toggleCaptureModal()" class="size-12 rounded-2xl bg-white/5 hover:bg-red-500/10 hover:text-red-500 flex items-center justify-center transition-all group border border-white/5 shadow-inner">
                        <span class="material-symbols-rounded text-2xl transition-transform group-hover:rotate-90">close</span>
                    </button>
                </div>

                <form action="index.php?action=savePrise" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    <div class="space-y-3 group">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1 group-focus-within:text-emerald-500 transition-colors">Target Species</label>
                        <div class="relative">
                            <select name="espece" class="w-full bg-slate-900/50 border border-white/10 rounded-[1.5rem] py-4.5 px-6 text-sm focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500/40 outline-none text-white transition-all appearance-none cursor-pointer">
                                <option value="Dorade Royale">Dorade Royale</option>
                                <option value="Loup de Mer">Loup de Mer (Bar)</option>
                                <option value="Sargue">Sargue</option>
                                <option value="Courbine">Courbine</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Metrics Unit</label>
                        <div class="flex bg-slate-950/50 p-1.5 rounded-[1.5rem] border border-white/5 shadow-inner">
                            <button type="button" id="btnSwitchPoids" onclick="setMeasure('poids')" class="flex-1 py-3 rounded-xl text-[10px] font-black transition-all bg-emerald-500 text-slate-950 shadow-lg shadow-emerald-500/20">WEIGHT</button>
                            <button type="button" id="btnSwitchTaille" onclick="setMeasure('taille')" class="flex-1 py-3 rounded-xl text-[10px] font-black text-slate-500 hover:text-white transition-all">LENGTH</button>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Exact Value</label>
                        <div class="relative">
                            <input type="number" id="measureInput" name="poids" step="0.01" placeholder="0.00 kg" class="w-full bg-slate-900/50 border border-white/10 rounded-[1.5rem] py-4.5 px-6 text-2xl font-black text-white focus:ring-2 focus:ring-emerald-500/40 outline-none transition-all placeholder:text-slate-800">
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Action Protocol</label>
                        <div class="flex gap-4">
                            <label class="flex-1 relative flex items-center justify-center h-[64px] cursor-pointer group">
                                <input type="radio" name="relache" value="1" class="peer hidden" checked>
                                <div class="absolute inset-0 bg-white/5 border border-white/10 rounded-[1.5rem] transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-500/10 peer-checked:shadow-[0_0_20px_rgba(16,185,129,0.1)]"></div>
                                <span class="relative text-[10px] font-black uppercase text-slate-500 peer-checked:text-emerald-500 transition-colors">Relâché</span>
                            </label>
                            <label class="flex-1 relative flex items-center justify-center h-[64px] cursor-pointer group">
                                <input type="radio" name="relache" value="0" class="peer hidden">
                                <div class="absolute inset-0 bg-white/5 border border-white/10 rounded-[1.5rem] transition-all peer-checked:border-red-500/50 peer-checked:bg-red-500/10"></div>
                                <span class="relative text-[10px] font-black uppercase text-slate-500 peer-checked:text-red-400 transition-colors">Gardé</span>
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2 space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">GPS Location / Spot</label>
                        <div class="relative group">
                            <span class="material-symbols-rounded absolute left-5 top-1/2 -translate-y-1/2 text-slate-600 group-focus-within:text-emerald-500 transition-colors">location_on</span>
                            <input type="text" name="spot" placeholder="Ex: Casablanca, Jetée Nord" class="w-full bg-slate-900/50 border border-white/10 rounded-[1.5rem] py-4.5 pl-14 pr-6 text-sm text-white focus:ring-2 focus:ring-emerald-500/40 outline-none transition-all">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <input type="file" name="photo" id="fishPhoto" class="hidden" accept="image/*" onchange="updateFileName(this)">
                        <label for="fishPhoto" class="flex flex-col items-center justify-center border-2 border-dashed border-white/5 rounded-[2.5rem] p-10 hover:border-emerald-500/40 hover:bg-emerald-500/5 transition-all cursor-pointer min-h-[180px] group bg-white/[0.02]">
                            <div class="size-16 rounded-full bg-white/5 flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-emerald-500/20 transition-all duration-500 shadow-xl">
                                <span class="material-symbols-rounded text-3xl text-slate-500 group-hover:text-emerald-500">camera_enhance</span>
                            </div>
                            <p id="uploadText" class="text-[10px] font-black uppercase text-slate-500 tracking-[0.2em] group-hover:text-emerald-500/80 transition-colors">Visual Proof Required (HD)</p>
                        </label>
                    </div>

                    <button type="submit" class="md:col-span-2 bg-emerald-500 text-slate-950 py-6 mt-4 rounded-[2rem] font-black text-xs uppercase tracking-[0.5em] hover:shadow-[0_20px_40px_rgba(16,185,129,0.3)] hover:-translate-y-1 transition-all active:scale-[0.98] active:translate-y-0">
                        Encrypt & Transmit Data
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleCaptureModal() {
            const modal = document.getElementById('captureModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function setMeasure(type) {
            const input = document.getElementById('measureInput');
            const btnP = document.getElementById('btnSwitchPoids');
            const btnT = document.getElementById('btnSwitchTaille');

            if (type === 'poids') {
                input.name = "poids";
                input.placeholder = "0.00 kg";
                input.step = "0.01";
                btnP.className = "flex-1 py-2 rounded-xl text-[10px] font-black bg-emerald-500 text-slate-900 transition-all";
                btnT.className = "flex-1 py-2 rounded-xl text-[10px] font-black text-slate-500 hover:text-white transition-all";
            } else {
                input.name = "taille";
                input.placeholder = "00.0 cm";
                input.step = "0.1";
                btnT.className = "flex-1 py-2 rounded-xl text-[10px] font-black bg-emerald-500 text-slate-900 transition-all";
                btnP.className = "flex-1 py-2 rounded-xl text-[10px] font-black text-slate-500 hover:text-white transition-all";
            }
        }

        function updateFileName(input) {
            const text = document.getElementById('uploadText');
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                text.innerHTML = `<span class="text-emerald-500 font-bold">Fichier prêt :</span> ${fileName}`;

                input.nextElementSibling.classList.add('border-emerald-500/50');
            }
        }

        function switchPage(pageId) {
            const views = ['dashboard', 'profile', 'tournaments', 'rankings'];
            const links = ['dashboard', 'tournaments', 'rankings', 'profile'];


            views.forEach(v => {
                const el = document.getElementById(`view-${v}`);
                if (el) el.classList.add('hidden');
            });

            links.forEach(l => {
                const el = document.getElementById(`link-${l}`);
                if (el) el.classList.remove('sidebar-item-active', 'text-primary');
                if (el) el.classList.add('text-slate-400');
            });

            const activeView = document.getElementById(`view-${pageId}`);
            const activeLink = document.getElementById(`link-${pageId}`);

            if (activeView) activeView.classList.remove('hidden');
            if (activeLink) {
                activeLink.classList.add('sidebar-item-active', 'text-primary');
                activeLink.classList.remove('text-slate-400');
            }

            if (pageId === 'profile') initRadarChart();
            if (pageId === 'dashboard') initMainChart();

            document.getElementById('page-content').scrollTop = 0;
        }

        function toggleCaptureModal() {
            const modal = document.getElementById('captureModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function setMeasure(type) {
            const input = document.getElementById('measureInput');
            const btnP = document.getElementById('btnSwitchPoids');
            const btnT = document.getElementById('btnSwitchTaille');

            if (type === 'poids') {
                input.name = "poids";
                input.placeholder = "0.00 kg";
                input.step = "0.01";
                btnP.className = "flex-1 py-2 rounded-xl text-[10px] font-black bg-emerald-500 text-slate-900";
                btnT.className = "flex-1 py-2 rounded-xl text-[10px] font-black text-slate-500";
            } else {
                input.name = "taille";
                input.placeholder = "00.0 cm";
                input.step = "0.1";
                btnT.className = "flex-1 py-2 rounded-xl text-[10px] font-black bg-emerald-500 text-slate-900";
                btnP.className = "flex-1 py-2 rounded-xl text-[10px] font-black text-slate-500";
            }
        }

        function updateFileName(input) {
            const text = document.getElementById('uploadText');
            if (input.files && input.files[0]) {
                text.innerText = "Fichier sélectionné : " + input.files[0].name;
                text.classList.add('text-emerald-500');
            }
        }

        function updateClock() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('en-GB', {
                hour12: false
            });
            document.getElementById('digital-clock').textContent = timeStr;
        }
        setInterval(updateClock, 1000);

        function toggleCaptureModal() {
            const modal = document.getElementById('captureModal');
            modal.classList.toggle('hidden');
        }

        function previewImage(input, targetId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(targetId);
                    img.src = e.target.result;
                    img.classList.remove('opacity-0');
                    img.classList.add('opacity-100');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function switchMeasure(measure) {
            const btnPoids = document.getElementById('btnPoids');
            const btnTaille = document.getElementById('btnTaille');
            if (measure === 'poids') {
                btnPoids.classList.add('bg-primary', 'text-bg-main');
                btnTaille.classList.remove('bg-primary', 'text-bg-main');
                btnTaille.classList.add('text-slate-400');
            } else {
                btnTaille.classList.add('bg-primary', 'text-bg-main');
                btnPoids.classList.remove('bg-primary', 'text-bg-main');
                btnPoids.classList.add('text-slate-400');
            }
        }


        let mainChart;

        function initMainChart() {
            const ctx = document.getElementById('mainActivityChart').getContext('2d');
            if (mainChart) mainChart.destroy();

            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(19, 236, 109, 0.25)');
            gradient.addColorStop(1, 'rgba(19, 236, 109, 0)');

            mainChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                    datasets: [{
                        label: 'Prises',
                        data: [45, 82, 60, 95, 110, 145, 120],
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: '#13ec6d',
                        borderWidth: 4,
                        tension: 0.45,
                        pointRadius: 6,
                        pointBackgroundColor: '#13ec6d',
                        pointBorderColor: '#050a08',
                        pointBorderWidth: 3,
                        pointHoverRadius: 9
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: 'rgba(255,255,255,0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    weight: 'bold',
                                    size: 10
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    weight: 'bold',
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        }

        function updateFileName(input) {
            const label = input.nextElementSibling;
            const text = document.getElementById('uploadText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {

                    label.innerHTML = `
                <div class="relative w-full h-full min-h-[180px] rounded-[2rem] overflow-hidden shadow-2xl">
                    <img src="${e.target.result}" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px] hover:backdrop-blur-0 transition-all flex items-center justify-center group">
                        <div class="bg-white/10 border border-white/20 px-4 py-2 rounded-full backdrop-blur-md opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-[10px] font-black text-white uppercase tracking-widest">Changer l'image</span>
                        </div>
                    </div>
                </div>
            `;

                    label.classList.remove('p-10');
                    label.classList.add('p-0');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        let radarChart;

        function initRadarChart() {
            const ctx = document.getElementById('radarExpertiseChart').getContext('2d');
            if (radarChart) radarChart.destroy();

            radarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['STRENGTH', 'SPEED', 'PRECISION', 'SPOTTING', 'ENDURANCE', 'TECHNIQUE'],
                    datasets: [{
                        data: [85, 72, 94, 68, 88, 91],
                        backgroundColor: 'rgba(19, 236, 109, 0.1)',
                        borderColor: '#13ec6d',
                        borderWidth: 2,
                        pointBackgroundColor: '#13ec6d',
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    scales: {
                        r: {
                            angleLines: {
                                color: 'rgba(255,255,255,0.08)'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.08)'
                            },
                            pointLabels: {
                                color: '#64748b',
                                font: {
                                    size: 9,
                                    weight: '900'
                                }
                            },
                            ticks: {
                                display: false,
                                max: 100
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        // Global Initialization
        window.onload = () => {
            initMainChart();
            updateClock();
        };
    </script>


</body>

</html>