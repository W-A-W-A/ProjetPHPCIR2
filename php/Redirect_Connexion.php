<?php
function isConnected () {
    if (isset($_SESSION['user_id'])) {
        exit();
    }
    header("Location: Connexion.php");
}
?>