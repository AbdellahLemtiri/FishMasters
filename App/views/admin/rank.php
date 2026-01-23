<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Rankings and Results Admin View</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;family=Noto+Sans:wght@100..900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#11d432",
                        "background-light": "#f6f8f6",
                        "background-dark": "#102213",
                        "gold": "#FFD700",
                        "silver": "#C0C0C0",
                        "bronze": "#CD7F32",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(40, 57, 43, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(157, 185, 161, 0.1)
        }

        .row-gold {
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.05) 0%, rgba(16, 34, 19, 0) 100%);
            border-left: 4px solid #FFD700
        }

        .row-silver {
            background: linear-gradient(90deg, rgba(192, 192, 192, 0.05) 0%, rgba(16, 34, 19, 0) 100%);
            border-left: 4px solid #C0C0C0
        }

        .row-bronze {
            background: linear-gradient(90deg, rgba(205, 127, 50, 0.05) 0%, rgba(16, 34, 19, 0) 100%);
            border-left: 4px solid #CD7F32
        }

        /* Custom Select SVG for dark theme consistent with TextField */
        .custom-select {
            appearance: none;
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuBL8lAniA-K53ACvI4QaBwpgE7DmmfjKodDyJIgM9lfzZ0Za-Cciy5e-7ptx_keOSH_fNqRxON1XGDQtEXN7glynGjhyVVV_fOZhQuZvs8YgJtPMTRIBpuLqhKAOIhYuQMolA_qx7oQVVL3Kl1cO7BedVRYBEe2421CYTZJI07tmiv2yTJy9FnTzVXDnKjDIPmqDH3jCFBrfN8epwhY_lT2D1PRtVCRO-oTyzX50eMPfHBVbPMO-MNWO_etQOaSHakiDoiKF3ldgnI);
            background-repeat: no-repeat;
            background-position: right 1rem center
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-white min-h-screen">
    <div class="relative flex h-full w-full flex-col overflow-x-hidden">
        <!-- Top Navigation -->
        <header
            class="flex items-center justify-between border-b border-solid border-[#28392b] px-6 lg:px-40 py-4 glass-panel sticky top-0 z-50">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center size-10 bg-primary rounded-lg text-background-dark">
                        <span class="material-symbols-outlined font-bold">set_meal</span>
                    </div>
                    <h2 class="text-white text-lg font-extrabold leading-tight tracking-tight">ProFish Admin</h2>
                </div>
                <div class="hidden md:flex items-center gap-4">
                    <label class="flex flex-col min-w-[280px]">
                        <div class="flex w-full items-stretch rounded-lg h-10">
                            <select
                                class="custom-select form-input flex w-full flex-1 rounded-lg text-white focus:outline-0 focus:ring-1 focus:ring-primary border-none bg-[#28392b] h-full px-4 text-sm font-medium">
                                <option value="2024-summer-bass">2024 Summer Bass Classic</option>
                                <option value="2024-great-lakes">Great Lakes Invitational</option>
                                <option value="2024-everglades">Everglades Extreme Open</option>
                            </select>
                        </div>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex gap-2">
                    <button
                        class="flex min-w-[140px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold transition-all hover:bg-primary/90">
                        <span class="truncate">Generate Ranking</span>
                    </button>
                    <button
                        class="flex min-w-[120px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 border border-primary text-primary bg-transparent text-sm font-bold transition-all hover:bg-primary/10">
                        <span class="truncate">Export Results</span>
                    </button>
                </div>
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-[#28392b]"
                    data-alt="Admin user profile picture"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBgJ3JywH-xP06KREv7tgFEOPVP3G9GHGrU4I4gAhu084CLn8gKDIqxMDmldvRaLTAv-JhYEhi0upa76he2ejRpknLA9-_Bfe9pObB7eMOhsPeC89-E_tsMHaugdrNrQ8AfFRrATvyU0W_Neb9bmVsnra2daomPvGoZez_ivrRuAT8NnYz68RlY3VByjwhqp9-oXbA9ubZpfLMdnU1ztmClzz4N29sox9NnNRDMDPnHZw59jfUOchGP8odSf9aXx60e0yYezkr3W0I");'>
                </div>
            </div>
        </header>
        <main class="flex-1 px-4 lg:px-40 py-8 max-w-[1440px] mx-auto w-full">
            <!-- Page Heading -->
            <div class="flex flex-wrap justify-between items-end gap-4 mb-8">
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2 text-primary">
                        <span class="material-symbols-outlined text-sm">event_available</span>
                        <span class="text-sm font-bold tracking-widest uppercase">Live Tournament</span>
                    </div>
                    <h1 class="text-white text-4xl font-black leading-tight tracking-tight">Leaderboard Results</h1>
                    <p class="text-[#9db9a1] text-base font-normal">Official verified standings for the Summer Bass
                        Classic</p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#28392b] text-white text-sm font-bold hover:bg-[#3b543f] transition-colors">
                        <span class="material-symbols-outlined text-sm">refresh</span>
                        <span>Refresh Data</span>
                    </button>
                </div>
            </div>
            <!-- Stats Overview -->
            <div class="flex flex-wrap gap-4 mb-8">
                <div
                    class="flex min-w-[180px] flex-1 flex-col gap-2 rounded-xl p-6 glass-panel border-l-4 border-l-primary">
                    <p class="text-[#9db9a1] text-xs font-bold uppercase tracking-widest">Total Participants</p>
                    <div class="flex items-center gap-3">
                        <p class="text-white text-3xl font-black leading-tight">128</p>
                        <span class="text-primary text-xs font-bold bg-primary/10 px-2 py-1 rounded">+12%</span>
                    </div>
                </div>
                <div class="flex min-w-[180px] flex-1 flex-col gap-2 rounded-xl p-6 glass-panel">
                    <p class="text-[#9db9a1] text-xs font-bold uppercase tracking-widest">Avg. Points</p>
                    <p class="text-white text-3xl font-black leading-tight">1,420</p>
                </div>
                <div class="flex min-w-[180px] flex-1 flex-col gap-2 rounded-xl p-6 glass-panel">
                    <p class="text-[#9db9a1] text-xs font-bold uppercase tracking-widest">Active Catches</p>
                    <p class="text-white text-3xl font-black leading-tight">842</p>
                </div>
                <div
                    class="flex min-w-[180px] flex-1 flex-col gap-2 rounded-xl p-6 glass-panel border-r-4 border-r-primary/30">
                    <p class="text-[#9db9a1] text-xs font-bold uppercase tracking-widest">Top Catch Weight</p>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">scale</span>
                        <p class="text-white text-3xl font-black leading-tight">12.3 <span
                                class="text-lg font-normal text-[#9db9a1]">lbs</span></p>
                    </div>
                </div>
            </div>
            <!-- Leaderboard Table -->
            <div class="rounded-xl glass-panel overflow-hidden border border-[#3b543f]">
                <div class="overflow-x-auto @container">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#1c271d]/80 border-b border-[#3b543f]">
                                <th class="px-6 py-5 text-[#9db9a1] text-xs font-bold uppercase tracking-widest w-24">
                                    Pos</th>
                                <th class="px-6 py-5 text-[#9db9a1] text-xs font-bold uppercase tracking-widest">
                                    Fisherman</th>
                                <th
                                    class="px-6 py-5 text-[#9db9a1] text-xs font-bold uppercase tracking-widest text-center">
                                    Total Points</th>
                                <th class="px-6 py-5 text-[#9db9a1] text-xs font-bold uppercase tracking-widest">Biggest
                                    Catch</th>
                                <th
                                    class="px-6 py-5 text-[#9db9a1] text-xs font-bold uppercase tracking-widest text-right">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#3b543f]/50">
                            <!-- 1st Place -->
                            <tr class="row-gold transition-colors hover:bg-white/5 group">
                                <td class="px-6 py-6">
                                    <div
                                        class="flex items-center justify-center size-10 rounded-full bg-gold text-background-dark font-black text-lg shadow-[0_0_15px_rgba(255,215,0,0.3)]">
                                        1</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-full border-2 border-gold p-0.5">
                                            <div class="size-full rounded-full bg-cover bg-center"
                                                data-alt="Champion fisherman profile"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB3ZsCJwklfEWls5JJs9oZQ4TOvm8rl-n2qJygDfcWtoua38pB43JnPigXfwd4pCQi4TelEm2Zviu6UJJf9xwWfbDizb18YMDSYNjMbKuuhxQVEAc19gYA5ptkEKX2E1C471FtrAUUW0i8vivmXk9ntbIVef0ZBrfnuyjsV_3awWJ8PQdDDYioFyUrp6jei4qU_-DC8NClWTrpbBtRzvcN3Cu29-Gtw70ulC1oVKzSmToJ0Y6RK-k9Gmfkd8cXJcFRnUcbAUaoMQ40");'>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Marcus Thorne</p>
                                            <p class="text-gold/80 text-xs font-bold flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[14px]">military_tech</span>
                                                CHAMPION
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <p class="text-white text-2xl font-black">2,840</p>
                                    <p class="text-primary text-[10px] font-bold tracking-tighter">PTS</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-semibold">Largemouth Bass</span>
                                        <span class="text-[#9db9a1] text-sm">8.4 lbs</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <button class="text-[#9db9a1] hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- 2nd Place -->
                            <tr class="row-silver transition-colors hover:bg-white/5 group">
                                <td class="px-6 py-6">
                                    <div
                                        class="flex items-center justify-center size-10 rounded-full bg-silver text-background-dark font-black text-lg">
                                        2</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-full border-2 border-silver p-0.5">
                                            <div class="size-full rounded-full bg-cover bg-center"
                                                data-alt="Runner up fisherman profile"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBjSR4L8k1AFjevFQ8Z-Cr8Tmb46j6sWsXxXks6WqtSl1EsxlbvZZw8_QxC-EKCEdu8k2LoUD50OW_6UpdLI0WMuJym567PRibdAMDhoxYQbMbNotOSgm1BbY__ahIZjVoLzwFpS7hvoLbRaNAK4hHyn-Dy984cQboW8e6qStYRpUB_L3IC50iad2NmulqBnY_HWfDksMagpd5LYrLVU4_Z7NvthoxKNxKpM19DpT-0QGDyEjCn1lgFq4SHiONqpg3hto2QselshSU");'>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Elena Rodriguez</p>
                                            <p class="text-silver text-xs font-bold uppercase tracking-wider">Silver
                                                Medalist</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <p class="text-white text-2xl font-black">2,610</p>
                                    <p class="text-primary text-[10px] font-bold tracking-tighter">PTS</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-semibold">Smallmouth Bass</span>
                                        <span class="text-[#9db9a1] text-sm">6.2 lbs</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <button class="text-[#9db9a1] hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- 3rd Place -->
                            <tr class="row-bronze transition-colors hover:bg-white/5 group">
                                <td class="px-6 py-6">
                                    <div
                                        class="flex items-center justify-center size-10 rounded-full bg-bronze text-background-dark font-black text-lg">
                                        3</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-full border-2 border-bronze p-0.5">
                                            <div class="size-full rounded-full bg-cover bg-center"
                                                data-alt="Third place fisherman profile"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAph5BiSqSbsk7FIOo5JRr0j_0mJQ4AkBjY__RsxOhaBuTsCzjXCHpVKk-fz3bjDQPsv_9uRiMor9IfiJHwD66BsZBfEyGxc-pFr401mIX1VV-Bd4Vv04HNpnGCfQdewELGs1ao2meApBSTj4ow7VJbkB15McIIUEWNiWXvP88U5Ya0hCSNSJxtaAUPniLinn_CzpqtLNPVzuoRsOvVQ5XnaQ5m9GO0GV8wTPKhKNi_6RwCVZCwdqvYqldH8UnEebOKkESxD4T5-_I");'>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">David Chen</p>
                                            <p class="text-bronze text-xs font-bold uppercase tracking-wider">Bronze
                                                Medalist</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <p class="text-white text-2xl font-black">2,450</p>
                                    <p class="text-primary text-[10px] font-bold tracking-tighter">PTS</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-semibold">Walleye</span>
                                        <span class="text-[#9db9a1] text-sm">7.1 lbs</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <button class="text-[#9db9a1] hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Standard Row -->
                            <tr class="transition-colors hover:bg-white/5 group">
                                <td class="px-6 py-6">
                                    <div
                                        class="flex items-center justify-center size-10 rounded-full bg-[#28392b] text-[#9db9a1] font-bold text-lg">
                                        4</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-full border border-[#3b543f] p-0.5">
                                            <div class="size-full rounded-full bg-cover bg-center"
                                                data-alt="Fisherman Sarah Jenkins avatar"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBGU5v9zY3aPoHxLy1qFpP3jfBPEcUIyyZG5vNrFgKf0ilvzSuIsk4yV71C83_CnxUFhySGwPMlER_xSNiTM5Fiwp1b2dOykmjCZZmagV5adB6xguO3pniIQgt9c435PES1PTVgh3tHAAYA-BWEuCiCNOiKcqmusRXwgxJh1GW8STjJPGutgFbTYitJlSXidCRZkuNjObtVdWrYTkQQNotTBKvlchcdOjTprYqOsxI5TjW9KMqp_3fzZeBlwGsvp1ZWJQu1KCTfmLU");'>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Sarah Jenkins</p>
                                            <p class="text-[#9db9a1] text-xs font-medium uppercase tracking-wider">
                                                Professional</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <p class="text-white text-2xl font-black">2,100</p>
                                    <p class="text-primary text-[10px] font-bold tracking-tighter">PTS</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-semibold">Northern Pike</span>
                                        <span class="text-[#9db9a1] text-sm">12.3 lbs</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <button class="text-[#9db9a1] hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Standard Row -->
                            <tr class="transition-colors hover:bg-white/5 group">
                                <td class="px-6 py-6">
                                    <div
                                        class="flex items-center justify-center size-10 rounded-full bg-[#28392b] text-[#9db9a1] font-bold text-lg">
                                        5</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-full border border-[#3b543f] p-0.5">
                                            <div class="size-full rounded-full bg-cover bg-center"
                                                data-alt="Fisherman Kevin O Brian avatar"
                                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBfYr8Mw8v2AgaBW8lomuGknbMLFxkvpfHlGVDYTYabGFRinQ2Pcirlbwrt3LX6wzqIrXaCsW-ENL1CP8I3SoLs8g25AHlCR6iqUEyyPgdwkDEEihzZNjIzrV7z1InBkT1jAjwKdRILnO1r_iS3F-UKSQc5DqIBtRWrnkvd501gk3b6FlB6zUWAIuY6tESH9JOSoBwrl6Df3-DwBJFhQ_FFB7ikuk2-YrnnZ1Aa1b9U3bbBaSi5pScJsuUR0LwI3b9CmbZDkSM_Q7E");'>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Kevin O'Brian</p>
                                            <p class="text-[#9db9a1] text-xs font-medium uppercase tracking-wider">Club
                                                Member</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <p class="text-white text-2xl font-black">1,950</p>
                                    <p class="text-primary text-[10px] font-bold tracking-tighter">PTS</p>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-semibold">Bass</span>
                                        <span class="text-[#9db9a1] text-sm">5.8 lbs</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <button class="text-[#9db9a1] hover:text-white transition-colors">
                                        <span class="material-symbols-outlined">more_vert</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination/Footer -->
                <div class="px-6 py-4 flex items-center justify-between bg-[#1c271d]/50 border-t border-[#3b543f]">
                    <p class="text-sm text-[#9db9a1]">Showing 1-5 of 128 competitors</p>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 rounded border border-[#3b543f] text-white disabled:opacity-30"
                            disabled="">
                            <span class="material-symbols-outlined text-base">chevron_left</span>
                        </button>
                        <button class="px-3 py-1 rounded border border-[#3b543f] text-white hover:bg-[#28392b]">
                            <span class="material-symbols-outlined text-base">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Footer Meta Info -->
            <div class="mt-8 flex justify-between items-center text-[#9db9a1] text-xs">
                <div class="flex gap-4">
                    <span>Tournament ID: #SBC-2024-001</span>
                    <span>Last Update: 2 minutes ago</span>
                </div>
                <div class="flex gap-4">
                    <a class="hover:text-primary underline underline-offset-4" href="#">Tournament Rules</a>
                    <a class="hover:text-primary underline underline-offset-4" href="#">Dispute Log</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>