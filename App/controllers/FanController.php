<?php
    namespace Projet\controllers;
    use Projet\models\Fan;
    use Projet\controllers\baseController;

    class FanController extends BaseController{

        public function dashboard() {
            session_start();
            // if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'fan') {
            //     header('Location: /login');
            //     exit();
            // }
            $userId = 2;//$_SESSION['user_id'];
            $fan = Fan::getById($userId);
            if (!$fan) {
                header('Location: /logout');
                exit();
            }
            // 3. Récupérer les statistiques (Exemples de méthodes à ajouter dans vos modèles)
            // Ces méthodes devraient idéalement être dans vos modèles respectifs
            $stats = [
                'followed_count' => 24, // $followModel->countByFan($userId)
                'badges_count'   => 12, // $badgeModel->countByFan($userId)
                'events_watched' => 158,
                'points'         => "4.8k"
            ];

            // 4. Récupérer les pêcheurs suivis (Live ou non)
            // $followedAnglers = $followModel->getFollowedAnglersWithLiveStatus($userId);

            // 5. Récupérer la collection de badges
            // $badges = $badgeModel->getLatestBadges($userId);

            // 6. Charger la vue et passer les données
            require_once '..\App\views\dashbordFan.php';
        }
    }
?>