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
                            <?php while ($data = $chapters->fetch())
{
?>
                                <a action="" class="dropdown-item" href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                                    <?php echo $data['chapter']; ?>
                                </a>
                                <?php
}
$chapters->closeCursor();?>
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