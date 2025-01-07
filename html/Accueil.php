<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/Connexion&Inscription.css">
        <link rel="stylesheet" href="../css/RDV.css"> 
    </head>

    <header>
        <?php
            include_once("../php/Redirect_Connexion.php");
            isConnected();

            include_once('../php/NavBar.php');
            GetNavBar("Acceuil");
        ?>
    </header>

    <body>
        <a href="Recherche_RDV.php">Recherchez un Rendez Vous</a>
        <a href="RDV_passe.php">Vos Rendez Vous Passez</a>
        <a href="RDV_medecin.php">Prendre Rendez Vous Avec</a>
    </body>
</html>