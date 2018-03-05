<?php 
session_start();?>
    <?php $this->title = htmlspecialchars($post['title']) ?>
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
            <div class="modif">
                <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?></strong> le
                    <?= $comment['comment_date_fr'] ?>
                </p>
                <form action="index.php?action=moderate&amp;id=<?= htmlspecialchars($comment['id']) ?>" method="post">
                    <input class='signal' type="submit" value='signaler' /><i class="fa fa-flag signal"></i> </form>
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
                            <textarea class="mceNoEditor" id="comment" name="comment"></textarea>
                        </div>
                        <div>
                            <input class='submit' type="submit" value="Valider" /> </div>
                    </form>
                </div>