<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/Connexion&Inscription.css">
    </head>
    
    <body></body>
        <h1>Inscription</h1>

        <form method="post">
            <input id="names" type="text" placeholder="nom" maxlength="20" name="nom">
            <input id="names" type="text" placeholder="prenom" maxlength="20"name="prenom"><br>
            <input type="number" placeholder="telephone" name="telephone"><br>
            <input type="email" placeholder="email@service.com" maxlength="40" name="email"><br>
            <input type="password" placeholder="email-verif@service.com" maxlength="40" name="email-verif"><br>
            <input type="password" placeholder="mot de passe" maxlength="20" name="password"><br>
            <label>Patient</label><input type="radio" name="Utilisation"><label>Medecin</label><input type="radio" name="Utilisation"><br>
            <input id="button" type="submit" value="S'inscrire">
        </form>
    
        <a href="Connexion.php"> J'ai déja un compte </a>

        <?php
            include_once "../php/Connexion&Inscription";

            if(isset($_POST["email"])) {
                createAccount($_POST["nom"], $_POST["prenom"], $_POST["telephone"], $_POST["email"], $_POST["password"], $_POST["Utilisation"]);
            }
        ?>
    </body>
</html>