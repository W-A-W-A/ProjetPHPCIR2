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
            echo "<div id=\"navinput\">
                <select name=\"spécialité\">
                    <!-- TODO il faut utiliser PHP pour injecter la table SQL des spés dans ce HTML lors du chargement -->
                    <option value=\"1\">spé1</option>
                    <option value=\"2\">spé2</option>
                    <option value=\"3\">spé3</option>
                    <option value=\"4\">spé4</option>
                </select>
                <input type=\"text\" class=\"search-bar\" placeholder=\" établissement\">
                <input type=\"text\" class=\"search-bar\" placeholder=\" médecin\">
            </div>";
        }
    }
?>