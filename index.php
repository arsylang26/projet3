<?php
setcookie('role', 'administrateur', time() + 20*24*3600, null, null, false, true);
session_start();
require 'Controleur/Routeur.php';
$routeur = new Routeur();
$routeur->routerRequete();
?>s