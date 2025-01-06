<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/Connexion&Inscription.css">
    </head>
    
    <body></body>
        <h1>Inscription</h1>

        <form method="post" action="Inscription.php">
            <input id="names" type="text" placeholder="nom" maxlength="20" name="nom" required>
            <input id="names" type="text" placeholder="prenom" maxlength="20"name="prenom" required><br>
            <input type="number" placeholder="telephone" name="telephone" required><br>
            <input type="email" placeholder="email@service.com" maxlength="40" name="email" required><br>
            <input type="password" placeholder="email-verif@service.com" maxlength="40" name="email-verif" required><br>
            <input type="password" placeholder="mot de passe" maxlength="20" name="password" required><br>
            <label>Patient</label><input type="radio" name="Utilisation" value="patient" checked><label>Medecin</label><input type="radio" name="Utilisation" value="medecin"><br>
            <input id="button" type="submit" value="S'inscrire">
        </form>
    
        <a href="Connexion.php"> J'ai déja un compte </a>

        <?php
            //error_reporting(E_ALL);
            //ini_set('display_errors', 1);
        
            include_once "../php/Connexion_Inscription.php";

            if( isMailValid() == TRUE ) {
                createAccount();
            }
        ?>
    </body>
</html>