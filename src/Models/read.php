<?php

require 'db.php';

$sql = "SELECT livres.id, livres.titre, livres.annee, 
               auteurs.nom AS auteur,
               categories.nom AS categorie
               FROM livres 
               JOIN auteurs ON livres.auteur_id = auteurs.id
               JOIN categories ON livres.categorie_id = categories.id";

$stmt = $pdo->query($sql);
$livres = $stmt->fetchAll();
?>

<table boreder="1">
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Catégorie</th>
        <th>Année</th>
    </tr>

    <?php foreach ($livres as $livre): ?>

    <tr>
        <td><?= htmlspecialchars($livre['titre']) ?></td>
        <td><?=  $livre['auteur'] ?></td>
        <td><? $livre['categorie']?></td>
        <td><?= $livre['annee'] ?></td>
        <td>
            <a href="create.php?id=<?=  $livre['id'] ?>">Modifier</a>
            <a href="delete.php?id=<?=  $livre['id'] ?>"
                onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr> 
    <?php endforeach; ?>   
</table>