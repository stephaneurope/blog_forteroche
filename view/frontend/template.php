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
    <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
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
                <ul class="nav navbar-nav">
                    <li><a href="#about">Billet simple pour l'Alaska</a></li>
                    <li><a href="#portfolio">Accueil</a></li>
                    <li><a href="#recommandations">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Intro Header -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">Jean Forteroche</h1>
                        <p class="intro-text">Billet simple pour l'Alaska</p>
                        <a href="#about" class="btn btn-circle js-scroll-trigger"> <i class="fa fa-angle-double-down animated"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--<div id="container" class="blocImage">
        <div col-md-12><img id="paysage" src="/forteroche/images/landscape.jpg" class="img-responsive" alt="Responsive image">
           
        </div>
    </div>-->
    <div>
        <?= $content ?>
    </div>
    <footer id="footer">
        <p>jeanforteroche</p>
    </footer>
</body>

</html>