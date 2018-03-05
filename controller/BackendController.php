<?php
namespace Forteroche\Blog;
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');

class BackendController{
  

    public function changeComment($commentId) 
{ 
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);
    $view = new View('changePostView'); 
    $view->generer(array('comment' => $comment));
}
    
public function newComment($commentId,$comment)
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $reaffectedLines = $commentManager->updateComment($commentId,$comment);

   
        header('Location: index.php?action=editComment&id=' . $comment . '&postId='. $postId);
    
}
    
   public function changePost($postId) 
{ 
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    $view = new View('updatePostView'); 
    $view->generer(array('post' => $post));
}
    
   public function modifPost($postId,$content,$title,$chapter)
{
    $postManager = new \Forteroche\Blog\Model\PostManager();

    $reaffectedLines = $postManager->updatePost($postId,$content,$title,$chapter);

   
        header('Location: index.php?action=board');
    
}
   public function cleanPost($postId){
     $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    $view = new View('deletePostView'); 
    $view->generer(array('post' => $post));
        }
 public function erasePost($postId){
     $postManager = new \Forteroche\Blog\Model\PostManager();
    $deleteLines = $postManager->deletePost($_GET['id']);
 header('Location: index.php?action=board');


}
    public function addPost(){
   $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('addPostView'); 
    $view->generer(array('post' => $post));
        }
     public function connect(){
   $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('connectView'); 
    $view->generer(array('post' => $post));
        }
 public function commentsView()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('commentsView');
    
   $view->generer(array('post' => $post,'comments' => $comments));
      
}
   
    public function reability($commentId)
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comment = $commentManager->demoderate($_GET['id']);
        header('Location: index.php?action=board'); 
    }
    
    public function commentAction()
{
    
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    
    $comments = $commentManager->commentModerate();
    $view = new View('commentModerateView');
    
   $view->generer(array('comments' => $comments));
      
}
public function eraseComment($commentId){
     $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $deleteComment = $commentManager->deleteComment($_GET['id']);
 header('Location: index.php?action=board');
}
 public function otherPost($chapter,$title,$content){
     $postManager = new \Forteroche\Blog\Model\PostManager();
    $newLines = $postManager->newPost($chapter,$title,$content);
      if ($newLines == false) {
    echo(var_dump($chapter));
    
        echo'Impossible d\'ajouter le commentaire !';
    }else {
    header('Location: index.php?action=board');
    }
}   
    
    
    
}