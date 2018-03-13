<?php
namespace Forteroche\Blog\Model;
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', '');
        return $db;
    }
    
    public function texte_decoupe( $texte, $longueur_max, $separateur ) {
    if( strlen($texte) >= $longueur_max ) {
        $texte = substr( $texte, 0, $longueur_max );
        $dernier_espace = strrpos( $texte, ' ' );
        $texte = substr( $texte, 0, $dernier_espace);
        echo $texte . ' ' . $separateur;
    }
        
     
    else echo $texte; }
    
    
    
   

}