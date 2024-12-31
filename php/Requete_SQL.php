<?php
    $dsn = 'pgsql:dbname=projet1;host=127.0.0.1;port=5432';
    $user = 'postgres';
    $password = 'isen';

    try {
        $conn = new PDO($dsn, $user, $password);







        
    }
    catch(PDOException $e) {
        echo'Connexion échouée : ' . $e->getMessage();
    }

?>