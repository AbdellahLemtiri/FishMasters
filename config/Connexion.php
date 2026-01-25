<?php
    namespace Config;
    use PDO;
    use PDOException;

    class Connexion{
        private string $nomDB = "app";
        private string $userDB = "admin";
        private string $passDB = "2ab7ff85ad29c37722ce4990";
        private string $hostDB = "dockhosting.dev";
        private int $portDB = 48660;

        private ?PDO $pdo = null;
        private static ?Connexion $instance = null;

        private function __construct()
        {
            try {
                $dsn = "pgsql:host={$this->hostDB};port={$this->portDB};dbname={$this->nomDB}";
                $this->pdo = new PDO($dsn, $this->userDB, $this->passDB);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Connection failed: " . $e->getMessage());
            }
        }

        public static function connect(): Connexion
        {
            if (self::$instance === null) {
                self::$instance = new Connexion();
            }
            return self::$instance;
        }

        public function getConnexion(): PDO
        {
            return $this->pdo;
        }
    }

    //  pour ouvert la connection dans les classes
    // Connexion::connect()->getConnexion();