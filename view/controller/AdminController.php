<?php
namespace Forteroche\Blog;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');
 require_once('view/frontend/view.php');

class AdminController{
    
   public function connexion($pseudo,$pass) {
$adminManager = new \Forteroche\Blog\Model\AdminManager();
$manager = $adminManager->connected($pseudo,$pass);
 
                
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);   
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
    
      

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('Location: index.php?action=board');
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
       }
}