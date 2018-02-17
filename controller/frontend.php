<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
 require_once('view/frontend/view.php');

class FrontendController{
  
   
    
function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    $view = new View('listPostsView');
   $view->generer(array('posts' => $posts));
    
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $view = new View('postView');
   $view->generer(array('post' => $post,'comments' => $comments));
   

    
}
function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function newComment($comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $reaffectedLines = $commentManager->updateComment($commentId,$comment);

    if ($reaffectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $commentId);
    }
}
function comment()
{
     $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
$comment = $commentManager->getComment($_GET['id']); require('view/frontend/changePostView.php'); } 

function changeComment($commentId) 
{ require('view/frontend/changePostView.php'); }
    
    }