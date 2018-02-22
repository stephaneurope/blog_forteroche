<?php
require('controller/ControllerFrontend.php');
require('controller/ControllerBackend.php');
require_once('view/frontend/view.php'); 
$ctrlfrontend = new \Forteroche\Blog\FrontendController;
$ctrlBackend = new \Forteroche\Blog\BackendController;
try{
    if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $ctrlfrontend->listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
      
            $ctrlfrontend->post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
          elseif ($_GET['action'] == 'board') {
        $ctrlfrontend->board();
    }
        
        elseif ($_GET['action'] == 'comment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            
            $ctrlBackend->comment();
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
       
        
elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                 $ctrlBackend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
      elseif ($_GET['action'] == 'cleanPost'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                $ctrlBackend->cleanPost($_GET['id']);
               
              
          } 
       }
        elseif ($_GET['action'] == 'addPost'){
           
              
                $ctrlBackend->addPost();       
       }
        elseif ($_GET['action'] == 'connect'){
           
              
                $ctrlBackend->connect();       
       }
        
        elseif ($_GET['action'] == 'newComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                $ctrlBackend->newComment($_POST['comment'],$_GET['id']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
          elseif ($_GET['action'] == 'erasePost'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                $ctrlBackend->erasePost($_GET['id']);
               
              
          } 
       } 
        
         elseif ($_GET['action'] == 'modifPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['content'])) {
                $ctrlBackend->modifPost($_POST['content'],$_POST['title'],$_POST['chapter'],$_GET['id']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de chapitre envoyé';
        }
    }
        elseif ($_GET['action'] == 'editComment'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                $ctrlBackend->changeComment($_GET['id']);
               
              
          } 
       }
      elseif ($_GET['action'] == 'editPost'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                $ctrlBackend->changePost($_GET['id']);
               
              
          } 
       }  
    }  
        
else {
    
    $ctrlfrontend->listPosts();

}
}
catch(Exception $e){ // S'il y a eu une erreur, alors...
   $errorMessage = $e->getMessage();
    require('view/errorView.php');
}