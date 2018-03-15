<?php
    namespace Forteroche\Blog;
    // Chargement des classes
    require_once('model/PostManager.php');
    require_once('model/CommentManager.php');
    require_once('view/frontend/view.php');
    require_once('controller/SessionController.php');

    class BackendController{
      

        public function changeComment($commentId) 
    { 
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        $view = new View('changePostView'); 
        $view->generer(array('comment' => $comment));
            header('Location: index.php?action=commentsView&id='.$commentId);
      
    }
        
        public function newComment($commentId,$comment)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $reaffectedLines = $commentManager->updateComment($commentId,$comment);
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        header('Location: index.php?action=commentsView&id='. $postId);
              
    }
        public function eraseComment($commentId)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->getComment($_GET['id']);
        $postId = $comment['post_id'];
        $deleteComment = $commentManager->deleteComment($commentId);
        
        $postId = $comment['post_id'];
      
        header('Location: index.php?action=commentsView&id='. $postId);
     
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
        header('Location: index.php?action=editPost&id='. $postId);
       exit;
        
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
        
    public function reability($commentId)
    {
        $commentManager = new \Forteroche\Blog\Model\CommentManager();
        $comment = $commentManager->demoderate($_GET['id']);
            header('Location: index.php?action=commentAction'); 
        }
        
        
         public function connect(){
       $postManager = new \Forteroche\Blog\Model\PostManager();
        $post = $postManager;
       $chapters = $postManager->getPosts();  
        $view = new View('connectView'); 
        $view->generer(['post' => $post,'chapters'=>$chapters]);
             
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
        $view->generer(array('post' => $post));
            }   
     public function otherPost($chapter,$title,$content){
         $postManager = new \Forteroche\Blog\Model\PostManager();
        $newLines = $postManager->newPost($chapter,$title,$content);
         $view = new View('addPostView'); 
         header('Location: index.php?action=board');
        
    }   
        
        
        
    }