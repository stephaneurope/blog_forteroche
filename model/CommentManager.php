<?php
namespace OpenClassrooms\Blog\Model;
require_once("model/Manager.php");

class CommentManager extends Manager
{
     public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
      public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id=?');
        $request->execute(array($commentId));
         $comment = $request->fetch();

        return $comment;
    }
    

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
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




// Insertion du message à l'aide d'une requête préparée
//$req = $bdd->prepare('UPDATE comments SET comment = ? WHERE id=?');
//$req->execute(array($_POST['comment']));

// Redirection du visiteur vers la page du minichat
//header('Location: changePostView.php');