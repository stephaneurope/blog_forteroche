<?php  include "menu.php" ?>
<div class="container delete">
    <div class="row">
        <div class="clear">
            <h1><strong>Supprimer un chapitre </strong></h1>
            <br>
            <form class="form" role="form" action="index.php?action=erasePost&amp;id=
<?= $post['id']?>" method="post">
                <p class="alert-warning">Etes vous sur de vouloir supprimer?</p>
                <div class="form-actions">
                    <div class="warning">
                        <input type="submit" class="btn btn-warning" href="index.php?action=board" value='Oui' /> <a class="btn btn-danger" href="index.php?action=board">Non</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>