<?php

namespace App\Models;
use PDO;
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR . "database.php";


class Database {
    private static ?Database $instance = null;
    private PDO $connection;

    // Constructeur privé : empêche l'instanciation directe

    private function __construct() {
        $this->connection = new PDO("mysql:host=" . DB_INFOS['host'] . ";port=" . DB_INFOS['port'] . ";dbname=" . DB_INFOS['dbname'],
			DB_INFOS['username'],
			DB_INFOS['password']);
    }

    // Méthode statique pour récupérer l'unique instance

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Accéder à la connexion PDO

    public function getConnection(): PDO {
        return $this->connection;
    }
}