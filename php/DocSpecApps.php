<?php
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
        echo "TODO avec SQL";
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