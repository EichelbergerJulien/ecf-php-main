<?php

include_once __DIR__ . DIRECTORY_SEPARATOR . "Database.php";
use App\Models\Database;

$db = Database::getInstance()->getConnection();

$query = "SELECT * FROM `auteurs` INNER JOIN `livres` ON auteurs.id = livres.auteur_id"; 
$stmt = $db->query($query);
$livres = $stmt->fetchAll(PDO::FETCH_OBJ);

var_dump($livres);

