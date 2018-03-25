<?php
namespace Forteroche\Blog\Model;
require_once("model/Manager.php");

class PostManager extends Manager
{
   public function limitGetPosts()
   {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id,user_id, title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creationDate DESC LIMIT 0, 4 ');
     $req->execute(array());
    return $req;
}
public function getPosts()
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id,user_id, title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creationDate ');
    $req->execute(array());
    return $req;
}

public function getPost($postId)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id,user_id,  title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y-\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}
public function updatePost($postId,$content,$title,$chapter)
{
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET content = ?, title = ?, chapter = ?  WHERE id = ? ');
    $reaffected =$req->execute(array($content,$title,$chapter,$postId));
    return $reaffected;

}
public function deletePost($postId){
  $db = $this->dbConnect();
  $req = $db->prepare('DELETE FROM posts  WHERE id = ?'); 
  $deleteLines= $req->execute(array($postId));
  return $deleteLines;
}
public function newPost($chapter,$title,$content)
{
  $db = $this->dbConnect();
  $posts = $db->prepare('INSERT INTO posts(chapter, title, content, creationDate) VALUES(?, ?, ?, NOW())');
  $newLines = $posts->execute(array($chapter,$title,$content));
  return $newLines;
}




}