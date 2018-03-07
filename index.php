<?php
require('controller/FrontendController.php'); 
require('controller/BackendController.php');
require('controller/AdminController.php');

$ctrlfrontend = new \Forteroche\Blog\FrontendController;
$ctrlBackend = new \Forteroche\Blog\BackendController;
$ctrlAdmin = new \Forteroche\Blog\AdminController;


require('rooter.php');

$rooter = new Root;

if (isset($_GET['action'])){
$rooter->checkUrl($_GET['action']);}
else {
    
    $ctrlfrontend->listPosts();

}