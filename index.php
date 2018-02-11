<?php
require('controller/frontend.php');

try{
    if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
        elseif ($_GET['action'] == 'comment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            comment();
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
        
elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
        elseif ($_GET['action'] == 'newComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                newComment($_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
        elseif ($_GET['action'] == 'editComment'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                changeComment($_GET['id']);
               
              
         
           } else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            
           } 
        }else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    
        
        
}else {
    listPosts();
}
}
catch(Exception $e){ // S'il y a eu une erreur, alors...
   $errorMessage = $e->getMessage();
    require('view/errorView.php');
}