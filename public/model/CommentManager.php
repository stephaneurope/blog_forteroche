<?php
namespace Forteroche\Blog\Model;
require_once("model/Manager.php");

class CommentManager extends Manager
{
     public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY creationDate DESC');
        $comments->execute(array($postId));

        return $comments;
    }
      public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id=?');
        $request->execute(array($commentId));
         $comment = $request->fetch();

        return $comment;
    }
    

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment,creationDate) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
   
   public function updateComment($commentId,$comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $Lines =$req->execute(array($commentId,$comment));
       return $Lines;

    }
   public function boolean($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET moderate = 1 WHERE id = ?');
         $comment =$req->execute(array($commentId));
       return $comment;
    }
    public function demoderate($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET moderate = 0 WHERE id = ?');
         $comment =$req->execute(array($commentId));
       return $comment;
    }
    
    public function commentModerate($moderate){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE moderate=1');
         
       return $req;
    }
    
    public function deleteComment($commentId)
    {
      $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments  WHERE id = ?'); 
        $deleteComment=$req->execute(array($commentId));
        return $deleteComment;
    }
    
}
