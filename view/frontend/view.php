<?php 
namespace Forteroche\Blog;
class View {

  // Nom du fichier associé à la vue
  private $fichier;
  // Titre de la vue (défini dans le fichier vue)
  private $title;

   public function __construct($action) {
    // Détermination du nom du fichier vue à partir de l'action
    $this->fichier = "view/frontend/". $action . ".php";
  }
    

  // Génère et affiche la vue
  public function generer($donnees) {
    // Génération de la partie spécifique de la vue
    $content = $this->genererFichier($this->fichier, $donnees);
    // Génération du gabarit commun utilisant la partie spécifique
    $view = $this->genererFichier('view/frontend/template.php',
      array('title' => $this->title, 'content' => $content));
     
    // Renvoi de la vue au navigateur
    echo $view;
  }
   

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFichier($fichier, $donnees) {
    if (file_exists($fichier)) {
      // Rend les éléments du tableau $donnees accessibles dans la vue
      extract($donnees);
      // Démarrage de la temporisation de sortie
      ob_start();
      // Inclut le fichier vue
      // Son résultat est placé dans le tampon de sortie
      require $fichier;
      // Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
  }
    
    
}