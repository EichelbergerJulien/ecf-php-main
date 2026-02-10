<?php

include_once __DIR__ . DIRECTORY_SEPARATOR . "Database.php";
use App\Models\Database;

$db = Database::getInstance()->getConnection();

$query = "SELECT * FROM auteurs"; 
$stmt = $db->query($query);
$auteurs = $stmt->fetchAll(PDO::FETCH_OBJ);



