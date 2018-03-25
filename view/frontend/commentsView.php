<?php  include "menu.php";?>
    <div class="container admin add">
        <div class="row ">
            <br>
            
            <h1> Editions des Commentaires </h1>
            <br>
             <?php 
    if ($comments->rowcount() == 0) { ?>
               <div class="noRequest"> <p>il n'y a pas de commentaires</p></div>
               <div><a class="btn btn-primary btn-reduc1" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a></div>
                <?php }
while ($comment = $comments->fetch())
{
?>
                <form class="form" role="form" action="index.php?action=newComment&amp;id=
<?= htmlspecialchars($comment['id'])?>" method="post" enctype="multipart/form-data">
                    <input value="<?= htmlspecialchars($comment['author']) ?>"> le
                    <input value="<?= htmlspecialchars($comment['comment_date_fr']) ?>">
                    <?php if($comment['moderate']== '1') { ?> <a class=" btn btn-success" href="index.php?action=reability&amp;id=<?= htmlspecialchars($comment['id']) ?>"> désignaler </a>
                        <?php } else{  } ?>
                            <br/>
                            <div class="form-group">
                                <textarea id="comment" name="comment">
                          
                                    <?= nl2br(htmlspecialchars($comment['comment']))?>
                                    
                                </textarea><span class="help-inline"></span></div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Modifier"> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a><a class="btn btn-danger" href="index.php?action=eraseComment&amp;id=
<?= htmlspecialchars($comment['id'])?>"><span class="glyphicon glyphicon-remove"> Suprimer</span></a> </div>
                            <br>
                            <br> </form>
                <?php
}
?>
        </div>
    </div>
     <div class="flashconnect">
                    <?php $session->flash();?>
                </div>