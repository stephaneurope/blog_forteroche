<?php
    namespace  Forteroche\Blog;
    require_once('controller/FrontendController.php'); 
    require_once('controller/BackendController.php');
    require_once('controller/AdminController.php');
    require_once('controller/session.class.php'); 
    class Root {

        
    public function checkUrl(){
    $ctrlfrontend = new \Forteroche\Blog\FrontendController;
    $ctrlBackend = new \Forteroche\Blog\BackendController();
      $ctrlAdmin = new \Forteroche\Blog\AdminController();  
        
    try{
        if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $ctrlfrontend->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
               
               $ctrlfrontend->post($_GET['id']);
            }
            
        }
            
            
            /**************Pages à droit restreint****************/
            
              elseif ($_GET['action'] == 'board') {
                  session_start();
                  if($_SESSION){
            $ctrlfrontend->board();
                  }else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
        }
                 
        
    elseif ($_GET['action'] == 'commentAction') {
                 require_once('controller/FrontendController.php'); 
              session_start();    
        if($_SESSION){
      
                $ctrlBackend->commentAction();}
                      else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
    }
          elseif ($_GET['action'] == 'addPost'){
               session_start();
                  if($_SESSION){
                  
                    $ctrlBackend->addPost();       
           } else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
    }
            elseif ($_GET['action'] == 'cleanPost'){
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                  session_start();
                  if($_SESSION){
                    $ctrlBackend->cleanPost($_GET['id']);
                   } else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
                  
              } 
           }
            elseif ($_GET['action'] == 'editPost'){
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                  session_start();
                  if($_SESSION){
                    $ctrlBackend->changePost($_GET['id']);
                   } else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
                  
              } 
           }
            
     elseif ($_GET['action'] == 'commentsView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
          session_start();
                  if($_SESSION){
                $ctrlBackend->commentsView();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
                } else{
                      header("HTTP/1.1 403 Unauthorized" );
                      exit;
                  }
        }
         
                    /*******************************/ 


            elseif ($_GET['action'] == 'reability') {
      
          if (isset($_GET['id']) && $_GET['id'] > 0){
                $ctrlBackend->reability('moderate');        }

           
            
        }
            
         elseif ($_GET['action'] == 'connect'){
                
                  
                    $ctrlBackend->connect();       
           }
            
         
           
            
    elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
         
             
                     $ctrlfrontend->addComment($_GET['id'], $_POST['author'],$_POST['comment']);
                 }
                
            
        }
            elseif ($_GET['action'] == 'otherPost'){
                
                   if (!empty($_POST['chapter']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    $ctrlBackend->otherPost($_POST['chapter'],$_POST['title'],$_POST ['content']);
                   }else {
          
                
                   }
           } 
           
            elseif ($_GET['action'] == 'newComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    $ctrlBackend->newComment($_POST['comment'],$_GET['id']);
                     header('Location: index.php?action=commentsView&id='. $postId);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            
        }
              
              elseif ($_GET['action'] == 'erasePost'){
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                  
                    $ctrlBackend->erasePost($_GET['id']);
                   
                  
              } 
           } 
            elseif ($_GET['action'] == 'eraseComment'){
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                  
                    $ctrlBackend->eraseComment($_GET['id']);  
              } 
           }
            elseif ($_GET['action'] == 'connexion'){
                 if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
                    $ctrlAdmin->connexion($_POST['pseudo'],$_POST['pass']);} 
                     else {
                   $Session = new \Forteroche\Blog\Session();
    $Session->setFlash('Tous les champs ne sont pas remplis','');
         header('Location: index.php?action=connect');
                  
                }
           }
            elseif ($_GET['action'] == 'deconnexion'){
                  
                    $ctrlAdmin->deleteSession();    
           }
            
            elseif ($_GET['action'] == 'moderate'){
                
                  if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                  $ctrlfrontend->moderate($_GET['id'],$postId);
                   
              
                  }
               
                       
           } 
            
                   
             elseif ($_GET['action'] == 'modifPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['content'])&& !empty($_POST['title'])&& !empty($_POST['chapter'])) {
                    $ctrlBackend->modifPost($_POST['content'],$_POST['title'],$_POST['chapter'],$_GET['id']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            
        }
            elseif ($_GET['action'] == 'editComment'){
               if (isset($_GET['id']) && $_GET['id'] > 0) {
                  
                    $ctrlBackend->changeComment($_GET['id']);
                   
                  
              } 
           }
            
            
        }  
            

    }
    catch(Exception $e){ // S'il y a eu une erreur, alors...
       $errorMessage = $e->getMessage();
        require('view/errorView.php');
    }
       } 
        }