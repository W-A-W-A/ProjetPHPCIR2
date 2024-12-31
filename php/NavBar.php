<?php
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
            $dsn = 'pgsql:dbname=projet1;host=127.0.0.1;port=5432';
            $user = 'postgres';
            $password = 'isen';
            try {
                $conn = new PDO($dsn, $user, $password);
                
                $result = $conn->query("SELECT speciality_name FROM Specialities;");
                $spes = $result->fetchAll(PDO::FETCH_ASSOC);
                for($i = 0; $i < count($spes); ++$i){
                    $spes[$i] = implode($spes[$i]);
                }


            } catch(PDOException $e) {
                echo'Connexion échouée : ' . $e->getMessage();
                $spes = ["spé1", "spé2", "spé3", "spé4"];
            }

            echo "<div id=\"navinput\">
                <select name=\"spécialité\">";
            for($i = 0; $i < count($spes); ++$i){
                $spe = $spes[$i]; // l'id/valeur des spés est le même que dans la DB
                echo "<option value=\"$i\">$spe</option>";
            }
                    
            echo "</select>
                <input type=\"text\" class=\"search-bar\" placeholder=\" établissement\">
                <input type=\"text\" class=\"search-bar\" placeholder=\" médecin\">
            </div>";
        }
    }
?>