<?php 
require_once __DIR__ . '/../layouts/header.php'; 
?>

<div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-background-light dark:bg-background-dark min-h-[80vh]">

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
        <div class="inline-flex items-center justify-center p-3 bg-primary/10 rounded-full mb-4">
            <span class="material-symbols-outlined text-primary text-5xl">tsunami</span>
        </div>
        <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white font-display">
            Connexion FishMasters
        </h2>
        <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">
            Accédez à vos compétitions et statistiques
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white dark:bg-slate-900 py-8 px-4 shadow-2xl border border-slate-200 dark:border-[#28392f] sm:rounded-xl sm:px-10 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-primary"></div>

            <?php if (isset($_GET['error'])): ?>
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded relative" role="alert">
                    <span class="block sm:inline">Email ou mot de passe incorrect.</span>
                </div>
            <?php endif; ?>

            <form class="space-y-6" action="index.php?action=process_login" method="POST">
                
                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-1">
                        Adresse Email
                    </label>
                    <div class="relative">
                        <input id="email" name="emailUser" type="email" autocomplete="email" required 
                            class="appearance-none block w-full px-3 py-3 border border-slate-300 dark:border-slate-700 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary sm:text-sm bg-white dark:bg-slate-800 dark:text-white transition-all"
                            placeholder="exemple@fishpro.com">
                        <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400">mail</span>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-bold text-slate-700 dark:text-slate-300">
                            Mot de passe
                        </label>
                    </div>
                    <div class="relative">
                        <input id="password" name="passwordUser" type="password" autocomplete="current-password" required 
                            class="appearance-none block w-full px-3 py-3 border border-slate-300 dark:border-slate-700 rounded-lg shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary sm:text-sm bg-white dark:bg-slate-800 dark:text-white transition-all"
                            placeholder="••••••••">
                        <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400">lock</span>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-sm font-black text-background-dark bg-primary hover:bg-[#0fd660] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:scale-[1.02] uppercase tracking-widest">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <span class="material-symbols-outlined text-background-dark group-hover:animate-pulse">login</span>
                        </span>
                        Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-200 dark:border-slate-800">
                <p class="text-center text-sm text-slate-600 dark:text-slate-400">
                    Pas encore membre ? 
                    <a href="index.php?action=signup" class="font-bold text-primary hover:text-white transition-colors">
                        Créer un compte
                    </a>
                </p>
                <div class="mt-4 text-center">
                    <a href="index.php" class="text-xs text-slate-400 hover:text-slate-200 transition-colors flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-xs">arrow_back</span> Retour à l'accueil
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/../layouts/footer.php'; 
?>