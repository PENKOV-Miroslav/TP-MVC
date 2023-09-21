<?php
//pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('Controller/Controleur.php');

$controleur = new Controleur();
$controleur->gererRequete();

?>
