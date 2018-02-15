<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title ?>
    </title>
    <link href="public/css/style.css" rel="stylesheet" /> </head>

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
    <div id="container">
        <div col-md-12><img id="paysage" src="/forteroche/images/landscape.jpg" class="img-responsive" alt="Responsive image"></div>
    </div>
    <?= $content ?>
        <footer id="footer">
            <p>jeanforteroche</p>
        </footer>
</body>

</html>