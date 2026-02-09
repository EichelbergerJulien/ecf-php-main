<?php

session_start();

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . DIRECTORY_SEPARATOR . "RouterExtension.php";

$loader = new FilesystemLoader("../src/Views");
$twig = new Environment($loader, [
    'debug' => true
]);

$twig->addExtension(new DebugExtension());
$twig->addGlobal("session", $_SESSION);

function addRouterToTwig($router) {
    global $twig;
    $twig->addExtension(new RouterExtension($router));
}