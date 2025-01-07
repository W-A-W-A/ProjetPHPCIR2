<html>
    <head>
        <link rel="stylesheet" href="../css/Commun.css">
        <link rel="stylesheet" href="../css/RDV.css"> 
    </head>

    <header>
        <?php
            include_once("../php/Redirect_Connexion.php");
            isConnected();

            include_once('../php/NavBar.php');
            GetNavBar("Accueil");
        ?>
    </header>

    <body><br>
        <div class="d-flex flex-row mb-3 justify-content-evenly align-self-stretch" style="height: 10rem;">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="icone_avatar.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Recherchez un rendez-vous</h5>
                    <p class="card-text">Prenez rendez-vous avec le médecin de votre choix sur notre platforme !</p>
                    <a href="Recherche_RDV.php" class="btn btn-primary">RECHERCHER</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="websitelogo.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Vos rendez-vous passés</h5>
                    <p class="card-text">Prenez rendez-vous avec les médecins que vous avez précédemment consulté.</p>
                    <a href="RDV_passe.php" class="btn btn-primary">VOIR</a>
                </div>
            </div>
        </div>
    </body>
</html>