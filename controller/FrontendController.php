<?php
namespace Forteroche\Blog;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');


class FrontendController{
    
 public function moderate()
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comment = $commentManager->boolean($_GET['id']);
 
    } 
    
  
public function addComment($postId, $author,$comment)
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId,$author,$comment);
     if ($affectedLines == false) {
        
        echo'Impossible d\'ajouter le commentaire !';
    }
    else {
    header('Location: index.php?action=post&id=' . $postId);
    }
    }
    

    public function listPosts()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $posts = $postManager->limitGetPosts();
    $view = new View('listPostsView');
   $view->generer(array('posts' => $posts));
    
}

public function post()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('postView');
    $view->generer(array('post' => $post,'comments' => $comments));
  
      
}
    public function board()
{
        $postManager = new \Forteroche\Blog\Model\PostManager();
    
    $posts = $postManager->getPosts();
    
    $view = new View('interface');
   $view->generer(array('posts' => $posts));
          
    }

    
    public function template($page)
{
       
    $postManager = new \Forteroche\Blog\Model\PostManager();
    
    $posts = $postManager->getPosts();
    
    }
   
  
    
    

    }