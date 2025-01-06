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

            echo '$_SESSION["id"]';
        ?>
    </header>

    <body>

    </body>
</html>