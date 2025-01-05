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
                include_once('../php/NavBar.php');
                include_once('../php/DocSpecApps.php');
                $nom_doc = getDoctor();
                GetNavBar("Prendre rendez-vous avec $nom_doc");
            ?>
        </header>
        
        <main>
            <!-- NOTE : on laisse tomber les bulles rétractables, c'est trop d'efforts pour rien, c'était une idée nulle de ma part -->
            <div class="bubbleslist">
                <?php 
                    include_once('../php/DocSpecApps.php');
                    //getExampleAvailabilities();
                    GetAvailabilities();
                ?>
            </div>
        </main>
    </body>
</html>