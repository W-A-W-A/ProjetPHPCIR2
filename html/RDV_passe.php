<!DOCTYPE html>
<head>
    <meta charset="utf-8"> <!-- Évite de faire des trics bizarres en PHP -->
    <link rel="stylesheet" href="../css/Commun.css">
    <link rel="stylesheet" href="../css/RDV.css">
</head>
<html>
    <body>
        <header>
            <!-- Si le code PHP ci-dessous apparaît comme un commentaire dans l'inspecteur du navigateur, il faut installer l'interprêteur sur la même machine que Apache -->
            <?php
                include_once("../php/Redirect_Connexion.php");
                isConnected();

                include('../php/NavBar.php');
                GetNavBar("Vos rendez-vous passés");
            ?>
        </header>
        
        <main class="bg-dark">
            <div class="bubbleslist">
                <?php 
                    include('../php/PastApps.php');
                    GetPastAppointements();
                ?>
            </div>
        </main>
    </body>
</html>