<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');

class BackendController{
  
function addComment($postId, $author, $comment)
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    
        header('Location: index.php?action=post&id=' . $postId);
    
}
    function changeComment($commentId) 
{ 
    $commentManager = new \Forteroche\Blog\Model\CommentManager();
$comment = $commentManager->getComment($_GET['id']);
    $view = new View('changePostView'); 
    $view->generer(array('comment' => $comment));
}
    
function newComment($commentId,$comment)
{
    $commentManager = new \Forteroche\Blog\Model\CommentManager();

    $reaffectedLines = $commentManager->updateComment($commentId,$comment);

   
        header('Location: index.php?action=editComment&id=' . $comment . '&postId='. $postId);
    
}
    
    function changePost($postId) 
{ 
    $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    $view = new View('updatePostView'); 
    $view->generer(array('post' => $post));
}
    
    function modifPost($postId,$content,$title,$chapter)
{
    $postManager = new \Forteroche\Blog\Model\PostManager();

    $reaffectedLines = $postManager->updatePost($postId,$content,$title,$chapter);

   
        header('Location: index.php?action=board');
    
}
    function cleanPost($postId){
     $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    $view = new View('deletePostView'); 
    $view->generer(array('post' => $post));
        }
 function erasePost($postId){
     $postManager = new \Forteroche\Blog\Model\PostManager();
    $deleteLines = $postManager->deletePost($_GET['id']);
 header('Location: index.php?action=board');


}
    function addPost(){
   $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('addPostView'); 
    $view->generer(array('post' => $post));
        }
     function connect(){
   $postManager = new \Forteroche\Blog\Model\PostManager();
    $post = $postManager;
    $view = new View('connectView'); 
    $view->generer(array('post' => $post));
        }
    
}