<?php 
$ctrlfrontend = new FrontendController;
$this->title = 'Billet simple pour l\'Alaska' ?>
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
                <?= $ctrlfrontend->texte_decoupe(nl2br(htmlspecialchars($data['content'])), 500, '[...]') ?>
                    <br/>
                    <br/> <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre...</a></em> </p>
        </div>
        <?php
}
$posts->closeCursor();
?>