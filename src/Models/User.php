<?php

include_once __DIR__ . DIRECTORY_SEPARATOR . "Database.php";
use App\Models\Database;

$db = Database::getInstance()->getConnection();

$query = "SELECT * FROM users"; 
$stmt = $db->query($query);
$livres = $stmt->fetchAll(PDO::FETCH_OBJ);

var_dump($livres);
