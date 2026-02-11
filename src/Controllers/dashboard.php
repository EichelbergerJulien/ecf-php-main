<?php

session_start();              // Protection admin

if (!isset($_SESSION['admin'])) {
    header("Location: connect.php");
    exit();
}

echo "Bienvenue Admin";