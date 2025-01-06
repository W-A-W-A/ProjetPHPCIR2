<?php
function isConnected () {

    session_start();

    if (isset($_SESSION['id'])) {
    }
    
    else {
        header("Location: Connexion.php");
    }
}
?>