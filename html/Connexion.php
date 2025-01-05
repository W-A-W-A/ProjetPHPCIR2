<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/Connexion&Inscription.css">
    </head>

    <?php
        include_once "../php/Connexion_Inscription.php";
    ?>

    <body>
        <h1>Connexion</h1>

        <form method="post">
            <input type="email" placeholder="email@service.com" value="<?php rememberMe("email"); ?>" maxlength="40" name="email"><br>
            <input type="password" placeholder="mot de passe" maxlength="20" value="<?php rememberMe("password"); ?>" name="password"><br>
            <a href=""> mot de passe oublier? </a><br>
            <input id="button" type="submit" value="Se Connecter"><br>
            <label>remember Me</label><input type="checkbox" value="<?php rememberMe("remember"); ?>" name="remember">
        </form>
    
        <a href="Inscription.php"> Je n'ai pas de compte </a>

        <?php
            connect();
        ?>

    </body>
</html>