<?php
namespace Forteroche\Blog;
    // Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('view/frontend/view.php');
require_once('app/MessageFlash.php');

class BackendController{
  

    public function changeComment($commentId) 
    { 
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        $view = new View('changePostView'); 
        $view->generer(array('comment' => $comment));
        header('Location: index.php?action=commentsView&id='.$commentId);
        exit;
    }
    
    public function newComment($commentId,$comment)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $reaffectedLines = $commentManager->updateComment($commentId,$comment);
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];

        header('Location: index.php?action=commentsView&id='. $postId);
        exit;    
    }

     public function modifPost($postId,$content,$title,$chapter)
    {
       if (!empty($_POST['content']) && !empty($_POST['title']) && !empty($_POST['chapter'])) {
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $reaffected = $postManager->updatePost($postId,$content,$title,$chapter);
        $Session = new \Forteroche\Blog\MessageFlash();
        $Session->setFlash('Le chapitre a été modifié','');
        
        header('Location: index.php?action=editPost&id='. $postId);
        exit;
        }else{
        $Session = new \Forteroche\Blog\MessageFlash();
        $Session->setFlash('Tous les champs ne sont pas remplis','');
        header('Location: index.php?action=editPost&id='. $postId);
        exit;
    }

  }
    public function eraseComment($commentId)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        $deleteComment = $commentManager->deleteComment($commentId);
        
        $postId = $comment['post_id'];
        
        header('Location: index.php?action=commentsView&id='. $postId);
        exit;
    }
    public function changePost($postId) 
    { 
        $postManager = new \Forteroche\Blog\Model\PostManager();
        $post = $postManager->getPost($_GET['id']);
        $session = new \Forteroche\Blog\MessageFlash();
        $view = new View('updatePostView'); 
        $view->generer(array('post' => $post,'session' => $session));

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
       exit;
   }
   
   public function reability($commentId)
   {
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comment = $commentManager->demoderate($_GET['id']);
    header('Location: index.php?action=commentAction'); 
    exit;
}


public function connect(){
 $postManager = new \Forteroche\Blog\Model\PostManager();
 $post = $postManager;
 $chapters = $postManager->getPosts();  
 $session = new \Forteroche\Blog\MessageFlash();
 $view = new View('connectView'); 
 $view->generer(['post' => $post,'chapters'=>$chapters,'session' => $session]);
 
}
public function commentsView()
{
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('commentsView');
    $session = new \Forteroche\Blog\MessageFlash();
    $view->generer(array('post' => $post,'comments' => $comments, 'session' => $session));
    
}



public function commentAction()
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $comments = $commentManager->commentModerate();
    $view = new View('commentModerateView');
    $view->generer(array('comments' => $comments));
    
}

public function addPost(){
  
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('addPostView'); 
    $session = new \Forteroche\Blog\MessageFlash();
    $view->generer(array('post' => $post,'session' =>$session));


}   

public function otherPost($chapter,$title,$content){
  if (!empty($_POST['chapter']) && !empty($_POST['title']) && !empty($_POST['content']) ){
   $postManager = new \Forteroche\Blog\Model\PostManager();
   $newLines = $postManager->newPost($chapter,$title,$content);

   $Session = new \Forteroche\Blog\MessageFlash();     
     $Session->setFlash('Le chapitre a bien été ajouté','');
        header('Location: index.php?action=board');
        exit;
      }
        else{
          $Session = new \Forteroche\Blog\MessageFlash();
          $Session->setFlash("Tous les champs n'ont pas été remplis",''); 
          header('Location: index.php?action=addPost');
          exit;
        }
      
  
}


}