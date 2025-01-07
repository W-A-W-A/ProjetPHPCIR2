<?php
    function GetResearchedAppointement($name, $spes, $etab, $date){
        // Changer la couleur en rouge est un placeholder, il faut appeller une fonction
        echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>$name</b></div>
                        <div><b>$spes</b></div>
                    </div>

                    <div class=\"whitebubblefield\">
                        <div>$etab</div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div>Disponible dès : $date</div>
                        <div class=\"button\" onclick=\"this.style.color = 'red'\">prendre rdv</div>
                    </div>
                </div>";
    }

    function GetResearchedAppointements(){
        /* Récupération des champs recherchés via les cookies */

        session_start(); // se connecte à la session ouverte

        if (isset($_COOKIE["searched_spe"])){$searched_spe = intval($_COOKIE["searched_spe"]);}
        else {$searched_spe = 1;}

        if (isset($_COOKIE["searched_etab"])){$searched_spe = intval($_COOKIE["searched_etab"]);}
        else {$searched_etab = "";}

        if (isset($_COOKIE["searched_doc"])){$searched_spe = intval($_COOKIE["searched_doc"]);}
        else {$searched_doc = "";}
        

        /* Sélectionne tous les champs possibles, tant pis pour la bonne gestion des ressources */
        
        $request = "SELECT Doctor.id FROM 
        (((Doctor INNER JOIN Office ON Doctor.id = Office.id_doctor) 
        INNER JOIN Address ON Office.id_address = Address.id)
        INNER JOIN Doctor_Jobs ON Doctor.id = Doctor_Jobs.id_doctor)
        INNER JOIN Specialities ON Specialities.id = Doctor_Jobs.id_specialty
         WHERE ";
        

        /* Sélection des critères de recherche en fonction des champs remplis pour obtenir les IDs des médecins */

        $searching = false;

        // si le champ de la spé est rempli (une spé autre que "(sélectionnez une spécialité)" a été choisie)
        if($searched_spe > 1){
            $request = "$request Specialities.id = $searched_spe";
            $searching = true;
        }

        // si le champ de l'établissement est rempli
        if($searched_etab != ""){
            $request = "$request Address.address = $searched_etab";
            $searching = true;
        }

        // si le champ du médecin est rempli
        if($searched_doc != ""){
            $request = "$request Doctor.name = $searched_doc";
            $searching = true;
        }


        /* requête du résultat de la recherche */

        // si des critères de recherches sont entrés
        if($searching){
            $request = "$request;"; // ferme la requête
        }
        // si aucun critère de recherche n'est entré
        else{
            $request = "SELECT id FROM Doctor;"; // on sélectionne tous les médecins
        }

        try {
            $ids_docs = requete($request); // récupère tous les IDs des médecins correspondants aux critères de recherches remplis
            for($y = 0; $y < count($ids_docs); ++$y){
                $ids_docs[$y] = $ids_docs[$y][0]; // on unpack les lignes
            }

            for($i = 0; $i < count($ids_docs); ++$i){
                $id_doc = $ids_docs[$i];
                $nom_doc = requete("SELECT name FROM Doctor WHERE id = $id_doc;")[0][0];

                $spes = requete("SELECT speciality_name FROM
                Specialities INNER JOIN (Doctor INNER JOIN Doctor_Jobs ON Doctor.id = Doctor_Jobs.id_doctor) ON Specialities.id = Doctor_Jobs.id_specialty
                WHERE Doctor.id = $id_doc;");
                for($s = 0; $s < count($spes); ++$s){
                    $spes[$s] = $spes[$s][0]; // on prépare à la concaténation
                }
                $spes_doc = implode(" ", $spes); // concaténation
                print_r($spes);

                $etab_doc = requete("SELECT Address.address FROM
                (Doctor INNER JOIN Office ON Doctor.id = Office.id_doctor) 
                INNER JOIN Address ON Office.id_address = Address.id WHERE Doctor.id = $id_doc;")[0][0];

                $nearest_date_doc = requete("SELECT debut FROM Appointement INNER JOIN Doctor ON id_doctor = Doctor.id WHERE Doctor.id = $id_doc ORDER BY debut DESC;")[0][0];

                GetResearchedAppointement($nom_doc, $spes, $etab_doc, $nearest_date_doc);
            }
        }
        catch(PDOException $e) {
            echo'Connexion échouée : ' . $e->getMessage();
        }

        //GetResearchedAppointement("Prénom NOM", "Spécialités", "établissement", "YYYY/MM/DD HH:mm"); // exemple
    }

    
    // examples
    function GetExampleResearchedAppointement(){
        GetResearchedAppointement("Prénom", "NOM", "Spécialités", "établissement", "YYYY/MM/DD HH:mm");
    }

    function GetExampleResearchedAppointements(){
        for($i = 0; $i < 15; ++$i){
            GetExampleResearchedAppointement();
        }
    }
?>