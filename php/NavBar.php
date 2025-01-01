<?php
    include_once("../php/Requete_SQL.php");

    function GetNavBar($subject, $sb_enabled=false){
        echo "<div id=\"navinfos\">
                <div id=\"navinfosgroup\">
                    <img class=\"photoprofil\" src=\"websitelogo.png\">
                    <div>$subject</div>
                </div>
                <div id=\"navinfosgroup\">
                    <div>Prénom Nom</div>
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