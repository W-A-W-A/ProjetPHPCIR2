<?php
    include_once("../php/Requete_SQL.php");
    session_start(); // se connecte à la session ouverte
    //$id_client = $_SESSION["id"]; // ne fonctionne pas

    for($i = 0; $i < 100; ++$i){
        if(isset($_POST["button_rdv_$i"])){
            try{
                // on trouve l'id du client en fonction de son email de connexion stocké en cookie
                $email = $_COOKIE["email"];
                $id_client = requete("SELECT id FROM Client WHERE mail='$email';")[0][0];
                // on affecte ce rendez-vous au client connecté
                requete("UPDATE Appointement SET id_client=$id_client WHERE id=$i;");
            }
            catch(PDOException $e) {
                echo'Connexion échouée : ' . $e->getMessage();
                $avs = [];
            }



            // refreshes the page to make the taken appointement's button dissapear
            header("Location: http://localhost/html/RDV_medecin.php");
            die();
        }
    }


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
            TO_CHAR(CAST(fin AS TIME), 'HH24:MI') AS H_f,
            id
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
                    $id_rdv = $avs[$echoedCount][4];

                    echo "<form method=\"POST\">
                            <button class=\"button\" type=\"submit\" name=\"button_rdv_$id_rdv\">$debut_hour - $fin_hour</button>
                        </form>";

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
?>