<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');


class FrontendController{
  

function texte_decoupe( $texte, $longueur_max, $separateur ) {
    if( strlen($texte) >= $longueur_max ) {
        $texte = substr( $texte, 0, $longueur_max );
        $dernier_espace = strrpos( $texte, ' ' );
        $texte = substr( $texte, 0, $dernier_espace);
        echo $texte . ' ' . $separateur;
    }
     
    else echo $texte; }

  
    
function listPosts()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    $view = new View('listPostsView');
   $view->generer(array('posts' => $posts));
    
}

function post()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('postView');
   $view->generer(array('post' => $post,'comments' => $comments));
      
}
    function board()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    
    $posts = $postManager->getPosts();
    
    $view = new View('interface');
   $view->generer(array('posts' => $posts));
}

    }