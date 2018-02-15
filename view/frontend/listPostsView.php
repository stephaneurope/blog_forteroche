<?php $title = 'Mon blog'; ?>
    <?php ob_start(); ?>
        <?php

while ($data = $posts->fetch())
{
?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['chapter']) ?> :
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
                <p>
                    <?= nl2br(htmlspecialchars($data['content'])) ?>
                        <br/>
                        <br/> <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre...</a></em> </p>
            </div>
            <?php
}
$posts->closeCursor();
?>
                <?php $content = ob_get_clean(); ?>
                    <?php require('view/frontend/template.php'); ?>