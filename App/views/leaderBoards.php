<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                        "display": ["Lexend"]
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .rank-gold { color: #FFD700; }
        .rank-silver { color: #C0C0C0; }
        .rank-bronze { color: #CD7F32; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen">
<!-- Top Navigation Bar -->
<header class="border-b border-slate-200 dark:border-white/10 px-4 md:px-10 py-3 bg-white dark:bg-background-dark sticky top-0 z-50">
<div class="max-w-[1200px] mx-auto flex items-center justify-between">
<div class="flex items-center gap-8">
<div class="flex items-center gap-3 text-primary">
<span class="material-symbols-outlined text-3xl">set_meal</span>
<h2 class="text-slate-900 dark:text-white text-lg font-bold leading-tight tracking-tight">ProFishing League</h2>
</div>
<nav class="hidden md:flex items-center gap-6">
<a class="text-primary text-sm font-semibold border-b-2 border-primary pb-1" href="#">Leaderboards</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-primary text-sm font-medium transition-colors" href="#">Tournaments</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-primary text-sm font-medium transition-colors" href="#">Teams</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-primary text-sm font-medium transition-colors" href="#">Schedules</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
<input class="bg-slate-100 dark:bg-white/5 border-none rounded-lg pl-10 pr-4 py-2 text-sm w-64 focus:ring-2 focus:ring-primary outline-none" placeholder="Search fisherman or team..."/>
</div>
<button class="p-2 rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-primary/20 transition-colors">
<span class="material-symbols-outlined">notifications</span>
</button>
<div class="h-10 w-10 rounded-full bg-cover bg-center border-2 border-primary/30" data-alt="User profile avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAEId9NAaJ9Ox6AwOxwyUvmlY5xfIEcjKU3S-2qauAUS-1b66cBzdnGh-TSNJzer5snklUij3ghFiObpoXrCg-UE75DbFaRklXblBSac4U4X41zF_pHfwmMc3UstD0ovs-7WDxbUQ_cgmr0wqztzC4hy9WMnMJPU64bUmA4n221DHt4mz6zuBCWHB7WgpySRvchFOjwjVheWdZ7jvbMqbANqNi1xWe01UHIgQjAc8hBcMYlW3bpg69FNGoyJye3_s0BbK6w_b0v0b4l");'></div>
</div>
</div>
</header>
<main class="max-w-[1200px] mx-auto px-4 py-8">
<!-- Page Heading -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
<div class="space-y-2">
<div class="flex items-center gap-2 text-primary font-bold text-sm tracking-widest uppercase">
<span class="material-symbols-outlined text-sm">emoji_events</span>
                    Competitive Circuit
                </div>
<h1 class="text-4xl md:text-5xl font-black tracking-tight text-slate-900 dark:text-white">Season Leaderboards</h1>
<p class="text-slate-600 dark:text-slate-400 text-lg">2023/24 Global Standings &amp; Pro Rankings</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-5 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg font-bold text-sm hover:bg-slate-50 dark:hover:bg-white/10 transition-all">
<span class="material-symbols-outlined text-lg">download</span>
                    Export CSV
                </button>
<button class="flex items-center gap-2 px-5 py-2.5 bg-primary text-background-dark rounded-lg font-bold text-sm hover:opacity-90 transition-all shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-lg">share</span>
                    Share Stats
                </button>
</div>
</div>
<!-- Featured Top 3 Podium Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
<!-- Rank 2 -->
<div class="order-2 md:order-1 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl p-6 flex flex-col items-center relative overflow-hidden">
<div class="absolute top-4 left-4 font-black text-4xl opacity-10 italic">#2</div>
<div class="size-20 rounded-full bg-cover bg-center border-4 border-silver mb-4" data-alt="Profile photo of second place fisherman" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB1BTPVRIRJJTGehdGlfHFo8xJyobeDQ9GwSsFK5nlnkerg_g-QJgC3WR8M2JgbCJ_Jl0Y5v7tVskjIFaeBbJ1K83ZO8oKtdcASwsmVGA6aCj4JbNPdGUXOv0nP_YLS0v7pYndD2kjjyiYGNBXMNCWd6SYzQk4yz8alBowUdfTg00g8zNLSvSeLZAue_4MYgvHMTKDSxBAaHApBeJxf9f_3WnaJTD-EW37KDeGJBQnwWF3dGPZL58Scrl6FJdJn2OxUz-hyVNxzoOYd');"></div>
<h3 class="text-xl font-bold">Mike Troutman</h3>
<p class="text-slate-500 text-sm mb-4">Silver Fin Team</p>
<div class="text-2xl font-black text-primary">2,840 pts</div>
</div>
<!-- Rank 1 -->
<div class="order-1 md:order-2 bg-gradient-to-b from-primary/20 to-transparent dark:from-primary/10 border-2 border-primary rounded-xl p-8 flex flex-col items-center relative overflow-hidden scale-105 shadow-2xl shadow-primary/10">
<div class="absolute top-4 left-4 font-black text-5xl text-primary opacity-20 italic">#1</div>
<span class="material-symbols-outlined text-yellow-500 absolute top-4 right-4 text-3xl">workspace_premium</span>
<div class="size-24 rounded-full bg-cover bg-center border-4 border-primary mb-4" data-alt="Profile photo of first place fisherman" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDVgfUbQMrmIZ6uyitzvwC_lGBWebccAIRnyUXB7XYrnIDtvgzuonPhA0S_ykxf1Ubs8Y_RK09gSWNlJnBoxLM77bdgti0McFYzTSAvAH53mBBjFL-YBILdLF0PwMGWLOrZUHz0AIItFDvqHBw8WK-nhSoEEB8BxZW-GzNwyUx6t2y8dd0hHV4hrQs-yv5iAKvGhmoVt7VcBn6K_YMs8ImxeEL87OZmfmdcT_ftSq0fhOTYKM7674YIoO6Jw25AKMlu7D5AHgK_yysb');"></div>
<h3 class="text-2xl font-black">John Reeler</h3>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-4">Apex Anglers</p>
<div class="text-4xl font-black text-primary">3,120 pts</div>
</div>
<!-- Rank 3 -->
<div class="order-3 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl p-6 flex flex-col items-center relative overflow-hidden">
<div class="absolute top-4 left-4 font-black text-4xl opacity-10 italic">#3</div>
<div class="size-20 rounded-full bg-cover bg-center border-4 border-bronze mb-4" data-alt="Profile photo of third place fisherman" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuASdOpPizwGbGV66blu4BDcfVYnHLcyF9ds7Gh7GcJueaPdX5TM5vJP73I8W3nb_Fy4dIVa6vTMMK1-QNebI-nMghCtUVA85aD_2TDq4aaywfCnsMKuln-_ngD77P-rYbcmnOOKAk5Mloldh7KgEFq9q7QLlZvQ0KW9Ix4fPJ12wV_ox6cTjyES-J4ywVkoeLa24WHizWWip_fL2Pbu_NYMtxKEFkT8h8kZwG2mhv1ariyY64xinAgcWRCt2ucIRMR4TTXz8QVUjkjt');"></div>
<h3 class="text-xl font-bold">Sam Bass</h3>
<p class="text-slate-500 text-sm mb-4">River Kings</p>
<div class="text-2xl font-black text-primary">2,615 pts</div>
</div>
</div>
<!-- Filters and Tabs Area -->
<div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl overflow-hidden mb-6">
<!-- Tabs -->
<div class="flex border-b border-slate-200 dark:border-white/10">
<button class="flex-1 py-4 text-sm font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 transition-all">
                    Junior Division
                </button>
<button class="flex-1 py-4 text-sm font-bold border-b-2 border-primary text-primary bg-primary/5">
                    Senior Division
                </button>
</div>
<!-- Category Chips -->
<div class="p-4 flex flex-wrap items-center gap-3">
<div class="text-xs font-bold uppercase tracking-wider text-slate-400 mr-2">Filter Species:</div>
<button class="px-4 py-1.5 rounded-full bg-primary text-background-dark text-sm font-bold transition-all">All Species</button>
<button class="px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-primary/20 transition-all">Bass</button>
<button class="px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-primary/20 transition-all">Trout</button>
<button class="px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-primary/20 transition-all">Walleye</button>
<button class="px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-primary/20 transition-all">Pike</button>
<button class="px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-primary/20 transition-all">Musky</button>
</div>
</div>
<!-- Leaderboard Table -->
<div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl overflow-hidden shadow-xl">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 dark:bg-white/5 text-slate-500 dark:text-slate-400 text-xs font-bold uppercase tracking-widest border-b border-slate-200 dark:border-white/10">
<th class="px-6 py-4">Rank</th>
<th class="px-6 py-4">Fisherman</th>
<th class="px-6 py-4">Team</th>
<th class="px-6 py-4 text-center">Events</th>
<th class="px-6 py-4 text-center">Trend</th>
<th class="px-6 py-4 text-right">Points</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200 dark:divide-white/5">
<!-- Row 1 -->
<tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="font-black text-xl text-yellow-500">1</span>
<span class="material-symbols-outlined text-yellow-500 text-sm">stars</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-cover bg-center" data-alt="John Reeler profile" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAxljUGZr7EXQJD2MAtSt0z5FInSUMRvMmE9eObJ0wyRKHMxj0RdMs4_Ynf-75EXUP53ur6AehUAhHdwTvRa_pnA2GjhrnwU8kFd021MX-BG59lJv_WDl_xq5Bm9vnuljp9HRVMBdl_r5Mee8d529bUttFDCI_Q1P8M0xx4pZr7v4TWr8CRwBClCA5HGBOhG1XzKyfXAK6PI6Svzt81cSsXdB095cdIhy36FKbJSt5_lhWOzwOaBfTBh0qYzl9J-nOODAOZSe1c7pZY');"></div>
<div>
<p class="font-bold text-slate-900 dark:text-white">John Reeler</p>
<p class="text-xs text-slate-500">Pro Circuit</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="h-6 w-6 rounded-md bg-primary/20 flex items-center justify-center text-[10px] font-bold">AA</div>
<span class="text-sm font-medium">Apex Anglers</span>
</div>
</td>
<td class="px-6 py-4 text-center font-medium">12</td>
<td class="px-6 py-4 text-center">
<span class="material-symbols-outlined text-primary">trending_up</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lg font-black text-primary">3,120</span>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="font-black text-xl text-slate-400">2</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-cover bg-center" data-alt="Mike Troutman profile" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDIvboh72b4O7rLIMTKGX06j0aHj4daSBbUnfGG4iVPuthoMoP0d9BWwind-upUofPNU_o2Aie2IWBah5FVN_QiojyBohgVDAoT1lTt4GAJpJTUZjMzVcLGG8X5upk9tktGIGYlj-IDBXFn7vgmSL86NegK7DfXKMV3cJGkcUUsGX8chQVa_epYtDzqAc4isZc0KfSPCM9GEEDPhJiKgAEriGWqbH6RUpjoYXwQI46WZAM47UtK7M656J3IsSofhR-E826pUQ4m2v7K');"></div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Mike Troutman</p>
<p class="text-xs text-slate-500">Pro Circuit</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="h-6 w-6 rounded-md bg-slate-500/20 flex items-center justify-center text-[10px] font-bold">SF</div>
<span class="text-sm font-medium">Silver Fin Team</span>
</div>
</td>
<td class="px-6 py-4 text-center font-medium">11</td>
<td class="px-6 py-4 text-center">
<span class="material-symbols-outlined text-slate-400">horizontal_rule</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lg font-black text-primary">2,840</span>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="font-black text-xl text-orange-600">3</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-cover bg-center" data-alt="Sam Bass profile" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCIIoem6eQDq9GQ5XJSeAW4ihE3B3DqbAMQfmOPpzn57eCv9Qee45SmC9TEigLu3CUD3cIgsK92qeHAw2MYDX1VAtBO8kMv_203RCk66XoyKQwqehVlbgirc4rv7Bw8R8aUdl6N5bRqQK-densfNTFqomezdvmncq97EwHYmFAp1QHb95XuPMslVINVPpRQp5c011TSkaHUsLFgVpufyUYPp6kiJKBITr5mtbx9_LyMuCCWnUs5curVqEn_DYq-zd_hDMUjakNr8Unq');"></div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Sam Bass</p>
<p class="text-xs text-slate-500">Pro Circuit</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="h-6 w-6 rounded-md bg-blue-500/20 flex items-center justify-center text-[10px] font-bold">RK</div>
<span class="text-sm font-medium">River Kings</span>
</div>
</td>
<td class="px-6 py-4 text-center font-medium">14</td>
<td class="px-6 py-4 text-center">
<span class="material-symbols-outlined text-red-500">trending_down</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lg font-black text-primary">2,615</span>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="font-black text-xl text-slate-500">4</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-cover bg-center" data-alt="Cody Carp profile" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCa6KDBkWX_Bk0jLWZM3jtfqM4RCJSk_P6GYdXjGCE6xI-g0zCu_zfbcHrTDZwIEvldFJer3C8PpM0hWfekRH2iBYMHWc6BWo_otVGs6EPFW7t8tlIzueEm3C26XfKpEJhBDqkWDo903nUZkCU_4VXJd1hk_viDyUY-0N8dvtvru6mn6juURhgVR4mN50LJHum2Plpsg7M8dHBMrtJZ2C-MytOSSn5HlD6VMYl-bfe09fvITfLpXDgtPvm0WczYSWyyVT2Quc-KRh7i');"></div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Cody Carp</p>
<p class="text-xs text-slate-500">Pro Circuit</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="h-6 w-6 rounded-md bg-green-500/20 flex items-center justify-center text-[10px] font-bold">LB</div>
<span class="text-sm font-medium">Lake Bounders</span>
</div>
</td>
<td class="px-6 py-4 text-center font-medium">10</td>
<td class="px-6 py-4 text-center">
<span class="material-symbols-outlined text-primary">trending_up</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lg font-black text-primary">2,490</span>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-primary/5 transition-colors group cursor-pointer">
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<span class="font-black text-xl text-slate-500">5</span>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-cover bg-center" data-alt="Emma Angler profile" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDIa5pGSPjSkpgo9aouKCgkwE2Pw-3T078g5viU4J_rW7ByiwvwccfntzFUs5qNTcINfXmTGrdNQHLUMTWFfFtf2pvsyeZCm6niYsNxGR8Lvw0N9EzwLouORUxqDorrHZioLe7aCFXwNZNmchH6FrPcJ9yFGoRtc8C2LT-gHHasPaoqA1GYsrtiLDG25-whA_08twlg0RoRd2ITVdBdYU6Lwvvdw3JwAU33TIDBkn7Cx3DB0hGh7hQIRZHDKyZWekFwQlc6WLzH4A1o');"></div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Emma Angler</p>
<p class="text-xs text-slate-500">Pro Circuit</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<div class="h-6 w-6 rounded-md bg-purple-500/20 flex items-center justify-center text-[10px] font-bold">DE</div>
<span class="text-sm font-medium">Deep Echo</span>
</div>
</td>
<td class="px-6 py-4 text-center font-medium">12</td>
<td class="px-6 py-4 text-center">
<span class="material-symbols-outlined text-slate-400">horizontal_rule</span>
</td>
<td class="px-6 py-4 text-right">
<span class="text-lg font-black text-primary">2,385</span>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination/Footer -->
<div class="p-4 bg-slate-50 dark:bg-white/5 flex flex-col sm:flex-row items-center justify-between gap-4">
<p class="text-sm text-slate-500">Showing 1 to 5 of 124 competitors</p>
<div class="flex items-center gap-2">
<button class="px-3 py-1 rounded border border-slate-200 dark:border-white/10 text-sm font-bold opacity-50 cursor-not-allowed">Previous</button>
<button class="px-3 py-1 rounded bg-primary text-background-dark text-sm font-bold">1</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-white/10 text-sm font-bold hover:bg-slate-100 dark:hover:bg-white/10">2</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-white/10 text-sm font-bold hover:bg-slate-100 dark:hover:bg-white/10">3</button>
<span class="text-slate-400">...</span>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-white/10 text-sm font-bold hover:bg-slate-100 dark:hover:bg-white/10">25</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-white/10 text-sm font-bold hover:bg-slate-100 dark:hover:bg-white/10">Next</button>
</div>
</div>
</div>
<!-- Secondary CTA Grid (ImageGrid Component style) -->
<div class="mt-12">
<h2 class="text-xl font-bold mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">visibility</span>
                Featured Highlights
            </h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="group relative aspect-video rounded-xl overflow-hidden cursor-pointer">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Action shot of tournament winner" style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBY3dZTk2YXHCjVYyhye95tgbdflbokfyjM5sJKWWhOGTWBIXa9MelIx1iUCWhDm2rhvUSXTJUWLwHY0EvUHR2Ktr1sBQYFEE9aVsTvSGHo-Um40roA2rcfQBC72DktT3nrxVG-Lnh00jrsbbPpNX9Qe2I9A-2He0XcuD1Z4GdWwuWpPVZMGAyMVEbeuuV7zDbqhPFcwk7EkFUELYFASXx1izwVs6rZXL2OMJNlI02B-rKh0hIrZgrj_9NKYopw0FZ_X1dDBvbbVs2A");'></div>
<div class="absolute bottom-4 left-4 right-4">
<p class="text-xs font-bold uppercase text-primary mb-1">Winning Catch</p>
<h4 class="text-white font-bold leading-tight">Relive John Reeler's 8lb Bass pull from Lake Okeechobee</h4>
</div>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden cursor-pointer">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Technical fishing equipment showcase" style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDrZx6MnM-3gkExYfb_Ro0tO_fwn0sF3GSY7kvOsSdt4jh2G3TnpFaqN9EvlrgH2FMs61CZDiX80hWd7t4ONstrSnwkZSBWwnYq9n-DFI-SeUz8I_rr5TOi0i8ySU0AiaDKj0uNK0gEuPSHLWJcCI9jwRs7xZNHD-9KtTAzndFFD1hH2zqlrBnXVKO9Dxj1XqQ9Z3vwP80mesA8xHfgTIEPoM99kgVLEg7thxstguspES8Hfh2_W-iHGGzmf-_Kf-9RoUSFPbzu8toI");'></div>
<div class="absolute bottom-4 left-4 right-4">
<p class="text-xs font-bold uppercase text-primary mb-1">Gear Tech</p>
<h4 class="text-white font-bold leading-tight">The sonar setups dominating the 2024 season leaderboard</h4>
</div>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden cursor-pointer">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Lake panoramic view" style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuA7kzSkOtO5JppmAQK8Xid2T0HPL3j0K8SK1nrOOUJQTZwVt0nWVqZRXwe3qRn1W34apL7g5juZWUGbCLXWUfeKq5egHh_-mgwD-URG1DNp-qmrikDEY57gYkpl8QqtrvIXKN_I4iGUrtMvLSWVRYKM7erTvd0_ZLhNv_P_DWX8xqOxKFwjMXhv4w3jzCcbFOblVhjJkEFGsiudDEBdjJyqlM_sanfkRIUGjx32y_mLh0jkHbV6QasmFgVcp-yV1pXZeFvVkAJ3VoUi");'></div>
<div class="absolute bottom-4 left-4 right-4">
<p class="text-xs font-bold uppercase text-primary mb-1">Venue News</p>
<h4 class="text-white font-bold leading-tight">Next Stop: The Great Lakes Invitational detailed schedule</h4>
</div>
</div>
<div class="group relative aspect-video rounded-xl overflow-hidden cursor-pointer">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Team logo montage" style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 60%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDHWC_owDXEDd36LN522Vn5LFHBVow48I8CdipfC1dyQeSYH2AyYsig0ej6VtfG57UaVYdKLT61XKZAO_bb8f6Q08oTOVxTP5t6eHhjTFuZ-3i1I-IucS_PGlJA1HuAvCZLHdscITRhj3xfyhfUK3lYIrc0CUoyx_CGr6punu06eLmuYHiqkTyEpkFBtnFOZHTnaSkNBBY7IC44Yyaoq3r5IdtnjYGSUCEr7LHdLYNB4cMUCwicDncdiSc0usbwB5XB-nblMBjq2gsy");'></div>
<div class="absolute bottom-4 left-4 right-4">
<p class="text-xs font-bold uppercase text-primary mb-1">Team Spotlight</p>
<h4 class="text-white font-bold leading-tight">How Apex Anglers built a dynasty in just three seasons</h4>
</div>
</div>
</div>
</div>
</main>
<footer class="border-t border-slate-200 dark:border-white/10 mt-12 py-10 px-4">
<div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined">set_meal</span>
<span class="font-bold text-slate-900 dark:text-white">ProFishing League</span>
</div>
<div class="flex gap-8 text-sm text-slate-500">
<a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="hover:text-primary transition-colors" href="#">Support</a>
<a class="hover:text-primary transition-colors" href="#">Media Kit</a>
</div>
<p class="text-xs text-slate-500">© 2024 ProFishing League. All rights reserved.</p>
</div>
</footer>
</body></html>