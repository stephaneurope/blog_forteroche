<?php $this->title = 'Editer le chapitre' ?>
    <div class="news">
        <h2>Editer le chapitre</h2>
        <h3>
        <?= htmlspecialchars($post['chapter']) ?> :
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content']))?>
        </p>
        <form action="index.php?action=modifPost&amp;id=
<?= $post['id']?>" method="post">
            <label for="modifPost">Réactualisation du chapitre</label>
            <br />
            <textarea id="content" name="content" value=""></textarea>
            <div>
                <input class="submit" type="submit" /> </div> <a href="index.php">Annuler</a> </form>
    </div>