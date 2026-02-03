<?php
    require_once '..\vendor\autoload.php';
    use Projet\controllers\FanController;

    $action = explode('/', trim($_SERVER['REQUEST_URI'], '/'))[1];
    // echo "$action";

    switch ($action){
        case 'dashbordFan':
            $controller = new FanController();
            $controller->dashboard();
            break;

        case '/tournaments':
            // Appel d'un TournamentController (à créer)
            echo "Page des tournois en cours de construction";
            break;

        case '/leaderboards':
            // Appel d'un LeaderboardController (à créer)
            echo "Page des classements";
            break;

        case '/settings':
            // Page profil
            echo "Paramètres du profil";
            break;

        case '/deconnexion':
            session_start();
            session_destroy();
            header('Location: /login');
            break;

        // Gestion de l'erreur 404
        default:
            http_response_code(404);
            echo "Erreur 404 : La page n'existe pas.";
            break;
    }
?>
