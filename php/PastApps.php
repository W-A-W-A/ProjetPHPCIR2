<?php
    include_once("../php/Requete_SQL.php");
    session_start(); // se connecte à la session ouverte
    //$id_client = $_SESSION["id"]; // ne fonctionne pas

    for($i = 0; $i < 50; ++$i){
        if(isset($_POST["button_pastrdv_$i"])) {
            // met en cookie l'id du médecin sélectionné
            setcookie('selected_doc', "$i", time() + 3600, "/");
            header("Location: http://localhost/html/RDV_medecin.php");
            die();
        }
    }




    function getPastAppointement($name, $spes, $hour, $date, $id_doctor){
        // Changer la couleur en rouge est un placeholder, il faut appeller une fonction
        echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>$name</b></div>
                        <div><b>$spes</b></div>
                    </div>

                    <div class=\"whitebubblefield\">
                        <div>$hour</div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div>$date</div>
                        <form method=\"POST\">
                            <button class=\"button\" type=\"submit\" name=\"button_pastrdv_$id_doctor\">reprendre rdv</button>
                        </form>
                    </div>
                </div>";
    }

    function GetPastAppointements(){
        session_start(); // se connecte à la session ouverte
        // on trouve l'id du client en fonction de son email de connexion stocké en cookie
        $email = $_COOKIE["email"];
        $id_client = requete("SELECT id FROM Client WHERE mail='$email';")[0][0];

        try {
            $past_rdvs = requete("SELECT
            CAST(CAST(debut AS DATE) AS VARCHAR) AS D_d,
            TO_CHAR(CAST(debut AS TIME), 'HH24:MI') AS H_d,
            CAST(CAST(fin AS DATE) AS VARCHAR) AS D_f,
            TO_CHAR(CAST(fin AS TIME), 'HH24:MI') AS H_f,
            id_doctor,
            name
            FROM Appointement INNER JOIN Doctor ON id_doctor = Doctor.id
            WHERE id_client = $id_client
            ORDER BY debut DESC;");

            

            for($i = 0; $i < count($past_rdvs); ++$i){
                
                $date_debut = $past_rdvs[$i][0];
                $heure_debut = $past_rdvs[$i][1];
                $id_doctor = $past_rdvs[$i][4];
                $name = $past_rdvs[$i][5];
                
                $spes_l = requete("SELECT DISTINCT Specialities.speciality_name
                FROM ((Appointement
                INNER JOIN Doctor ON Appointement.id_doctor = Doctor.id)
                INNER JOIN Doctor_Jobs ON Doctor_Jobs.id_doctor = Doctor.id)
                INNER JOIN Specialities ON Doctor_Jobs.id_specialty = Specialities.id
                WHERE Appointement.id_client = $id_client AND Appointement.id_doctor = $id_doctor
                ;");
                for($s = 0; $s < count($spes_l); ++$s){
                    $spes_l[$s] = $spes_l[$s][0]; // on prépare à la concaténation
                }
                $spes = implode(" ", $spes_l); // concaténation
                
                getPastAppointement($name, $spes, $heure_debut, $date_debut, $id_doctor);
            }
        }
        catch(PDOException $e) {
            echo'Connexion échouée : ' . $e->getMessage();
            $avs = [];
        }

        echo "TODO avec SQL";
    }
?>