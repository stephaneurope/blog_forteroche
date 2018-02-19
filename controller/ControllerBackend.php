<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');

class BackendController{
  
function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    
        header('Location: index.php?action=post&id=' . $postId);
    
}
    function changeComment($commentId) 
{ 
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
$comment = $commentManager->getComment($_GET['id']);
    $view = new View('changePostView'); 
    $view->generer(array('comment' => $comment));
}
    
function newComment($commentId,$comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $reaffectedLines = $commentManager->updateComment($commentId,$comment);

   
        header('Location: index.php?action=editComment&id=' . $comment . '&postId='. $postId);
    
}
    
    function changePost($postId) 
{ 
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $post = $postManager->getPost($_GET['id']);
    $view = new View('updatePostView'); 
    $view->generer(array('post' => $post));
}
    
    function modifPost($postId,$content)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $reaffectedLines = $postManager->updatePost($postId,$content);

   
        header('Location: index.php?action=editPost&id=2');
    
}


}