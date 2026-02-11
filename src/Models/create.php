<?php

include_once dirname(__DIR__) . '/Models/Database.php'; 

if (!empty($_POST)) {
    $sql = "INSERT INTO livres (titre, auteur_id categorie_id, annee_publication
            VALUES (:titre, :auteur, :categorie, :annee)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':titre' => $_POST['titre'],
                ':auteur' => $_POST['auteur'],
                ':categorie' =>$_POST['categorie'],
                ':annee' => $_POST['annee']
            ]);

            header('Location: index.php');
}
?>