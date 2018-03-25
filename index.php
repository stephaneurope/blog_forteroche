<?php

require('controller/FrontendController.php'); 


require('routeur.php');
$ctrlfrontend = new \Forteroche\Blog\FrontendController;
$router = new \Forteroche\Blog\Routeur;

if (isset($_GET['action'])){
$router->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->listPosts();

}