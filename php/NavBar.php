<?php
    include_once("../php/Requete_SQL.php");

    if (isset($_POST['search_button'])) {
        // sets the searched terms as cookies
        $searchedSpe = $_POST['searched_spe'];
        $searchedEtab = $_POST['searched_etab'];
        $searchedDoc = $_POST['searched_doc'];

        setcookie('searched_spe', "$searchedSpe", time() + 3600, "/");
        setcookie('searched_etab', "$searchedEtab", time() + 3600, "/");
        setcookie('searched_doc', "$searchedDoc", time() + 3600, "/");

        // best way i found to refresh the page from PHP
        header("Location: " . $_SERVER['PHP_SELF']);
    }


    function GetNavBar($subject, $sb_enabled=false){
        session_start(); // se connecte à la session ouverte
        // s'il y a des cookies, on les utilise
        // n'importe qui pourrait se connecter avec un id et voir ses RDV, mais la cybersécu est pas notée dans le barême

        //setcookie("id_client", 1, time() + 3600, "/"); // pour tester (ça marche)

        $nom_nb = "Prénom Nom";

        if (isset($_SESSION["id"])) {

            $id_client_nb = $_SESSION["id"];

            try {

                if ($_SESSION["doctor"]) {
                    $res = requete("SELECT name FROM Doctor WHERE id='$id_client_nb';");
                }
                else {
                $res = requete("SELECT name FROM Client WHERE id='$id_client_nb';");
                }

                if(count($res) == 0){ // si on a pas trouvé le client dans la db
                    $nom_nb = "Prénom404 Nom404";
                }
                else {
                    $nom_nb = implode($res[0]);
                }
            }
            catch(PDOException $e) {
                echo'Connexion échouée : ' . $e->getMessage();
            }
        }
        


        echo "<div id=\"navinfos\">
                <div id=\"navinfosgroup\">
                    <a href=\"Accueil.php\"><img class=\"photoprofil\" src=\"websitelogo.png\"></a>
                    <div>$subject</div>
                </div>
                <div id=\"navinfosgroup\">
                    <div>$nom_nb</div>
                    <img class=\"photoprofil\" src=\"icone_avatar.jpg\">
                </div>
            </div>";
        
        if($sb_enabled) {
            try {
                $spes = requete("SELECT speciality_name FROM Specialities;");
            }
            catch(PDOException $e) {
                echo'Connexion échouée : ' . $e->getMessage();
                $spes = ["spé1", "spé2", "spé3", "spé4"];
            }

            echo "
                <form method=\"POST\" id=\"navinput\">
                    <select name=\"searched_spe\">";
            for($i = 0; $i < count($spes); ++$i){
                $spe = implode($spes[$i]); // l'id/valeur des spés est le même que dans la DB
                $ipp = $i + 1;
                echo "  <option value=\"$ipp\">$spe</option>";
            }
            echo "  </select>
                    <input type=\"text\" name=\"searched_etab\" class=\"search-bar\" placeholder=\" établissement\">
                    <input type=\"text\" name=\"searched_doc\" class=\"search-bar\" placeholder=\" médecin\">
                    <button type=\"submit\" name=\"search_button\"> 🔎 </button>
                </form>";
        }
    }
?>