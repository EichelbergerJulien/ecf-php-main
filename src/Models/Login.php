<?php 

include_once dirname (__DIR__) . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR . "layout.html.php"; 

?>

<h2>Connexion admin</h2>

<?php if (!empty($error)):  ?> 
    <p style="error"><?= $error ?></p>

    <form method="post">
        <input type="username" name="username" required>
        <input type="password" name="password" required>
        <button>Connexion</button>
    </form>

<?php else : ?>
        $error = "Identifiant(s) incorrect(s) !! ";
<?php endif ?>


<?php
include_once __DIR__ . '/Controller/Login.php';

function login()                
{    
    session_destroy();
    header("Location : index.php");
}

include_once dirname (__DIR__) . 'Views/layout.html.php';
      






session_start();

$connect = null;
$error = null;

if (isset($_SESSION["user"])) {
    $connect = true;
}

if (isset($_POST["login"]) && isset($_POST["password"])) {

    try {
        $pdo = new PDO("mysql:dbname=demo;host=localhost;port=3306;charset=UTF8", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $sql = "SELECT firstname, password FROM user WHERE firstname = :firstname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue("firstname", $_POST['login'], PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    if ($user) {
        if (password_verify($_POST['password'], $user["password"])) {
            $_SESSION["user"] = true;
            header("Location: index.php");
        } else {
            $error = "Le mot de passe est erroné";
        }
    } else {
        $error = "Le login n'existe pas";
    }



$title = "Authentification";


 
 
 
 
 
 if (!$connect) : ?>

    <?php if ($error) : ?>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            </div>
        </div>
    <?php endif ?>


    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="h1">Se connecter</h1>

            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="InputLogin" class="form-label">Login</label>
                    <input type="text" class="form-control" id="InputLogin" name="login"
                        value="<?= $_POST['login'] ?? "" ?>">
                </div>

                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="InputPassword" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="inscription.php" class="btn btn-secondary">S'inscrire</a>
            </form>
        </div>
    </div>
<?php else : ?>
    <h3>Utilisateur déjà connecter</h3>
<?php endif ?>


