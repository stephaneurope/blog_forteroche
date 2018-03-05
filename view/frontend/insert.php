<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
    <script src="JS/script.js"></script>
</head>

<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1><strong>Ajouter un item </strong></h1>
            <br>
            <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name ;?>"> <span class="help-inline"><?php echo $nameError ;?></span> </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description ;?>"> <span class="help-inline"><?php echo $descriptionError ;?></span> </div>
                <div class="form-group">
                    <label for="price">Prix: (en Euro)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price ;?>"> <span class="help-inline"><?php echo $priceError ;?></span> </div>
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select class="form-control" id="category" name="category">
                        <?php
                            $db = Database::connect();
                            foreach($db->query('SELECT * FROM categories')as $row)
                            {
                               echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                         
                            ?>
                    </select> <span class="help-inline"><?php echo $categoryError ;?></span> </div>
                <div class="form-group">
                    <label for="image">Sélectionner une image:</label>
                    <input type="file" id="image" name="image"> <span class="help-inline"><?php echo $imageError;?></span> </div>
                <br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button> <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> </div>
            </form>
        </div>
    </div>
</body>

</html>