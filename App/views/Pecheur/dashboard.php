<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FishPro | Expert Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec6d",
                        "background-dark": "#0a140f",
                        "card-dark": "#13231a",
                    },
                    fontFamily: {
                        "display": ["Lexend", "sans-serif"]
                    },
                },
            },
        }
    </script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #13ec6d33;
            border-radius: 10px;
        }

        /* Animations */
        @keyframes pulse-soft {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        .animate-pulse-slow {
            animation: pulse-soft 3s infinite;
        }

        .modal-enter {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }

        .modal-show {
            opacity: 1;
            transform: scale(1) translateY(0);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .row-hover:hover {
            transform: translateX(8px);
            background: rgba(19, 236, 109, 0.05);
        }
    </style>
</head>

<body class="bg-background-dark font-display text-slate-200 antialiased overflow-hidden">

    <div id="priseModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="toggleModal()"></div>
        <div id="modalContent" class="glass w-full max-w-2xl rounded-[2.5rem] overflow-hidden modal-enter relative z-10 shadow-2xl border border-primary/20">
            <div class="p-8 space-y-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="size-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-3xl font-bold">add_a_photo</span>
                        </div>
                        <h2 class="text-2xl font-black italic tracking-tighter uppercase">Nouvelle Prise</h2>
                    </div>
                    <button onclick="toggleModal()" class="size-10 rounded-full hover:bg-white/10 flex items-center justify-center transition-all">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <form id="formPrise" class="grid grid-cols-1 md:grid-cols-2 gap-5" enctype="multipart/form-data">

                    <div class="space-y-2">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Espèce</label>
                            <select name="espece" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-5 text-sm focus:ring-primary focus:border-primary transition-all cursor-pointer">
                                <option value="Dorade Royale">Dorade Royale</option>
                                <option value="Loup de Mer">Loup de Mer (Bar)</option>
                                <option value="Sargue">Sargue</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Action</label>
                            <div class="flex gap-2 h-[52px]">
                                <label class="flex-1 flex items-center justify-center gap-2 cursor-pointer bg-white/5 border border-white/10 rounded-2xl transition-all has-[:checked]:border-primary has-[:checked]:bg-primary/10">
                                    <input type="radio" name="isRelache" value="1" class="hidden" checked>
                                    <span class="text-[10px] font-bold uppercase">Relâché</span>
                                </label>
                                <label class="flex-1 flex items-center justify-center gap-2 cursor-pointer bg-white/5 border border-white/10 rounded-2xl transition-all has-[:checked]:border-red-500/50 has-[:checked]:bg-red-500/10">
                                    <input type="radio" name="isRelache" value="0" class="hidden">
                                    <span class="text-[10px] font-bold uppercase">Gardé</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Type de mesure</label>
                        <div class="flex bg-white/5 p-1 rounded-2xl border border-white/10">
                            <button type="button" onclick="switchMeasure('poids')" id="btnPoids" class="flex-1 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-background-dark">
                                POIDS (kg)
                            </button>
                            <button type="button" onclick="switchMeasure('taille')" id="btnTaille" class="flex-1 py-2 rounded-xl text-xs font-bold transition-all text-slate-400 hover:text-white">
                                TAILLE (cm)
                            </button>
                        </div>

                        <div id="containerPoids" class="space-y-2">
                            <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Poids Exact</label>
                            <input type="number" name="poids" step="0.01" placeholder="0.00 kg" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-5 text-sm focus:ring-primary">
                        </div>

                        <div id="containerTaille" class="hidden space-y-2">
                            <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Taille Exacte</label>
                            <input type="number" name="taille" step="0.1" placeholder="00.0 cm" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-5 text-sm focus:ring-primary">
                        </div>
                    </div>

                    <script>
                        function switchMeasure(type) {
                            const btnP = document.getElementById('btnPoids');
                            const btnT = document.getElementById('btnTaille');
                            const divP = document.getElementById('containerPoids');
                            const divT = document.getElementById('containerTaille');

                            if (type === 'poids') {
                                // Afficher Poids
                                divP.classList.remove('hidden');
                                divT.classList.add('hidden');
                                // Style Buttons
                                btnP.className = "flex-1 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-background-dark";
                                btnT.className = "flex-1 py-2 rounded-xl text-xs font-bold transition-all text-slate-400 hover:text-white";
                            } else {
                                // Afficher Taille
                                divT.classList.remove('hidden');
                                divP.classList.add('hidden');
                                // Style Buttons
                                btnT.className = "flex-1 py-2 rounded-xl text-xs font-bold transition-all bg-primary text-background-dark";
                                btnP.className = "flex-1 py-2 rounded-xl text-xs font-bold transition-all text-slate-400 hover:text-white";
                            }
                        }
                    </script>
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-primary uppercase tracking-widest px-1">Spot de pêche</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">location_on</span>
                            <input type="text" name="spot" placeholder="Ex: Plage Sidi Kaouki, Safi" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 pl-12 pr-5 text-sm focus:ring-primary">
                        </div>
                    </div>

                    <div class="md:col-span-2 relative">
                        <input type="file" name="photo" id="fileInput" class="hidden" accept="image/*">
                        <label for="fileInput" class="bg-white/5 border-2 border-dashed border-white/10 rounded-3xl p-8 flex flex-col items-center gap-3 group hover:border-primary/50 transition-all cursor-pointer">
                            <span class="material-symbols-outlined text-5xl text-slate-600 group-hover:text-primary transition-colors">cloud_upload</span>
                            <p class="text-xs font-bold uppercase tracking-tighter text-slate-400">Photo de preuve (Obligatoire)</p>
                            <p id="fileName" class="text-[10px] text-primary italic font-bold"></p>
                        </label>
                    </div>

                    <button type="submit" class="md:col-span-2 bg-primary text-background-dark py-5 rounded-2xl font-black text-sm uppercase tracking-[0.2em] hover:shadow-[0_0_30px_rgba(19,236,109,0.3)] transition-all transform active:scale-95">
                        Envoyer pour Validation
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 border-r border-white/5 bg-background-dark p-6 hidden lg:flex flex-col gap-8">
            <div class="flex items-center gap-3 px-2 text-primary">
                <span class="material-symbols-outlined text-4xl">waves</span>
                <span class="font-black text-2xl tracking-tight italic uppercase">FishPro</span>
            </div>
            <nav class="flex-1 space-y-1">
                <a href="#" class="sidebar-active flex items-center gap-3 p-4 text-primary rounded-xl transition-all">
                    <span class="material-symbols-outlined">grid_view</span> <span class="text-sm font-bold">Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-4 hover:bg-white/5 rounded-xl transition-all text-slate-400">
                    <span class="material-symbols-outlined">emoji_events</span> <span class="text-sm font-medium">Tournois</span>
                </a>
                <a href="#" class="flex items-center gap-3 p-4 hover:bg-white/5 rounded-xl transition-all text-slate-400">
                    <span class="material-symbols-outlined">leaderboard</span> <span class="text-sm font-medium">Classement</span>
                </a>
            </nav>
            <div class="relative group overflow-hidden bg-white/10 backdrop-blur-xl border border-white/20 p-5 rounded-3xl w-64 transition-all duration-500 hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/20">
    
    <div class="absolute -inset-px bg-gradient-to-r from-primary to-emerald-400 rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>

    <div class="relative flex flex-col items-center space-y-4">
        
        <div class="relative">
            <div class="absolute -inset-1 bg-gradient-to-tr from-primary to-emerald-400 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
            <img src="https://ui-avatars.com/api/?name=Abdellah&background=13ec6d&color=0a140f" 
                 class="relative size-16 rounded-2xl border-2 border-white/50 object-cover shadow-2xl transition-transform duration-500 group-hover:scale-110" 
                 alt="Abdellah">
            
            <span class="absolute -bottom-1 -right-1 flex h-4 w-4">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                <span class="relative inline-flex rounded-full h-4 w-4 bg-primary border-2 border-white"></span>
            </span>
        </div>

        <div class="text-center">
            <h3 class="text-lg font-black text-slate-800 tracking-tight leading-tight uppercase">
                Abdellah L.
            </h3>
            <div class="inline-flex items-center mt-1 px-3 py-1 rounded-full bg-primary/10 border border-primary/20">
                <span class="text-[9px] font-black text-primary uppercase tracking-[0.2em]">
                    Membre Pro
                </span>
            </div>
        </div>

        <!-- <div class="grid grid-cols-2 gap-4 w-full pt-2 border-t border-slate-100/50">
            <div class="text-center">
                <p class="text-[10px] text-slate-400 font-bold uppercase">Projets</p>
                <p class="text-xs font-black text-slate-700">12</p>
            </div>
            <div class="text-center border-l border-slate-100/50">
                <p class="text-[10px] text-slate-400 font-bold uppercase">Rating</p>
                <p class="text-xs font-black text-slate-700">4.9</p>
            </div>
        </div> -->
    </div>
</div>
        </aside>

        <main class="flex-1 flex flex-col h-full overflow-hidden">
            <header class="h-24 px-10 flex items-center justify-between border-b border-white/5">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-black italic uppercase tracking-tighter">Tableau de Bord</h1>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">Saison 2024 • Phase 1</p>
                </div>

                <button onclick="toggleModal()" class="group relative px-8 py-4 bg-primary text-background-dark rounded-2xl font-black text-xs uppercase tracking-widest flex items-center gap-3 animate-pulse-slow hover:animate-none transition-all shadow-xl shadow-primary/10">
                    <span class="material-symbols-outlined text-xl">add_circle</span>
                    ENREGISTRER UNE PRISE
                    <div class="absolute -inset-1 bg-primary/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </button>
            </header>

            <div class="flex-1 overflow-y-auto p-10 space-y-10 custom-scrollbar">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="glass p-8 rounded-[2.5rem] border-l-4 row-hover hover:border-primary">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Poids Total</p>
                        <h3 class="text-5xl font-black mt-2">142.8 <small class="text-sm font-light opacity-40 italic font-sans uppercase">Kg</small></h3>
                    </div>
                    <div class="glass p-8 rounded-[2.5rem] border-l-4 border-accent-blue row-hover hover:border-primary">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Score Global</p>
                        <h3 class="text-5xl font-black mt-2 text-primary">8,450</h3>
                    </div>
                    <div class="glass p-8 rounded-[2.5rem] bg-white/5 row-hover hover:border-primary">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Record Perso</p>
                                <h3 class="text-3xl font-black mt-2 italic uppercase">24.5 Kg</h3>
                            </div>
                            <span class="material-symbols-outlined text-yellow-500 text-4xl">workspace_premium</span>
                        </div>
                    </div>
                </div>

                <section class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-primary text-4xl">history_edu</span>
                            <h2 class="text-2xl font-black italic tracking-tighter uppercase underline decoration-primary/30 decoration-4 underline-offset-8">Historique des Prises</h2>
                        </div>
                        <div class="flex gap-2">
                            <button class="size-10 rounded-xl bg-white/5 hover:bg-white/10 transition-all flex items-center justify-center"><span class="material-symbols-outlined text-sm">filter_list</span></button>
                            <button class="size-10 rounded-xl bg-white/5 hover:bg-white/10 transition-all flex items-center justify-center"><span class="material-symbols-outlined text-sm">download</span></button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                        <div class="xl:col-span-2 glass rounded-[2.5rem] overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-white/5 border-b border-white/5">
                                    <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                        <th class="p-6 text-left">Espèce / Date</th>
                                        <th class="p-6 text-left">Dimensions</th>
                                        <th class="p-6 text-left">Points</th>
                                        <th class="p-6 text-right">Preuve</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                    <tr class="row-hover transition-all group">
                                        <td class="p-6">
                                            <div class="flex flex-col">
                                                <span class="font-black text-sm uppercase">Dorade Royale</span>
                                                <span class="text-[10px] text-slate-500 italic">12 Mars 2024 • Sidi Kaouki</span>
                                            </div>
                                        </td>
                                        <td class="p-6">
                                            <div class="flex items-center gap-3">
                                                <span class="px-3 py-1 bg-white/5 rounded-lg text-xs font-bold tracking-tighter">1.85 KG</span>
                                                <span class="px-3 py-1 bg-white/5 rounded-lg text-xs font-bold tracking-tighter">42 CM</span>
                                            </div>
                                        </td>
                                        <td class="p-6"><span class="text-primary font-black">+450</span></td>
                                        <td class="p-6 text-right">
                                            <img src="https://images.unsplash.com/photo-1544551763-47a0159f9234?w=100" class="size-10 rounded-lg object-cover ml-auto border border-white/10 group-hover:border-primary transition-all">
                                        </td>
                                    </tr>
                                    <tr class="row-hover transition-all group">
                                        <td class="p-6">
                                            <div class="flex flex-col">
                                                <span class="font-black text-sm uppercase">Loup de Mer</span>
                                                <span class="text-[10px] text-slate-500 italic">08 Mars 2024 • Safi</span>
                                            </div>
                                        </td>
                                        <td class="p-6">
                                            <div class="flex items-center gap-3">
                                                <span class="px-3 py-1 bg-white/5 rounded-lg text-xs font-bold tracking-tighter">0.90 KG</span>
                                                <span class="px-3 py-1 bg-white/5 rounded-lg text-xs font-bold tracking-tighter">30 CM</span>
                                            </div>
                                        </td>
                                        <td class="p-6"><span class="text-primary font-black">+210</span></td>
                                        <td class="p-6 text-right text-slate-600 italic text-[10px]">Vérification...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="space-y-8">
                            <div class="glass p-8 rounded-[2.5rem] h-full flex flex-col">
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-slate-500 mb-6">Performance Live</h3>
                                <div class="flex-1 min-h-[200px]">
                                    <canvas id="scoreChart"></canvas>
                                </div>
                                <div class="mt-8 flex justify-between items-end border-t border-white/5 pt-6">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-bold text-primary">STATUS</span>
                                        <span class="text-lg font-black italic">RANK #12</span>
                                    </div>
                                    <button class="text-[10px] font-black uppercase text-slate-400 hover:text-white transition-all underline underline-offset-4">Voir Détails</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        // Modal Logic
        function toggleModal() {
            const modal = document.getElementById('priseModal');
            const content = document.getElementById('modalContent');

            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.remove('modal-enter');
                    content.classList.add('modal-show');
                }, 10);
            } else {
                content.classList.remove('modal-show');
                content.classList.add('modal-enter');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 400);
            }
        }

        // Analytics
        const ctx = document.getElementById('scoreChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['S1', 'S2', 'S3', 'S4', 'S5'],
                datasets: [{
                    data: [12, 19, 15, 25, 32],
                    borderColor: '#13ec6d',
                    backgroundColor: 'rgba(19, 236, 109, 0.05)',
                    fill: true,
                    tension: 0.5,
                    borderWidth: 4,
                    pointRadius: 0
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
                    x: {
                        display: false
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: false
                        }
                    }
                }
            }
        });
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : "";
            document.getElementById('fileName').textContent = "Fichier sélectionné: " + fileName;
        });
    </script>
</body>

</html>