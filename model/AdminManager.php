<?php
namespace Forteroche\Blog\Model;
require_once("model/Manager.php");

class AdminManager extends Manager
{
  
    public function connected($pseudo,$pass_hache)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo'); 
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();
         return $resultat;
    }
    
}