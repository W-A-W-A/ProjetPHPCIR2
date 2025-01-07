<?php
    include_once("../php/Requete_SQL.php");

    function getDoctor(){
        session_start(); // se connecte à la session ouverte
        //setcookie("id_doctor", 1, time() + 3600, "/"); // pour tester (ça marche)

        $nom_doc = "Prénom Nom";
        if (isset($_COOKIE["selected_doc"])) {
            $id_doctor = intval($_COOKIE["selected_doc"]);
            try {
                $res = requete("SELECT name FROM Doctor WHERE id='$id_doctor';");
                if(count($res) == 0){ // si on a pas trouvé le médecin dans la db
                    $nom_doc = "Prénom404 Nom404";
                }
                else {
                    $nom_doc = implode($res[0]);
                }
            }
            catch(PDOException $e) {
                echo'Connexion échouée : ' . $e->getMessage();
            }
        }
        return $nom_doc;
    }

    // actual functions
    function GetAvailableDay($dayWeek, $dayNumber, $monthNumber, $crenaux){
        echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>$dayWeek $dayNumber/$monthNumber</b></div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div class=\"buttonslist\">";
        
        for ($i = 0; $i < count($crenaux); $i += 1){
            $cren = $crenaux[$i];
            // Changer la couleur en rouge est un placeholder, il faut que ça appelle une fonction
            echo "<div onclick=\"this.style.color = 'red'\">$cren</div>";
        }
        echo "      </div>
                    </div>
                </div>";
    }

    function GetAvailabilities(){
        session_start(); // se connecte à la session ouverte
        if (isset($_COOKIE["selected_doc"])){
            $id = intval($_COOKIE["selected_doc"]);
        }
        else {
            $id = 1;
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
    }

    
    // examples
    function GenerateExampleDay(){
        $fauxcrenaux = ["HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm", "HH:mm"];
        GetAvailableDay("DAY", 0, 1, $fauxcrenaux);
    }

    function GetExampleAvailabilities(){
        for($i = 0; $i < 15; ++$i){
            GenerateExampleDay();
        }
    }
?>