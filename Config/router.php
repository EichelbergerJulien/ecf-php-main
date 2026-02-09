<?php

$router = new AltoRouter();

$router->map("GET", "/", "accueil", "accueil");
$router->map("GET", "/auteurs", "auteurs", "auteurs");
$router->map("GET", "/connect", "connect", "connect");
$router->map("GET", "/deco", "deco", "deco");
$router->map("GET", "/livres", "livres", "livres");

addRouterToTwig($router);
$match = $router->match();


if (is_array($match)) {

    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];
        include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controllers" . DIRECTORY_SEPARATOR . $match['target'] . ".php";
    }
} else {
    echo "Erreur 404";
}
