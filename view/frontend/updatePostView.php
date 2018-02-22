<?php $this->title = 'Editer le chapitre' ?>
    <div class="news">
        <h2>Editer le chapitre</h2>
        <h3>
        <?= htmlspecialchars($post['chapter']) ?> :
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content']))?>
        </p>
    </div>
    <div class="container admin add">
        <div class="row ">
            <h1><strong>Modifier ce chapitre </strong></h1>
            <br>
            <form class="form" role="form" action="index.php?action=modifPost&amp;id=
<?= $post['id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Chapitre:</label>
                    <input type="text" class="form-control" id="name" name="chapter" placeholder="Chapitre" value=""> <span class="help-inline"></span> </div>
                <div class="form-group">
                    <label for="description">Titre:</label>
                    <input type="text" class="form-control" id="description" name="title" placeholder="Titre" value=""> <span class="help-inline"></span> </div>
                <div class="form-group">
                    <label for="description">Contenu:</label>
                    <textarea type="text" class="form-control" name="content" value=""></textarea> <span class="help-inline"></span> </div>
                <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            </form>
        </div>
    </div>