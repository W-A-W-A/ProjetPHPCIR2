<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/Connexion&Inscription.css">
    </head>

    <?php
        //error_reporting(E_ALL);
        //ini_set('display_errors', 1);

        include_once "../php/Connexion_Inscription.php";
    ?>

    <body class="bg-dark">
        <h1>Connexion</h1>

        <form method="post" action="Connexion.php">
            <input type="email" placeholder="email@service.com" value="<?php rememberMe("email"); ?>" maxlength="40" name="email" required><br>
            <input type="password" placeholder="mot de passe" maxlength="20" value="<?php rememberMe("password"); ?>" name="password" required><br>
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> mot de passe oublier? </a><br>
            <input id="button" type="submit" value="Se Connecter"><br>
            <label>remember Me</label><input type="checkbox" value="<?php rememberMe("remember"); ?>" name="remember">
        </form>
    
        <a href="Inscription.php"> Je n'ai pas de compte </a>

        <!-- Modal Change Passord-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mot de Passe oubliée ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Veuillez remplir ce formulaire afin de pouvoir changer votre mot de passe.</p>
                        <form method="post">
                            <input type="email" placeholder="email@service.com" maxlength="40" name="recov-email" required><br>
                            <input type="tel" placeholder="00 00 00 00 00" maxlength="12" name="recov-phone" required><br>
                            <label>Patient</label><input type="radio" name="Utilisation" value="patient" checked><label>Medecin</label><input type="radio" name="Utilisation" value="medecin"><br>
                            <input type="text" placeholder="Nouveau Mot de Passe" maxlength="40" name="recov-password" required><br>
                            <input id="button" type="submit" value="Valider"><br>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if (isset($_POST["email"])) {
                connect();
            }

            // Change forgoten password unfinished
            if (isset($_POST["revoc-email"])) {
                updatePassword();
            }
        ?>
    </body>
</html>