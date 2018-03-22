<?php 

require_once('app/MessageFlash.php');
$Session = new \Forteroche\Blog\Session();


?>
    <?php $this->title = htmlspecialchars($post['title']) ?>
        <?php  include "menu.php" ?>
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
            <?= htmlspecialchars($post['title']) ?> <em>le <?= $post['creation_date_fr'] ?></em> </h3>
                <div class='post'>
                    <?= $post['content'] ?>
                        <br/>
                        <br/><a href="index.php">Retour à la liste des chapitres</a></div>
            </div>
            <div class="comment">
                <h3>Commentaires</h3></div>
           <?php 
    if ($comments->rowcount() == 0) { ?>
               <div class="noComment"> <p>Il n'y a pas encore de commentaires </p></div>
                <?php }
while ($comment = $comments->fetch())
{
?>
                <div class="modif">
                    <p style='margin-bottom:0;'><strong><?= htmlspecialchars($comment['author']) ?></strong> le
                        <?= $comment['comment_date_fr'] ?>
                    </p>
                    <?php if($comment['moderate']== '0') { ?>
                        <form action="index.php?action=moderate&amp;id=
<?= htmlspecialchars($comment['id']) ?>" method="post">
                            <input href="#" class='signal' type="submit" value='signaler' /> </form>
                        <?php } else{ ?>
                            <form action="" method="post">
                                <input class='signal' type="submit" value='signalé' style='color:red' /> </form>
                            <?php } ?>
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
<?= htmlspecialchars($post['id'])?>" method="post">
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
                            <div class="flash">
                                <?php $Session->flash();?>
                            </div>
                        </form>
                    </div>