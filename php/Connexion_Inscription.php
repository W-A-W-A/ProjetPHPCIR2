<?php
// Page Connexion
function rememberMe ($name){

    if(isset($_POST[$name])) {

        if (isset($_POST['remember'])) {
            setcookie($name, $_POST[$name], time() + 3 * 24 * 60 * 60, "/"); // 3 days cookie
        }
    }

    if (isset($_COOKIE[$name])) {
        echo $_COOKIE[$name];
        return;
    }

    echo '';
}

function connexion() {

}

// Page Inscription
function createAccount($nom, $prenom, $telephone, $email, $password, $utilisation) {
    if ('SELECT mail FROM Client WHERE mail ='.$email == Null && 'SELECT mail FROM Doctor WHERE mail ='.$email == Null) {
    }

    else {
        echo "Mail Déja Pris";
    }
}
?>