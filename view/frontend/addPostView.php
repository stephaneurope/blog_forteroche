<?php 
session_start();?>
    <div class="container admin add">
        <div class="row ">
            <h1><strong>Ajouter un chapitre </strong></h1>
            <br>
            <form class="form" role="form" action='index.php?action=otherPost' method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Chapitre:</label>
                    <input type="text" class="form-control" name='chapter' placeholder="Chapitre"> <span class="help-inline"></span> </div>
                <div class="form-group">
                    <label for="description">Titre:</label>
                    <input type="text" class="form-control" name='title' placeholder="Titre"> <span class="help-inline"></span> </div>
                <div class="form-group">
                    <label for="description">Contenu:</label>
                    <textarea type="text" class="form-control" name='content' placeholder="Contenu"></textarea> <span class="help-inline"></span> </div>
                <br>
                <div class="form-actions"> <a href="" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</a> <a class="btn btn-primary" href="index.php?action=board"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            </form>
        </div>
    </div>