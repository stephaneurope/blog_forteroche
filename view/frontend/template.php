<?php
 
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT id,user_id, title,chapter, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creationDate ');?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
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
        <link rel="stylesheet" href="public/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bangers|Faster+One|Fontdiner+Swanky|Frijole|Henny+Penny|Monoton|Montserrat+Subrayada|Permanent+Marker" rel="stylesheet">
        <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=i9qtcs3a3bdsajmuw9vustqee9f5wd2z1pnc8mpv2bjzzzn0
"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=i9qtcs3a3bdsajmuw9vustqee9f5wd2z1pnc8mpv2bjzzzn0"></script>
        <script>
            tinymce.init({
                selector: "textarea"
                , selector: "textarea:not(.mceNoEditor)"
                , theme: 'modern'
                , entity_encoding: "raw"
                , plugins: 'lists advlist image imagetools'
            });
        </script>
    </head>
    <title>
        <?= $title ?>
    </title>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <?php if (!$_SESSION) { ?>
                        <ul class="nav navbar-nav">
                            <li><a href="#about" class="billet">Billet simple pour l'Alaska</a></li>
                            <li><a href="index.php"><i class="fa fa-home"></i>Accueil</a></li>
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index.php?action=chapterList" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Chapitres
        </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <?php while ($data = $reponse->fetch())
{
?>
                                        <a action="" class="dropdown-item" href="#">
                                            <?php echo $data['chapter']; ?>
                                        </a>
                                        <?php
}
$reponse->closeCursor(); // Termine le traitement de la requête ?>
                                </div>
                            </li>
                            <li><a href="index.php?action=connect"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
                        </ul>
                        <?php } else { ?>
                            <ul class="nav navbar-nav">
                                <li><a href="#about" class="billet">Billet simple pour l'Alaska</a></li>
                                <li><a href="index.php"><i class="fa fa-home"></i>Accueil</a></li>
                                <li><a href="index.php?action=board">Board</a></li>
                                <li><a href="index.php?action=deconnexion"><i class="fa fa-sign-in" aria-hidden="true"></i>Déconnexion</a></li>
                            </ul>
                            <?php } ?>
                </div>
            </div>
        </nav>
        <div>
            <?= $content ?>
        </div>
        <footer id="footer" class="navbar-fixed-bottom">
            <p>©forteroche</p>
        </footer>
    </body>

    </html>