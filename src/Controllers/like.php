<?php

header('Content-Type: application/json');  // la rép sera du json
use App\Models\Database;           // import de Database


// récupère id en POST
$data = json_decode(file_get_contents("php://input"), true);  // transforme json en tableau php
$postId = $data['id'] ?? null;    // récup id


if(!$postId) {          // vérification sécurité , si id vide : renvoie erreur et ont arrete le script
    echo json_encode(["error" => "ID manquant"]);
    exit;
}

// mise à jour
$stmt = $pdo->prepare("UPDATE posts SET likes = likes + 1 WHERE  id = ?");  // prépare requète update
$stmt->execute([$postId]);   // execute


// récupérer le nouveau nbr
$stmt = $pdo->prepare("SELECT likes FROM posts WHERE id = ?");   // prépare requete select
$stmt->execute([$postId]);     // execute 
$likes = $stmt->fetchColumn();  // récupère uniquement la 1 ère colonne du résultat

echo json_encode([         // réponse finale envoyée au front (un json au js) 
    "success" => true,     // et le js peut faire (data.likes et mmise à jour de l'ecran)
    "likes" => $likes
]);
