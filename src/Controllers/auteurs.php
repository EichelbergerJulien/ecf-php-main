<?php 

include_once dirname(__DIR__)  . DIRECTORY_SEPARATOR . "Models" . DIRECTORY_SEPARATOR . "Auteur.php";
global $auteurs;
echo $twig->render('auteurs.html.twig', ['auteurs' => $auteurs]);

