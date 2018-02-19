<?php
namespace OpenClassrooms\Blog\Model;
require_once("model/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creationDate DESC LIMIT 0, 4');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
public function updatePost($postId,$content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET content = ?  WHERE id = ?');
        $reaffectedLines =$req->execute(array($postId,$content));
       return $reaffectedLines;

    }


   
}