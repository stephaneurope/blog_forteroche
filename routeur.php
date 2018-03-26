<?php
namespace  Forteroche\Blog;
require_once('controller/FrontendController.php'); 
require_once('controller/BackendController.php');
require_once('controller/AdminController.php');
require_once('app/MessageFlash.php'); 
use Exception;
class Routeur {


  public function checkUrl(){
    $ctrlfrontend = new \Forteroche\Blog\FrontendController;
    $ctrlBackend = new \Forteroche\Blog\BackendController();
    $ctrlAdmin = new \Forteroche\Blog\AdminController();

    $tab_action = array("listPosts","post","connect",'board','commentAction','addPost','addPost','cleanPost','editPost','commentsView','editComment','moderate','reability','addComment','otherPost','newComment','erasePost','eraseComment','connexion','deconnexion','modifPost');
   
 

    /*********page de vue utilisateur**********/  

    try{
      if (isset($_GET['action']) && in_array($_GET['action'], $tab_action)){
        if ($_GET['action'] == 'listPosts') {
          $ctrlfrontend->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {

            $ctrlfrontend->post();
         }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
}
       
       elseif ($_GET['action'] == 'connect'){
   
        $ctrlBackend->connect(); 
            
      }


      /**************Pages à droit restreint****************/

      elseif ($_GET['action'] == 'board') {
        session_start();
        if($_SESSION['id'] && $_SESSION['pseudo']){
          $ctrlfrontend->board();
        }else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
         
         
    }
        }
      


      elseif ($_GET['action'] == 'commentAction') {
       require_once('controller/FrontendController.php'); 
       session_start();    
       if($_SESSION['id'] && $_SESSION['pseudo']){

        $ctrlBackend->commentAction();}
        else{
         throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
        }
      }
      elseif ($_GET['action'] == 'addPost'){
       session_start();
       if($_SESSION['id'] && $_SESSION['pseudo']){

        $ctrlBackend->addPost();       
      } else{
       throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
      }
    }
    elseif ($_GET['action'] == 'cleanPost'){
     if (isset($_GET['id']) && $_GET['id'] > 0) {
      session_start();
      if($_SESSION['id'] && $_SESSION['pseudo']){
        $ctrlBackend->cleanPost($_GET['id']);
      } else{
        throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
      }

    }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
  }
  elseif ($_GET['action'] == 'editPost'){
   if (isset($_GET['id']) && $_GET['id'] > 0) {
    session_start();
    if($_SESSION['id'] && $_SESSION['pseudo']){
      $ctrlBackend->changePost($_GET['id']);
    } else{
     throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
      
     
    }

  }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    } 
}

elseif ($_GET['action'] == 'commentsView') {
  if (isset($_GET['id']) && $_GET['id'] > 0) {
  session_start();
  if($_SESSION['id'] && $_SESSION['pseudo']){
    $ctrlBackend->commentsView();
  }

  else{
    throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
  }
}else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
}
elseif ($_GET['action'] == 'editComment'){
 if (isset($_GET['id']) && $_GET['id'] > 0) {
  if($_SESSION['id'] && $_SESSION['pseudo']){
    $ctrlBackend->changeComment($_GET['id']);
  } else{
   throw new Exception('L\' accès à été refusé <br> Vous n êtes pas autorisé à consulter cette page <br> HTTP ERROR 403');
 }

  } else{
    session_start();
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
}

/*******************************/ 
/********signalement et réabilitation d'un commentaire********/
elseif ($_GET['action'] == 'moderate'){
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    $ctrlfrontend->moderate($_GET['id']);
  }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

} 

elseif ($_GET['action'] == 'reability') {
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $ctrlBackend->reability();   
  } else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }   
}


/******ajout d'un commentaire********/  

elseif ($_GET['action'] == 'addComment') {
  if (isset($_GET['id']) && $_GET['id'] > 0){
   $ctrlfrontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
 }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }


}
/***********inscription d'un nouveau post dans la BDD***************/
elseif ($_GET['action'] == 'otherPost'){

 
  $ctrlBackend->otherPost($_POST['chapter'],$_POST['title'],$_POST ['content']);

} 
/***********modification du commentaire***************/
elseif ($_GET['action'] == 'newComment') {
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    if (!empty($_POST['comment'])) {
      $ctrlBackend->newComment($_POST['comment'],$_GET['id']);

    }

  }else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

}
/***********effacer un post***************/ 
elseif ($_GET['action'] == 'erasePost'){
 if (isset($_GET['id']) && $_GET['id'] > 0) {
  $ctrlBackend->erasePost($_GET['id']);
} else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }
} 
/***********effacer un commentaire***************/ 
elseif ($_GET['action'] == 'eraseComment'){
 if (isset($_GET['id']) && $_GET['id'] > 0) {
  $ctrlBackend->eraseComment($_GET['id']);  
}else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    } 
}

/************** connexion et déconnexion *****************/
elseif ($_GET['action'] == 'connexion'){
 if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
  $ctrlAdmin->connexion($_POST['pseudo'],$_POST['pass']);} 
  else {
   $Session = new \Forteroche\Blog\MessageFlash();
   $Session->setFlash('Tous les champs ne sont pas remplis','');
   header('Location: index.php?action=connect');

 }
}
elseif ($_GET['action'] == 'deconnexion'){

  $ctrlAdmin->deleteSession();    
}


/************** modification d'un post *****************/       
elseif ($_GET['action'] == 'modifPost') {
  if (isset($_GET['id']) && $_GET['id'] > 0) {
   
     $ctrlBackend->modifPost($_GET['id'],$_POST['content'],$_POST['title'],$_POST['chapter']);
}else{
      throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');
    }

}


}else{throw new Exception('Désolé une erreur est survenue,votre demande n\'a pas pu aboutir');}

   } catch(Exception $e){ // S'il y a eu une erreur, alors...
  session_start();
   $ctrlfrontend->error();?>
    <div class="exception">
        <?php echo( $e->getMessage() ."\n"); ?>
    </div>
    <?php
   
   
  }

} 
} ?>