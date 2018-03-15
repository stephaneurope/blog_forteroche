<?php
namespace Forteroche\Blog\Model;
class Cut
{
    
    public function texte_decoupe( $texte, $longueur_max, $separateur ) {
    if( strlen($texte) >= $longueur_max ) {
        $texte = substr( $texte, 0, $longueur_max );
        $dernier_espace = strrpos( $texte, ' ' );
        $texte = substr( $texte, 0, $dernier_espace);
        echo $texte . ' ' . $separateur;
    }
        
     
    else echo $texte; }

}

