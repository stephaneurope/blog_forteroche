<?php



require_once("routeur.php");

$routeur = new \ Forteroche\Blog\Routeur;

$routeur->checkUrl($_GET['action']);