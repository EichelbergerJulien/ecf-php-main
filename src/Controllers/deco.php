<?php

    echo $twig->render('deco.html.twig');
    session_start();
    session_destroy();

    header("Location: connect.php");
    




