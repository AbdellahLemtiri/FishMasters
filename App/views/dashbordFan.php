<!DOCTYPE html>
<html class="dark" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>Fan Dashboard</title>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Noto+Sans:wght@100..900&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            // Switch from GREEN #13ec6d to BLUE #137fec
                            "primary": "#137fec", 
                            "background-light": "#f6f9fc",
                            "background-dark": "#0f172a", // Darker blue-slate background
                        },
                        fontFamily: {
                            "display": ["Lexend", "sans-serif"]
                        },
                        borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                    },
                },
            }
        </script>
        <style>
            body {
                font-family: 'Lexend', sans-serif;
            }
            .live-pulse {
                box-shadow: 0 0 0 0 rgba(19, 127, 236, 0.7);
                animation: pulse 2s infinite;
            }
            @keyframes pulse {
                0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(19, 127, 236, 0.7); }
                70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(19, 127, 236, 0); }
                100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(19, 127, 236, 0); }
            }
        </style>
    </head>
    <body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white min-h-screen">
        <div class="layout-container flex h-full grow flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-10 py-3 bg-white dark:bg-background-dark sticky top-0 z-50">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-4 text-primary">
                        <div class="bg-primary p-1.5 rounded-lg text-white">
                            <span class="material-symbols-outlined block">tsunami</span>
                        </div>
                        <h2 class="text-slate-900 dark:text-white text-xl font-bold leading-tight tracking-tight">FishMasters</h2>
                    </div>
                    <label class="flex flex-col min-w-40 h-10 max-w-64">
                        <div class="flex w-full flex-1 items-stretch rounded-lg h-full overflow-hidden">
                            <div class="text-slate-400 dark:text-slate-500 flex border-none bg-slate-100 dark:bg-slate-800 items-center justify-center pl-4">
                                <span class="material-symbols-outlined text-[20px]">search</span>
                            </div>
                            <input class="form-input flex w-full min-w-0 flex-1 border-none bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-0 h-full placeholder:text-slate-400 dark:placeholder:text-slate-500 px-4 pl-2 text-sm" placeholder="Search anglers, events..." value=""/>
                        </div>
                    </label>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-6">
                        <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="dashbordFan">Dashboard</a>
                        <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="tournaments">Tournaments</a>
                        <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="leaderboards">Leaderboards</a>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex items-center justify-center rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-white hover:bg-primary/20 transition-colors">
                            <span class="material-symbols-outlined">notifications</span>
                        </button>
                        <!-- <a href="settings" class="flex items-center justify-center rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-white hover:bg-primary/20 transition-colors">
                            <span class="material-symbols-outlined">settings</span>
                        </a> -->
                        <a href="deconnexion" class="flex items-center justify-center rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-white hover:bg-primary/20 transition-colors">
                            <span class="material-symbols-outlined">logout</span>
                        </a>
                    </div>
                    <!-- <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary" style='background-image: url("https://avatar.iran.liara.run/public/boy?username=Alex");'></div> -->
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="max-w-[1280px] mx-auto px-6 py-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                        <!-- <div class="flex gap-6 items-center">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-xl size-24 border-4 border-primary/20 shadow-xl" style='background-image: url("https://avatar.iran.liara.run/public/boy?username=AlexLarge");'></div>
                            <div>
                                <h1 class="text-slate-900 dark:text-white text-3xl font-black tracking-tight">Alex's Dashboard</h1>
                                <p class="text-slate-500 dark:text-slate-400 text-base mt-1">Level 14 Pro Enthusiast • Member since June 2023</p>
                            </div>
                        </div> -->
                        <div class="flex gap-6 items-center">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-xl size-24 border-4 border-primary/20 shadow-xl" style='background-image: url("https://avatar.iran.liara.run/public/boy?username=AlexLarge");'></div>
                            <div>
                                <h1 class="text-slate-900 dark:text-white text-3xl font-black tracking-tight">Alex's Dashboard</h1>
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-bold bg-primary/10 text-primary border border-primary/20">
                                        <span class="material-symbols-outlined text-[14px]">trophy</span>
                                        Pro Enthusiast
                                    </span>
                                    <span class="text-slate-400 dark:text-slate-500">•</span>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Member since June 2023</p>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="flex gap-3">
                            <a href="tournaments" class="flex items-center justify-center rounded-lg h-11 px-6 bg-primary text-white font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                                Explore Tournaments
                            </a>
                            <a href="settings" class="flex items-center justify-center rounded-lg h-11 px-6 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white font-bold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                                Edit Profile
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
                        <div class="flex flex-col gap-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50 p-5 shadow-sm">
                            <p class="text-primary text-3xl font-black leading-tight">24</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium uppercase tracking-wider">Followed Anglers</p>
                        </div>
                        <div class="flex flex-col gap-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50 p-5 shadow-sm">
                            <p class="text-primary text-3xl font-black leading-tight">12</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium uppercase tracking-wider">Badges Earned</p>
                        </div>
                        <div class="flex flex-col gap-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50 p-5 shadow-sm">
                            <p class="text-primary text-3xl font-black leading-tight">158</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium uppercase tracking-wider">Events Watched</p>
                        </div>
                        <div class="flex flex-col gap-2 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50 p-5 shadow-sm">
                            <p class="text-primary text-3xl font-black leading-tight">4.8k</p>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-medium uppercase tracking-wider">Community Points</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-8">
                            <section>
                                <div class="flex items-center justify-between mb-5">
                                    <h2 class="text-slate-900 dark:text-white text-2xl font-bold tracking-tight">Followed Fishermen Live</h2>
                                    <button class="text-primary text-sm font-bold hover:underline">View All</button>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-4 relative overflow-hidden group">
                                        <div class="absolute top-4 right-4 flex items-center gap-2">
                                            <span class="flex h-2 w-2 rounded-full bg-primary live-pulse"></span>
                                            <span class="text-primary text-[10px] font-bold uppercase tracking-widest">Live Now</span>
                                        </div>
                                        <div class="flex gap-4 items-center mb-4">
                                            <div class="size-14 rounded-full bg-cover bg-center border-2 border-primary" style="background-image: url('https://avatar.iran.liara.run/public/boy?username=Jacob');"></div>
                                            <div>
                                                <h3 class="font-bold text-slate-900 dark:text-white">Jacob Wheeler</h3>
                                                <p class="text-xs text-slate-500 dark:text-slate-400">Current Ranking: #2</p>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 mb-4">
                                            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-2 text-center">
                                                <p class="text-[10px] text-slate-400 uppercase font-bold">Total Weight</p>
                                                <p class="text-lg font-black text-primary">18.4 lbs</p>
                                            </div>
                                            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-2 text-center">
                                                <p class="text-[10px] text-slate-400 uppercase font-bold">Catch Count</p>
                                                <p class="text-lg font-black text-primary">5</p>
                                            </div>
                                        </div>
                                        <button class="w-full bg-primary/10 hover:bg-primary/20 text-primary font-bold py-2 rounded-lg text-sm transition-colors">Watch Stream</button>
                                    </div>
                                    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-4 relative overflow-hidden group">
                                        <div class="absolute top-4 right-4">
                                            <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Offline</span>
                                        </div>
                                        <div class="flex gap-4 items-center mb-4">
                                            <div class="size-14 rounded-full bg-cover bg-center grayscale" style="background-image: url('https://avatar.iran.liara.run/public/boy?username=Ott');"></div>
                                            <div>
                                                <h3 class="font-bold text-slate-900 dark:text-white">Ott DeFoe</h3>
                                                <p class="text-xs text-slate-500 dark:text-slate-400">Last Ranking: #12</p>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 mb-4 opacity-50">
                                            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-2 text-center">
                                                <p class="text-[10px] text-slate-400 uppercase font-bold">Avg Weight</p>
                                                <p class="text-lg font-black text-slate-900 dark:text-white">14.2 lbs</p>
                                            </div>
                                            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-2 text-center">
                                                <p class="text-[10px] text-slate-400 uppercase font-bold">Career Wins</p>
                                                <p class="text-lg font-black text-slate-900 dark:text-white">8</p>
                                            </div>
                                        </div>
                                        <button class="w-full bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-bold py-2 rounded-lg text-sm">View Profile</button>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="space-y-8">
                            <section class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6">
                                <h2 class="text-slate-900 dark:text-white text-xl font-bold mb-6 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">military_tech</span>
                                    Badge Collection
                                </h2>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="flex flex-col items-center gap-2 group cursor-help">
                                        <div class="size-16 rounded-full bg-primary/20 flex items-center justify-center border-2 border-primary group-hover:scale-110 transition-transform">
                                            <span class="material-symbols-outlined text-primary text-3xl">visibility</span>
                                        </div>
                                        <p class="text-[10px] font-bold text-center text-slate-600 dark:text-slate-400 uppercase">Early Watcher</p>
                                    </div>
                                    <div class="flex flex-col items-center gap-2 group cursor-help">
                                        <div class="size-16 rounded-full bg-primary/20 flex items-center justify-center border-2 border-primary group-hover:scale-110 transition-transform">
                                            <span class="material-symbols-outlined text-primary text-3xl">trending_up</span>
                                        </div>
                                        <p class="text-[10px] font-bold text-center text-slate-600 dark:text-slate-400 uppercase">Top Picker</p>
                                    </div>
                                    <div class="flex flex-col items-center gap-2 group cursor-help">
                                        <div class="size-16 rounded-full bg-primary/20 flex items-center justify-center border-2 border-primary group-hover:scale-110 transition-transform">
                                            <span class="material-symbols-outlined text-primary text-3xl">set_meal</span>
                                        </div>
                                        <p class="text-[10px] font-bold text-center text-slate-600 dark:text-slate-400 uppercase">Master Angler</p>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-slate-500 dark:text-slate-400">Progress to next level</span>
                                        <span class="text-primary font-bold">85%</span>
                                    </div>
                                    <div class="w-full h-2 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-primary w-[85%] rounded-full"></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="border-t border-slate-200 dark:border-slate-800 py-8 bg-white dark:bg-background-dark">
                <div class="max-w-[1280px] mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2 text-slate-400 dark:text-slate-500">
                        <div class="bg-primary p-1.5 rounded-lg text-white">
                            <span class="material-symbols-outlined block">tsunami</span>
                        </div>
                        <p class="text-sm">© 2026 FishMasters Interactive. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>