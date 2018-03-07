<?php 
session_start();?>
    <div id="login" class="span3 well well-large offset4">
        <div class="centreConnect">
            <h4>Connexion</h4>
            <br>
            <form action="index.php?action=connexion" class="form" method="post">
                <input type="text" placeholder="Pseudo" name="pseudo" />
                <br>
                <br>
                <input type="password" placeholder="Password" name="pass" required/>
                <br>
                <br>
                <input class="btn btn-success" type="submit" value="Login" required /> </form>
        </div>
    </div>