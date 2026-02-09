## **Sujet : Gestion d’une bibliothèque en ligne**

### **Contexte**
Vous devez créer une application web pour gérer une bibliothèque en ligne. Les utilisateurs pourront consulter, ajouter, modifier et supprimer des livres.

Dans cette exercice, intégré le maximum de concept vu en cours.

---

## **Fonctionnalités requises**

### **1. Architecture MVC**
- **Modèle** : Gestion des données (Livres, Auteurs, Catégories).
- **Vue** : Interface utilisateur (HTML, CSS, JavaScript).
- **Contrôleur** : Logique métier et gestion des requêtes.

### **2. Base de données avec PDO**
- Créer une base de données MySQL avec les tables suivantes :
  - `livres` (id, titre, auteur_id, categorie_id, annee_publication, isbn, disponible, synopsis, like)
  - `auteurs` (id, nom, prenom, biographie)
  - `categories` (id, nom)
- Utiliser **PDO** pour toutes les interactions avec la base de données (requêtes préparées, transactions, gestion des erreurs).

### **3. CRUD complet**
- **Création** : Ajouter un livre, un auteur ou une catégorie.
- **Lecture** : Afficher la liste des livres, des auteurs et des catégories.
- **Mise à jour** : Modifier les informations d’un livre, d’un auteur ou d’une catégorie.
- **Suppression** : Supprimer un livre, un auteur ou une catégorie.

### **4. Complément**
- **Authentification** : Ajouter un système de connexion pour les administrateurs.
- **Pagination** : Afficher les livres par pages.
- **Recherche avancée** : Filtrer les livres par auteur, catégorie ou année.
- **API - Like** : Ajouter un système de like en mettant à jour la base de donnée avec la méthode `Fetch`.

---

## **Livrables attendus**
- Un dépôt GitHub avec :
  - Le code source organisé en MVC.
  - Un fichier `README.md` expliquant comment installer et utiliser l’application.
  - Un fichier SQL pour créer la base de données.
- Une démonstration fonctionnelle de l’application.