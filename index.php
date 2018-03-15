<?php

require('controller/FrontendController.php'); 


require('routeur.php');
$ctrlfrontend = new \Forteroche\Blog\FrontendController;
$rooter = new \Forteroche\Blog\Routeur;

if (isset($_GET['action'])){
$rooter->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->listPosts();

}