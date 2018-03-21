    <?php  include "menu.php" ?>
        <div class="container admin add">
            <div class="row ">
                <br>
                <h1>Commentaires signalés</h1>
                <br>

                <?php 
    if ($comments->rowcount() == 0) { ?>
               <div class="noRequest"> <p>il n'y a pas de commentaires signalés</p></div>
               <div><a class="btn btn-primary btn_decale" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a></div>
                <?php } while ($comment = $comments->fetch())
{
?>
                    <form class="form" role="form" action="index.php?action=newComment&amp;id=
<?= $comment['id']?>" method="post" enctype="multipart/form-data">
                        <input value="<?= htmlspecialchars($comment['author']) ?>"> le
                        <input value="<?= htmlspecialchars($comment['comment_date_fr']) ?>"> <a class=" btn btn-success" href="index.php?action=reability&amp;id=<?= htmlspecialchars($comment['id']) ?>"> désignaler </a>
                        <br/>
                        <div class="form-group">
                            <textarea id="comment" name="comment">
                                <?=$comment['comment']?>
                            </textarea><span class="help-inline"></span></div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success btn-reduc1"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> <a class="btn btn-primary btn-reduc1" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a><a class="btn btn-danger btn-reduc1" href="index.php?action=eraseComment&amp;id=
<?= $comment['id']?>"><span class="glyphicon glyphicon-remove"> Suprimer</span></a> </div>
                        <br>
                        <br> </form>
                    <?php
}
?>
                           
    
    
            </div>
        </div>