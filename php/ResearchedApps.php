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
        echo "TODO avec SQL";
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