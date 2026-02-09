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
 