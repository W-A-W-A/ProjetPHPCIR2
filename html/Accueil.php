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
            GetNavBar("Acceuil");
        ?>
    </header>

    <body><br>
        <div class="d-flex flex-row mb-3 justify-content-evenly align-self-stretch" style="height: 10rem;">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="icone_avatar.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Recherchez un Rendez Vous</h5>
                    <p class="card-text">Prenez rendez vous avec le medecin sur notre platforme.</p>
                    <a href="Recherche_RDV.php" class="btn btn-primary">Accedez</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="websitelogo.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Vos Rendez Vous Passez</h5>
                    <p class="card-text">Prenez rendez vous avec les medecin que vous avez consulté précedament.</p>
                    <a href="RDV_passe.php" class="btn btn-primary">Accedez</a>
                </div>
            </div>
        </div>
    </body>
</html>