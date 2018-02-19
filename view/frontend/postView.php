<?php $this->title = htmlspecialchars($post['title']) ?>
    <div class="news">
        <h3>
        <?= htmlspecialchars($post['chapter']) ?> :
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
                <br/>
                <br/><a href="index.php">Retour à la liste des chapitres</a> </p>
    </div>
    <div class="comment">
        <h3>Commentaires</h3></div>
    <?php
while ($comment = $comments->fetch())
{
?>
        <div class="news">
            <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?></strong> le
                <?= $comment['comment_date_fr'] ?><a class="modif" href="index.php?action=editComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>"> modifier</a></p>
            <p>
                <?= nl2br(htmlspecialchars($comment['comment']))?>
            </p>
        </div>
        <?php
}
?>
            <div class="comment">
                <h3>Laissez un commentaire</h3></div>
            <div class="news">
                <form action="index.php?action=addComment&amp;id=
<?= $post['id']?>" method="post">
                    <div>
                        <label for="author">Auteur</label>
                        <br />
                        <input class='auth' type="text" id="author" name="author" /> </div>
                    <div>
                        <label for="comment">Commentaire</label>
                        <br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input class='submit' type="submit" /> </div>
                </form>
            </div>