<div class="comment">
    <br>
    <br>
    <br>
    <br>
    <br>
    <h3>Commentaires du <?= htmlspecialchars($post['chapter'])?>:<?= htmlspecialchars($post['title']) ?></h3></div>
<?php
while ($comment = $comments->fetch())
{
?>
    <div class="modif">
        <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?></strong> le
            <?= $comment['comment_date_fr'] ?>
                <a href="index.php?action=editComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $post['id'] ?>"> <i class="fa fa-flag"></i> modifier</a>
        </p>
        <p>
            <?= nl2br(htmlspecialchars($comment['comment']))?>
        </p>
    </div>
    <?php
}
?>