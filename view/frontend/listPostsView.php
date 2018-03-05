<?php 
session_start();?>
    <?php 

$manager = new \Forteroche\Blog\Model\Manager;
$this->title = 'Billet simple pour l\'Alaska' ?>
        <!-- Intro Header -->
        <header class="masthead">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <h1 class="brand-heading">Jean Forteroche</h1>
                            <p class="intro-text">Billet simple pour l'Alaska</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php while ($data = $posts->fetch())
{
?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['chapter']) ?> :
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
                <p>
                    <?= $manager->texte_decoupe(nl2br(htmlspecialchars($data['content'])), 500, '[...]') ?>
                        <br/>
                        <br/> <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre...</a></em> </p>
            </div>
            <?php
}
$posts->closeCursor();
?>