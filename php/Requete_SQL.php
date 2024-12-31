<?php
    function requete($r){
        $dsn = 'pgsql:dbname=projet1;host=127.0.0.1;port=5432';
        $user = 'postgres';
        $password = 'isen';

        $conn = new PDO($dsn, $user, $password);
                
        $result = $conn->query($r);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($rows); ++$i){
            $rows[$i] = implode($rows[$i]);
        }

        return $rows;
    }
?>