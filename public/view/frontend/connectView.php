<?php 



$db = $pdo->('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', '');
        return $db;
$req = $db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
$req->execute(array('pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}?>
    <div id="login" class="span3 well well-large offset4">
        <div class="tt">
            <h4>Connexion</h4>
            <br>
            <form action="" class="form" method="post">
                <input type="text" placeholder="Email" />
                <br>
                <br>
                <input type="password" placeholder="Password" required/>
                <br>
                <br>
                <input class="btn btn-success" type="submit" value="Login" required /> </form>
        </div>
    </div>