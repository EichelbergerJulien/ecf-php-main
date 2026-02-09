<?php 

var_dump($twig);
echo $twig->render('livres.html.twig');


//j'utilise une pagination cote serveur avec pdo
// limite le nbre de résultats par page avec limit et offset
// et calcul dynamiquement le nbre total de pages avec count ()

$limite = 10;   // livres par page

$page = isset($_GET['page']) && $_GET['page'] > 0        // page courante
    ? (int) $_GET['page']
    : 1;

$offset = ($page - 1) * $limite;                     // calcule LIMITE ET OFFSET

$sql = "SELECT livres.id, livres.titre, livres.annee,       
               auteurs.nom AS auteur,
               categories.nom AS categorie
               FROM livres 
               JOIN auteurs ON livres.auteur_id = auteurs.id
               JOIN categories ON livres.categorie_id = categories.id
               LIMIT :limite OFFSET :offset";                                // requete paginée

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$livres = $stmt->fetchAll();

$totalLivres = $pdo->query("SELECT COUNT(*) FROM livres")->fetchColumn();    // nombre total de pages
$totalPages = ceil($totalLivres / $limite); 


