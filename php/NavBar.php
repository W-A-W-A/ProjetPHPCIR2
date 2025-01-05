<?php
    include_once("../php/Requete_SQL.php");

    function GetNavBar($subject, $sb_enabled=false){
        session_start(); // se connecte à la session ouverte
        // s'il y a des cookies, on les utilise
        // n'importe qui pourrait se connecter avec un id et voir ses RDV, mais la cybersécu est pas notée dans le barême

        //setcookie("id_client", 1, time() + 3600, "/"); // pour tester (ça marche)

        $nom_nb = "Prénom Nom";
        if (isset($_COOKIE["id_client"])) {
            $id_client_nb = $_COOKIE["id_client"];
            try {
                $res = requete("SELECT name FROM Client WHERE id='$id_client_nb';");
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
                    <img class=\"photoprofil\" src=\"websitelogo.png\">
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

            echo "<div id=\"navinput\">
                <select name=\"spécialité\">";
            for($i = 0; $i < count($spes); ++$i){
                $spe = implode($spes[$i]); // l'id/valeur des spés est le même que dans la DB
                echo "<option value=\"$i\">$spe</option>";
            }
                    
            echo "</select>
                <input type=\"text\" class=\"search-bar\" placeholder=\" établissement\">
                <input type=\"text\" class=\"search-bar\" placeholder=\" médecin\">
            </div>";
        }
    }
?>