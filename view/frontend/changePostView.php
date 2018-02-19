<?php $this->title = 'Editer commentaire' ?>
    <div class="news">
        <h2>Editer le commentaire</h2>
        <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?>
        </strong> le
            <?= $comment['comment_date_fr'] ?>
        </p>
        <p>
            <?= nl2br(htmlspecialchars($comment['comment']))?>
        </p>
        <form action="index.php?action=newComment&amp;id=
<?= $comment['id']?>" method="post">
            <label for="newComment">Nouveau commentaire</label>
            <br />
            <textarea id="comment" name="comment" value=""></textarea>
            <div>
                <input class="submit" type="Submit" /> </div> <a href="index.php">Annuler</a> </form>
    </div>