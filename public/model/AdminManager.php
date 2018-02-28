<?php
namespace Forteroche\Blog\Model;
require_once("model/Manager.php");

class AdminManager extends Manager
{
  
    public function connected()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();
    }
    
}