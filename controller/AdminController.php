<?php
namespace Forteroche\Blog;
  // Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
require_once('view/frontend/view.php');
require_once('app/MessageFlash.php');

class AdminController{
  
 public function connexion($pseudo,$pass) {
  $adminManager = new \Forteroche\Blog\Model\AdminManager();
  $resultat = $adminManager->connected($pseudo,$pass);
  
  
  $isPasswordCorrect = password_verify($_POST['pass'],$resultat['pass']);
  
  if (!$resultat)
  {
   $Session = new \Forteroche\Blog\MessageFlash();
   $Session->setFlash('Mauvais identifiant ou mot de Passe','');
   header('Location: index.php?action=connect');
   exit;
 }
 else
 {
  if ($isPasswordCorrect) {
    
   if (!empty($_POST['pseudo']) && !empty($_POST['pass'])){
    
    $Session = new \Forteroche\Blog\MessageFlash();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    
    $Session->setFlash('Vous etes connecté','');
    
    header('Location: index.php?action=board'); 
    exit;
  }   
  
}
else {
  $Session = new \Forteroche\Blog\MessageFlash();
  $Session->setFlash('Mauvais identifiant ou mot de Passe','');
  header('Location: index.php?action=connect');
  exit;
}
}
}

public function deleteSession() {
 session_start();

  // Suppression des variables de session et de la session
 $_SESSION = array();
 session_destroy();

  // Suppression des cookies de connexion automatique
 setcookie('login', '');
 setcookie('pass', '');
 header('Location: index.php');
 exit;
}


}