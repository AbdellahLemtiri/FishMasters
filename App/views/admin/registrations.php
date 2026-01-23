<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Manage Registrations Admin Page</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                    },
                    fontFamily: {
                        "display": ["Manrope"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1c271d
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3b543f;
            border-radius: 10px
        }

        select {
            appearance: none;
            background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuBAeHD_6a1abhTubpGIZx9z1FnBAkORqQWEvh1Kr5vKq6AqhOAmGnFAQfaihss5SwDnR8RxuI9FNwWNDo8x9K1dlYqzRj28LleIJuHm2j8dguF6X2oxGie9G9_DLtclMr3cIAmnoYgNwDjkFCSX-FRM72eO0tSWTskoJrmTCqSt09gjMbNClzDdfvhx4lQ4kVw3W6WZtx2QFB5mVsk-ddvC12emiyZXrPERA1uyOV2jmva2XUI7kaFOS-zrdJ55yGtUCgY0k-TCqnI);
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-white transition-colors duration-300">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Top Navigation Bar -->
        <header
            class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 px-10 py-3 bg-background-light dark:bg-background-dark sticky top-0 z-50">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-4 text-primary">
                    <div class="size-8 flex items-center justify-center bg-primary/20 rounded-lg">
                        <span class="material-symbols-outlined text-primary">set_meal</span>
                    </div>
                    <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">AnglerDash Admin</h2>
                </div>
                <label class="flex flex-col min-w-40 !h-10 max-w-64">
                    <div
                        class="flex w-full flex-1 items-stretch rounded-lg h-full bg-white/5 border border-white/10 focus-within:border-primary/50 transition-all">
                        <div class="text-[#9db9a1] flex items-center justify-center pl-4">
                            <span class="material-symbols-outlined text-sm">search</span>
                        </div>
                        <input
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white focus:outline-0 focus:ring-0 border-none bg-transparent placeholder:text-[#9db9a1] px-4 pl-2 text-sm font-normal"
                            placeholder="Search fishermen..." value="" />
                    </div>
                </label>
            </div>
            <div class="flex flex-1 justify-end gap-6 items-center">
                <div class="flex gap-3">
                    <button
                        class="flex items-center justify-center rounded-lg size-10 bg-white/5 hover:bg-white/10 text-white transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button
                        class="flex items-center justify-center rounded-lg size-10 bg-white/5 hover:bg-white/10 text-white transition-colors">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                </div>
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-primary/30"
                    data-alt="User profile avatar showing a professional admin portrait"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAWni9VBZXcjg7PQK9RxG5M6yEMwY9qfeMcG8-TqsEoxzaOMouJV54USZvt_C7ebTZwpS-iWtgzIXPhdmYKQprYFDOrADWEQMTJgxyLPscp241z8Cw4LgTEgSmgLzV9TjwJmaGjfzBZjP6Q9lauinhCHB72wR5gyQ0HgivWyCO0mcS2tuuhYdRPYfJCYXMlDfIPJ-M6GOVAu-mh0NXSN1jaVapdfAss007zOn0nMLR-puvSZhuhX3LS7vrx1boYRBuyghVZ83Ja1mQ");'>
                </div>
            </div>
        </header>
        <main class="flex-1 px-4 md:px-10 lg:px-20 py-8 max-w-[1400px] mx-auto w-full">
            <!-- Page Heading & Filter -->
            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-8">
                <div class="flex flex-col gap-2">
                    <p class="text-white text-4xl font-black leading-tight tracking-[-0.033em]">Manage Registrations</p>
                    <p class="text-[#9db9a1] text-base font-normal">Review and manage participant entries for
                        competitive fishing tournaments.</p>
                </div>
                <div class="flex flex-wrap gap-4 items-end">
                    <label class="flex flex-col min-w-[240px]">
                        <p class="text-white text-xs font-semibold uppercase tracking-wider pb-2 opacity-60">Competition
                            Filter</p>
                        <select
                            class="form-input flex w-full rounded-lg text-white focus:outline-0 focus:ring-1 focus:ring-primary/50 border border-white/10 bg-white/5 h-11 px-4 text-sm font-medium transition-all">
                            <option value="bass-2024">Bass Masters Series 2024</option>
                            <option value="river-king">River King Championship</option>
                            <option value="deep-sea">Deep Sea Invitational</option>
                            <option value="junior">Junior Angler Open</option>
                        </select>
                    </label>
                    <button
                        class="flex items-center justify-center gap-2 rounded-lg h-11 px-6 bg-primary text-background-dark text-sm font-bold transition-transform hover:scale-[1.02] active:scale-[0.98]">
                        <span class="material-symbols-outlined text-sm">download</span>
                        <span>Export CSV</span>
                    </button>
                </div>
            </div>
            <!-- Stats Row -->
            <div class="flex flex-wrap gap-4 mb-8">
                <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-white/5 border border-white/10">
                    <div class="flex items-center justify-between">
                        <p class="text-[#9db9a1] text-sm font-medium">Total Applicants</p>
                        <span class="material-symbols-outlined text-primary/60">groups</span>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <p class="text-white text-3xl font-bold">1,284</p>
                        <p class="text-primary text-xs font-bold">+12%</p>
                    </div>
                </div>
                <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-white/5 border border-white/10">
                    <div class="flex items-center justify-between">
                        <p class="text-[#9db9a1] text-sm font-medium">Pending Review</p>
                        <span class="material-symbols-outlined text-amber-500/60">pending_actions</span>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <p class="text-white text-3xl font-bold">42</p>
                        <p class="text-amber-500 text-xs font-bold">Needs Action</p>
                    </div>
                </div>
                <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-white/5 border border-white/10">
                    <div class="flex items-center justify-between">
                        <p class="text-[#9db9a1] text-sm font-medium">Approved Today</p>
                        <span class="material-symbols-outlined text-primary/60">task_alt</span>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <p class="text-white text-3xl font-bold">15</p>
                        <p class="text-primary text-xs font-bold">Increased</p>
                    </div>
                </div>
                <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-white/5 border border-white/10">
                    <div class="flex items-center justify-between">
                        <p class="text-[#9db9a1] text-sm font-medium">Denied</p>
                        <span class="material-symbols-outlined text-red-500/60">cancel</span>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <p class="text-white text-3xl font-bold">08</p>
                        <p class="text-red-500 text-xs font-bold">This week</p>
                    </div>
                </div>
            </div>
            <!-- Main Table Container -->
            <div class="bg-white/5 rounded-xl border border-white/10 overflow-hidden shadow-2xl">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/10">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-[#9db9a1]">
                                    Fisherman</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-[#9db9a1]">
                                    Club/Team</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-[#9db9a1]">Region
                                </th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-[#9db9a1]">Status
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-[#9db9a1] text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <!-- Row 1 -->
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-white/10 flex items-center justify-center overflow-hidden border border-white/10 group-hover:border-primary/40"
                                            data-alt="Avatar of fisherman John Doe"
                                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBNfiIeNvZD42zcBiOON_mBA7gd7wAkwk-lg7k7KlS70KqN4-Nq7DPs8hZJoos-Qk2l2PwIrIaDynLt6e5MfrVUoMNtiv4qI6FRM22WgmKgyogPO4BkDsKRYRvyAKfm8Cg98ExjXh5ob3XuvQeDlmfCBOA9tTJ48Di251TLpRGJoQmqUUEmC3grSztZQITU1hdYtph-ewvJ51nFQIqBwffmF4Yt8clmpKavyIpc31gVz8FTYA9pvFbxSQ1It4_k_A56K6tS6UJrObo'); background-size: cover;">
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-white">John Doe</span>
                                            <span class="text-xs text-[#9db9a1]">ID: #98321</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">River Kings Elite</td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">North West</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-primary/20 text-primary border border-primary/30">
                                        <span class="size-1.5 rounded-full bg-primary animate-pulse"></span>
                                        Approved
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-primary/20 text-[#9db9a1] hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-red-500/20 text-[#9db9a1] hover:text-red-500 transition-all">
                                            <span class="material-symbols-outlined text-lg">cancel</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-[#9db9a1] transition-all">
                                            <span class="material-symbols-outlined text-lg">more_vert</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-white/10 flex items-center justify-center overflow-hidden border border-white/10 group-hover:border-primary/40"
                                            data-alt="Avatar of fisherman Jane Smith"
                                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD2BOlKpUCGxCxXMcRpG5dY-lhI7YUIIYIWDBGp2imPMRPvOy_lbj9IvUqWLbgdvEnmyVgCQBgY75ufFqyZmhMgL1idInE_3ciI_HmrNn18mGTL2FpHYGQsQDmNps6yiXblvRwB7e3B9fRtJFIBttxKcOjVZJlALvdmSiaQuqqz5og4pYKcGVIZEYOZiFA2OvlNXoTCDvhbs37LWCBXI13Ac9mgAcH0NjG7Ot6vOTRJavtfDL1HIxAuSbZpRpO9RPkeEr1NdIQxsgk'); background-size: cover;">
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-white">Jane Smith</span>
                                            <span class="text-xs text-[#9db9a1]">ID: #98445</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">Lake Watchers</td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">South East</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-500 border border-amber-500/30">
                                        <span class="size-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-primary hover:bg-primary/80 text-background-dark transition-all">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-red-500/20 hover:bg-red-500 text-red-500 hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-lg">cancel</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-[#9db9a1] transition-all">
                                            <span class="material-symbols-outlined text-lg">more_vert</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-white/10 flex items-center justify-center overflow-hidden border border-white/10 group-hover:border-primary/40"
                                            data-alt="Avatar of fisherman Mike Bass"
                                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD5GFGdMvyjhFmDhlx2r3hl7xr9-ge5lc6QHpY0xGF9kNGYv_2i3dztjW_xRralKX3sGo6TDqR0Um1JtV8wBiFe-tJkxu7RwrsoVRbMpMwMH0I59EsQkZPbkHNAllcvE7vVLbu3gJwntEK1IUntD5sZhKCuYskDZ98HKPWyzYbnWWAyZZkP6BVbhEfueNFq37BFjLXgB_SbVnsqzIWL5w47H00JmS1LzxrvCAIXTY51UayzUEujM8-0CcBoTGheW7TuWx14YQVNgXc'); background-size: cover;">
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-white">Mike Bass</span>
                                            <span class="text-xs text-[#9db9a1]">ID: #98102</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">Anglers Club</td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">Midlands</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-500 border border-red-500/30">
                                        <span class="size-1.5 rounded-full bg-red-500"></span>
                                        Rejected
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end gap-2 opacity-50">
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 cursor-not-allowed">
                                            <span class="material-symbols-outlined text-lg">history</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-[#9db9a1] transition-all">
                                            <span class="material-symbols-outlined text-lg">more_vert</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-primary/5 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="size-10 rounded-full bg-white/10 flex items-center justify-center overflow-hidden border border-white/10 group-hover:border-primary/40"
                                            data-alt="Avatar of fisherman Sarah Reel"
                                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCyq2vnEtJCefSOxwSiM9B4e3Ef4J1nPk_tL5Q9IK-r5M_gata3EnJjX-ad7x-GrSJgxWrKgW5KwyordiA1PrsOZGTjcoyoKtJ9SrYsmLKOzpsIcOjJpi-EmwoT5p214OCL7H9LRR5VjngQ2J6jdfr0wv0GKy4bZ1pw1EOE8lwaGC6il_XMO5kso8wTe5cMyB7jvaX8GecXGSX34nhcGHwaD_I0ZzfXKI4Wu6kmQ5BCdc4Q7orkh_ETFYU3ubpAb3JeXmynjR_I82U'); background-size: cover;">
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-white">Sarah Reel</span>
                                            <span class="text-xs text-[#9db9a1]">ID: #98552</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">Deep Sea Raiders</td>
                                <td class="px-6 py-5 text-sm text-[#9db9a1]">Coastal East</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-primary/20 text-primary border border-primary/30">
                                        <span class="size-1.5 rounded-full bg-primary"></span>
                                        Approved
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-primary/20 text-[#9db9a1] hover:text-primary transition-all">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-red-500/20 text-[#9db9a1] hover:text-red-500 transition-all">
                                            <span class="material-symbols-outlined text-lg">cancel</span>
                                        </button>
                                        <button
                                            class="size-8 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-[#9db9a1] transition-all">
                                            <span class="material-symbols-outlined text-lg">more_vert</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Footer -->
                <div class="flex items-center justify-between px-6 py-4 bg-white/5 border-t border-white/10">
                    <p class="text-xs text-[#9db9a1] font-medium">Showing <span class="text-white">1 - 4</span> of <span
                            class="text-white">1,284</span> entries</p>
                    <div class="flex gap-2">
                        <button
                            class="flex items-center justify-center px-4 h-9 rounded-lg bg-white/5 text-white text-xs font-bold hover:bg-white/10 transition-colors border border-white/10 disabled:opacity-30"
                            disabled="">
                            Previous
                        </button>
                        <button
                            class="flex items-center justify-center px-4 h-9 rounded-lg bg-white/5 text-white text-xs font-bold hover:bg-white/10 transition-colors border border-white/10">
                            Next
                        </button>
                    </div>
                </div>
            </div>
            <!-- Contextual Help / Footer -->
            <div class="mt-12 p-6 rounded-xl bg-gradient-to-r from-primary/10 to-transparent border-l-4 border-primary">
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-primary">info</span>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Approval Protocol</h4>
                        <p class="text-xs text-[#9db9a1] leading-relaxed max-w-2xl">
                            Registration requests must be reviewed based on competition tier eligibility. Approving a
                            user will trigger an automated confirmation email with their entry ticket and event rules.
                            Rejections require a valid reason to be selected in the follow-up prompt.
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>