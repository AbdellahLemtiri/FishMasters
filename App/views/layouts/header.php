<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FishMasters | Ultimate Fishing Platform</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#13ec6d",
                        "background-light": "#f6f8f7",
                        "background-dark": "#102218",
                    },
                    fontFamily: {
                        "display": ["Lexend"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Lexend', sans-serif; }
        .maritime-gradient { background: linear-gradient(135deg, #102218 0%, #0a1610 100%); }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white min-h-screen overflow-x-hidden">
    <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-[#28392f] px-6 md:px-10 py-3 sticky top-0 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md z-50">
            
            <a href="index.php" class="flex items-center gap-4 group">
                <div class="bg-primary p-1.5 rounded-lg text-white group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined block">tsunami</span>
                </div>
                <h2 class="text-slate-900 dark:text-white text-xl font-bold leading-tight tracking-tight">FishMasters</h2>
            </a>

            <div class="flex flex-1 justify-end gap-8">
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="#">Fans</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="#">Participants</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="#">Tournaments</a>
                    <a class="text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-primary text-sm font-medium transition-colors" href="#">Leaderboards</a>
                </nav>

                <div class="flex items-center gap-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-medium text-slate-400">Pêcheur : <span class="text-primary"><?= htmlspecialchars($_SESSION['nom'] ?? 'Élite') ?></span></span>
                            
                            <a href="index.php?action=logout" 
                               class="flex min-w-[100px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-red-500/10 border border-red-500/50 text-red-500 text-sm font-bold transition-all hover:bg-red-500 hover:text-white">
                                <span>Déconnexion</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <a href="index.php?action=login" 
                           class="flex min-w-[100px] cursor-pointer items-center justify-center rounded-lg bg-primary text-background-dark h-10 px-4 text-slate-900 dark:text-white text-sm font-bold transition-all hover:text-primary shadow-[0_0_15px_rgba(19,236,109,0.3)]">
                            <span>Login</span>
                        </a>

                        <a href="index.php?action=signup" 
                           class="flex min-w-[100px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold transition-all hover:scale-105 shadow-[0_0_15px_rgba(19,236,109,0.3)]">
                            <span>Sign Up</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </header>