<?php 

require_once('app/MessageFlash.php');
$Session = new \Forteroche\Blog\Session();
?>
    <?php  include "menu.php"?>
        <div>
            <div class="container admin">
                <div class="flashconnect">
                    <?php $Session->flash();?>
                </div>
                <div class="row">
                    <h1><strong>Tableau de bord</strong><a href="index.php?action=addPost" class="btn btn-success btn-lg pad"><span class="glyphicon glyphicon-plus"></span> Ajout chapitre</a><a href="index.php?action=commentAction" class="btn btn-warning pad"><span class="glyphicon glyphicon-thumbs-down"></span> signalement</a></h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Chapitres</th>
                                <th>Titre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = $posts->fetch()){ ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($data['chapter']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($data['title'])?>
                                    </td>
                                    <td width=50%> <a class="btn btn-info btn-reduc" href="index.php?action=commentsView&id=<?= $data['id']?>"><span class="glyphicon glyphicon-pencil"></span> Commentaires</a> <a class="btn btn-primary btn-reduc" href="index.php?action=editPost&id=<?= $data['id']?>"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> <a class="btn btn-danger btn-reduc" href="index.php?action=cleanPost&id=<?= $data['id']?>"><span class="glyphicon glyphicon-remove"></span> Suprimer</a> </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>