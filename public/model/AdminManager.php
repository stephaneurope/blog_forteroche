<?php
namespace Forteroche\Blog\Model;
require_once("model/Manager.php");

class AdminManager extends Manager
{
  
    public function connected($pseudo,$pass_hache)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo AND pass = :pass'); 
        $req->execute(array('pseudo' => $pseudo, 'pass' => $pass_hache));
        $resultat = $req->fetch();
         return $resultat;
    }
    
}