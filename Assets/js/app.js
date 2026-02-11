

                    // Système pour le like


// pas de rechargement
// mise à jour en base
// compteur dynamique
// API en json

document.querySelectorAll(".like-btn").forEach(button => {      // selectionne les btn de class .like-btn
    button.addEventListener("click"), function() {              // forEach parcours un par un btn ds la boucle

        const post = this.closest(".post");   // this : btn cliqué   /   . closest(".post") : remonte ds Dom -> parent class. post
        const postId = post.dataset.id;       // post.dataset.id récup valer de div post data-id

        fetch("like.php",{                    // envoie requete http vers like.php
            method: "POST",                   // method post pour modifier les donnéées
            headers: {                        // preciser envoie de json au serveur, sans php saurait pas lire les données
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: postId})      // transforme l'objet js en chaine json et l'envoi au serveur
        })
        .then(response => response.json())   // qd serveur rép , convertit la rép en json exploitatable en js
        .then(data => {
            if (data.success) {      // vérifie que l'opération = succès
                post.querySelector(".like-count").textContent = data.likes; // retourn une liste  
            }
        })
        .catch(error =>console.error("Erreur", error));   // si erreur, afficher l'erreur
};
});