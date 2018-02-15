<?php
namespace OpenClassrooms\Blog\Model;
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
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, creationDate) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
   
   public function updateComment($commentId,$comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $reaffectedLines =$req->execute(array($commentId,$comment));
       return $reaffectedLines;

    }
         
}