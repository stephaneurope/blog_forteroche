<div class="container delete">
    <div class="row">
        <h1><strong>Supprimer un chapitre </strong></h1>
        <br>
        <form class="form" role="form" action="erasePost" method="post">
            <input type="hidden" name="id" value="<?= $post['id'] ?>" />
            <p class="alert-warning">Etes vous sur de vouloir supprimer?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">Oui</button> <a class="btn btn-danger" href="index.php?action=board">Non</a> </div>
        </form>
    </div>
</div>