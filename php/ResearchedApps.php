<?php
    function GetResearchedAppointement($surname, $name, $spes, $etab, $day, $month, $year, $hour, $minutes){
        // Changer la couleur en rouge est un placeholder, il faut appeller une fonction
        echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>Dr $surname $name</b></div>
                        <div><b>$spes</b></div>
                    </div>

                    <div class=\"whitebubblefield\">
                        <div>$etab</div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div>Disponible dès : $day/$month/$year $hour:$minutes</div>
                        <div class=\"button\" onclick=\"this.style.color = 'red'\">prendre rdv</div>
                    </div>
                </div>";
    }

    function GetResearchedAppointements(){
        session_start(); // se connecte à la session ouverte
        // Récupération des champs recherchés via les cookies
        if (isset($_COOKIE["searched_spe"])){$searched_spe = intval($_COOKIE["searched_spe"]);}
        else {$searched_spe = 1;}

        if (isset($_COOKIE["searched_etab"])){$searched_spe = intval($_COOKIE["searched_etab"]);}
        else {$searched_etab = "";}

        if (isset($_COOKIE["searched_doc"])){$searched_spe = intval($_COOKIE["searched_doc"]);}
        else {$searched_doc = "";}
        
        /* Sélection de la fonction de recherche en fonction des champs remplis pour obtenir les IDs des médecins */

        // si le champ de la spé est resté vide
        if($searched_spe == 1){
            // si le champ de l'établissement est resté vide
            if($searched_etab == ""){
                // recherche uniquement en fonction du nom du médecin
                $request = "SELECT id FROM Doctor WHERE name = '$searched_doc';";
            }
            // si le champ du médecin est resté vide
            if($searched_doc == ""){
                // recherche uniquement en fonction du nom de l'établissement
                $request = "SELECT Doctor.id FROM (Doctor INNER JOIN Office ON Doctor.id = Office.id_doctor) INNER JOIN Address ON Office.id_address = Address.id WHERE Address.address = '$searched_etab';";
            }
        }
        // si le champ de la spé est rempli
        else{
            // si le champ de l'établissement est resté vide
            if($searched_etab == ""){
                // recherche uniquement en fonction du nom du médecin
                $request = "SELECT id FROM Doctor WHERE name = '$searched_doc';";
            }
            // si le champ du médecin est resté vide
            if($searched_doc == ""){ // TODO double inner join avec les adresses pour pas juste avoir les IDs
                // recherche uniquement en fonction du nom de l'établissement
                $request = "SELECT Doctor.id FROM (Doctor INNER JOIN Office ON Doctor.id = Office.id_doctor) INNER JOIN Address ON Office.id_address = Address.id WHERE Address.address = '$searched_etab';";
            }
        }

        try {
            $avs = requete("SELECT
            CAST(CAST(debut AS DATE) AS VARCHAR) AS D_d,
            TO_CHAR(CAST(debut AS TIME), 'HH24:MI') AS H_d,
            CAST(CAST(fin AS DATE) AS VARCHAR) AS D_f,
            TO_CHAR(CAST(fin AS TIME), 'HH24:MI') AS H_f
            FROM Appointement WHERE id_client IS NULL AND id_doctor = $id;");
            $echoedCount = 0;
            while($echoedCount < count($avs)){
                $loop_debut_date = $avs[$echoedCount][0];
                
                
                echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>$loop_debut_date</b></div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div class=\"buttonslist\">";
                
                // on affiche toutes les disponibilités de la journée
                while($loop_debut_date == $avs[$echoedCount][0] && $echoedCount < count($avs)){
                    $debut_hour = $avs[$echoedCount][1];
                    $fin_hour = $avs[$echoedCount][3];
                    // Changer la couleur en rouge est un placeholder, il faut que ça appelle une fonction
                    echo "<div onclick=\"this.style.color = 'red'\">$debut_hour - $fin_hour</div>";

                    $echoedCount++;
                }
                echo "      </div>
                            </div>
                        </div>";
            }
        }
        catch(PDOException $e) {
            echo'Connexion échouée : ' . $e->getMessage();
            $avs = [];
        }

        GetResearchedAppointement("Prénom", "NOM", "Spécialités", "établissement", "DD", "MM", "YYYY", "HH", "mm");
    }

    
    // examples
    function GetExampleResearchedAppointement(){
        GetResearchedAppointement("Prénom", "NOM", "Spécialités", "établissement", "DD", "MM", "YYYY", "HH", "mm");
    }

    function GetExampleResearchedAppointements(){
        for($i = 0; $i < 15; ++$i){
            GetExampleResearchedAppointement();
        }
    }
?>