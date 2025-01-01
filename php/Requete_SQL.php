<?php
    function requete($r){
        // NOTE : ce code est extrêment spaghettifié, ne pas essayer d'optimiser !
        $dsn = 'pgsql:dbname=projet1;host=127.0.0.1;port=5432';
        $user = 'postgres';
        $password = 'isen';

        $conn = new PDO($dsn, $user, $password);
        
        $result = $conn->query($r);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $rowsReturn = [];
        for($i = 0; $i < count($rows); ++$i){
            
            // ça n'a aucun sens. "$rows[$i][$j];" ne fonctionne pas alors que "echo count($rows[$i]);" retourne bien le nombre de colonnes.
            $rows[$i] = implode("#", $rows[$i]);
            $explodedRow = explode("#", $rows[$i]);
            
            //echo "<br>";
            $rowsReturn[] = [];
            for($j = 0; $j < count($explodedRow); ++$j){ // php n'a pas l'air de vouloir copier des arrays automatiquement, il faut que ça soit manuel
                $rowsReturn[$i][$j] = $explodedRow[$j];
                /*
                $vals = $rowsReturn[$i][$j];
                echo "$vals # ";*/
            }
        }

        return $rowsReturn;
    }
?>