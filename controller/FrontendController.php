<?php
namespace Forteroche\Blog;
    // Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/view.php');
require_once('app/MessageFlash.php');
require_once('app/Text_cut.php');


class FrontendController{

    
   public function moderate($commentId)
   {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $commentManager->boolean($_GET['id']);
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        header('Location: index.php?action=post&id='. $postId);
        exit;
    }

} 


public function addComment($postId, $author,$comment)
{
    if (!empty(htmlspecialchars(ltrim($_POST['author']))) && !empty(htmlspecialchars(ltrim($_POST['comment'])))){
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $affectedLines = $commentManager->postComment($postId,$author,$comment);
        $Session = new \Forteroche\Blog\MessageFlash();
        
        $Session->setFlash('Votre commentaire a bien été ajouté','');
        header('Location: index.php?action=post&id=' . $postId);}else{
          $Session = new \Forteroche\Blog\MessageFlash();
          $Session->setFlash('Vous n\'avez pas rempli tous les champs',''); 
          header('Location: index.php?action=post&id='. $postId);
          exit;
      }
      
      
      
  }
  

  public function listPosts()
  {
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $cut = new \Forteroche\Blog\Model\Cut;
    $posts = $postManager->limitGetPosts();
    $chapters = $postManager->getPosts(); 
    
    
    $view = new View('listPostsView');
    $view->generer(['posts' => $posts,'chapters'=>$chapters,'cut'=>$cut]);
    
}

public function post()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $chapters = $postManager->getPosts(); 
    $session = new \Forteroche\Blog\MessageFlash();
    $view = new View('postView');
    $view->generer(['post' => $post,'comments' => $comments,'chapters'=>$chapters,'session'=>$session]);
    
}
public function board()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    
    $posts = $postManager->getPosts();
    $session = new \Forteroche\Blog\MessageFlash();
    $view = new View('interface');
    $view->generer(['posts' => $posts,'session' => $session]);
    
}

public function error()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $post = $postManager;
    $comments = $commentManager;
    $chapters = $postManager->getPosts(); 
    $view = new View('errorView');
    $view->generer(['post' => $post,'comments' => $comments,'chapters'=>$chapters]);
    
}




}