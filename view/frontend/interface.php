<div>
    <div class="container admin">
        <div class="row">
            <h1><strong>Tableau de bord</strong><a href="index.php?action=addPost" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter un chapitre</a></h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Chapitres</th>
                        <th>Titre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = $posts->fetch())
{
?>
                        <tr>
                            <td>
                                <?= $data['chapter'] ?>
                            </td>
                            <td>
                                <?= $data['title']?>
                            </td>
                            <td width=30%> <a class="btn btn-primary" href="index.php?action=editPost&id=<?= $data['id']?>"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> <a class="btn btn-danger" href="index.php?action=cleanPost&id=<?= $data['id']?>"><span class="glyphicon glyphicon-remove"></span> Suprimer</a> </td>
                        </tr>
                        <?php
}
?>
                </tbody>
            </table>
        </div>
    </div>