<?php
    $dsn = 'pgsql:dbname=testdb;host=127.0.0.1;port=5432';
    $user = 'dbuser';
    $password = 'dbpass';

    try {
        $conn = new PDO($dsn, $user, $password);







        
    }
    catch(PDOException $e) {
        echo'Connexion échouée : ' . $e->getMessage();
    }

?>