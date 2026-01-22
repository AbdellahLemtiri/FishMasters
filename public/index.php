<?php
session_start();

// require_once __DIR__ . '/vendor/autoload.php';

use App\Config;
use App\Controllers\AuthController;

$database = new \Database();
$db = $database->getConnection();

$action = $_GET['action'] ?? 'home';

$authController = new AuthController($db);

switch ($action) {
    case 'signup':
        include 'views/auth/signup.php'; 
        break;

    case 'process_signup':
        $authController->signup();
        break;

    case 'login':
        include 'views/auth/login.php';
        break;

    case 'process_login':
        $authController->login();
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        break;

    default:
        include 'views/home.php';
        break;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
   
    <h1 class="text-3xl font-bold text-red-600 mb-6">🚗 Blog MaBagnole (Architecture MVC)</h1>

    <div class="grid gap-4">
        <?php foreach($mesArticles as $article): ?>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-2"><?= $article['titre'] ?></h2>
               
                <p class="text-gray-600">
                    <?= $article['resume'] ?>
                    <a href="#" class="text-blue-500 hover:underline text-sm ml-2">Voir l'article</a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>