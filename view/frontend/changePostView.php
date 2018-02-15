<?php $title = 'Mon blog'; ?>
    <?php ob_start(); ?>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
        <h2>Editer le commentaire</h2>
        <?php
 $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
$comment = $commentManager->getComment($_GET['id']);?>
            <p><strong><?= htmlspecialchars($comment['author']) ?>
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
                    <input type="Submit" /> </div>
            </form>
            <?php
$content = ob_get_clean(); ?>
                <?php require('template.php'); ?>