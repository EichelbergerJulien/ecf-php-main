<?php

require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
$stmt->execute([$id]);
$livre = $stmt->fetch();

if (!empty($_POST)) {
    $sql = "UPDATE livres
            SET titre = :titre, annee = : annee
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titre' => $_POST['titre'],
        ':annee' => $_POST['annee'],
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
}
