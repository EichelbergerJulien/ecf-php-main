<?php

include_once dirname(__DIR__) . '/Models/Database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM livres WHERE id = ? ");
$stmt->execute([$id]);

header('Location: index.php');
exit;

?>
