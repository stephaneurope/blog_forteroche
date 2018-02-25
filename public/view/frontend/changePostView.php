<?php $this->title = 'Editer commentaire' ?>
    <div class="news">
        <h2>Editer le commentaire</h2>
        <form action="index.php?action=newComment&amp;id=
<?= $comment['id']?>" method="post">
            <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?>
        </strong> le
                <?= $comment['comment_date_fr'] ?>
            </p>
            <label for="newComment">Nouveau commentaire</label>
            <br />
            <textarea id="comment" name="comment">
                <?= nl2br(htmlspecialchars($comment['comment']))?>
            </textarea>
            <div>
                <input class="submit" type="Submit" value="valider" /> </div> <a href="index.php?action=board">Annuler</a> </form>
    </div>