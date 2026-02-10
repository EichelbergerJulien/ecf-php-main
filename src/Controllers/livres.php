<?php 
use App\Models\Database;

include_once dirname(__DIR__)  . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "Livre.php";

global $livres;

echo $twig->render('livres.html.twig', ['livres' => $livres]);


//j'utilise une pagination cote serveur avec pdo                     ( PAGINATION )
// limite le nbre de résultats par page avec limit et offset
// et calcul dynamiquement le nbre total de pages avec count ()

$limite = 10;   // livres par page

$page = isset($_GET['page']) && $_GET['page'] > 0        // page courante
    ? (int) $_GET['page']
    : 1;

$offset = ($page - 1) * $limite;                         // calcule LIMITE ET OFFSET
                     
$pdo = Database::getInstance()->getConnection();         // récupère avec Singleton la connexion à la base de donnée

$sql = "SELECT livres.id, livres.titre, livres.annee,       
               auteurs.nom AS auteur,
               categories.nom AS categorie
               FROM livres 
               JOIN auteurs ON livres.auteur_id = auteurs.id
               JOIN categories ON livres.categorie_id = categories.id
               LIMIT :limite OFFSET :offset";                                // requete paginée

$stmt = $pdo->prepare($sql);                               // envoie la requete sans l'executer et pdo renvoi un objet pdo stmt
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);      // nmbre de résultats par page , et PARAM_INT indique que c'est un entier
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);      // offset = a partir de quel enregistrement ont commence
$stmt->execute();                                          // requete envoyée a la base et resultats prets a etre récupérer

$livres = $stmt->fetchAll();                               // récupère ttes les lignes sous forme de tableau ( 1 ligne = 1 livre)

$totalLivres = $pdo->query("SELECT COUNT(*) FROM livres")->fetchColumn();    // execute et compte le nombre total de pages de la 1ère colonne
$totalPages = ceil($totalLivres / $limite);                                  // fait le calcul et arrondit au dessus avec ceil









/* <div style="margin-top: 25px;">                                       // liens pagination (HTML)
    <?php for ($i = 1; $i <= $totalPages; $i ++): ?>                  
        <a href="?page=<?= $i ?>"
        style="<?= ($i == $page) ? 'font-weight:bold;' : '' ?>">  
        <?= $i ?>                                                 
        </a>                                                      
    <?php enfor; ?>
</div>  */  