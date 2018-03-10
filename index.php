<?php

require('controller/FrontendController.php'); 
require('controller/BackendController.php');
require('controller/AdminController.php');
require('rooter.php');
$ctrlfrontend = new \Forteroche\Blog\FrontendController;
$ctrlBackend = new \Forteroche\Blog\BackendController;
$ctrlAdmin = new \Forteroche\Blog\AdminController;
$rooter = new \Forteroche\Blog\Root;

if (isset($_GET['action'])){
$rooter->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->listPosts();

}