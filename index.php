<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Billet simple pour l'alaska</title>
    <meta name="author" content="Serri Stephan" />
    <meta name="description" content="Découvrez chaque mois un chapitre de mon livre." />
    <meta name="copyright" content="©forteroche" />
    <meta property="og:title" content="Billet simple pour l'alaska" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Découvrez chaque mois un chapitre de mon livre." />
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Découvrez chaque mois un chapitre de mon livre.">
    <meta name="twitter:description" content="Découvrez chaque mois un chapitre de mon livre.">
    <meta name="twitter:creator" content="Serri Stephan">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="img/velovicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers|Faster+One|Fontdiner+Swanky|Frijole|Henny+Penny|Monoton|Montserrat+Subrayada|Permanent+Marker" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
</head>

<body></body>

</html>
<?php
require('controller/frontend.php');

try{
    if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
        elseif ($_GET['action'] == 'comment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            comment();
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
        
elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
        elseif ($_GET['action'] == 'newComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['comment'])) {
                newComment($_POST['comment'],$_GET['id']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de commentaire envoyé';
        }
    }
        elseif ($_GET['action'] == 'editComment'){
           if (isset($_GET['id']) && $_GET['id'] > 0) {
              
                changeComment($_GET['id']);
               
              
         
           } else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            
           } 
        }else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    
        
        
}else {
    listPosts();
}
}
catch(Exception $e){ // S'il y a eu une erreur, alors...
   $errorMessage = $e->getMessage();
    require('view/errorView.php');
}