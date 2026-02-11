<?php
  
echo "Connect !! ";
echo $twig->render('connect.html.twig');  


include_once dirname(__DIR__)  . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "Database.php";

if ($_POST) {

    $users = $_POST['users'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE users = ?");
    $stmt->execute([$users]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password']))   {
        $_SESSION['admin'] = $admin['id'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Identifiants incorrects !!";
    }
}

      
