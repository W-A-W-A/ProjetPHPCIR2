<?php
    function getPastAppointement($surname, $name, $spes, $hour, $minutes, $day, $month, $year){
        // Changer la couleur en rouge est un placeholder, il faut appeller une fonction
        echo "<div class=\"whitebubble\">
                    <div class=\"whitebubblefield\">
                        <div><b>Dr $surname $name</b></div>
                        <div><b>$spes</b></div>
                    </div>

                    <div class=\"whitebubblefield\">
                        <div>$hour:$minutes</div>
                    </div>
                    
                    <div class=\"whitebubblefield\">
                        <div>$day/$month/$year</div>
                        <div class=\"button\" onclick=\"this.style.color = 'red'\">reprendre rdv</div>
                    </div>
                </div>";
    }

    function GetPastAppointements(){
        echo "TODO avec SQL";
    }

    
    // examples
    function GetExamplePastAppointement(){
        GetPastAppointement("Prénom", "NOM", "Spécialités", "HH", "mm", "DD", "MM", "YYYY");
    }

    function GetExamplePastAppointements(){
        for($i = 0; $i < 15; ++$i){
            GetExamplePastAppointement();
        }
    }
?>