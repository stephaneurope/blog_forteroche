<?php  include "menu.php"; ?>
    <?php $this->title = 'Editer le chapitre' ?>
        <div class="container admin add">
            <div class="row ">
                <h1><strong>Modifier ce chapitre </strong></h1>
                <br>
                <div class="flashconnect">
                                <?php $session->flash();?>
                            </div>
                <form class="form" role="form" action="index.php?action=modifPost&amp;id=
<?= $post['id']?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Chapitre:</label>
                        <input type="text" class="form-control" id="name" name="chapter" placeholder="Chapitre" value="<?= htmlspecialchars($post['chapter']) ?>"> <span class="help-inline"></span> </div>
                    <div class="form-group">
                        <label for="description">Titre:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?= htmlspecialchars($post['title']) ?>"> <span class="help-inline"></span> </div>
                    <div class="form-group">
                        <label for="description">Contenu:</label>
                        <textarea type="textarea" class="form-control" id="content" name="content">
                            <?= $post['content']?>
                        </textarea>  </div>
                    <br>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success" value="Modifier"> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
                </form>
            </div>
        </div>