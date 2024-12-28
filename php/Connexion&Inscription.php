<?php
function rememberMe ($name){

    if(isset($_POST[$name])) {
        setcookie($name, $_POST[$name], time() + 3 * 24 * 60 * 60); // 3 Days
        return $_POST[$name];
    }

    elseif (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    }

    return '';
}

function createAccount($nom, $prenom, $telephone, $email, $password, $utilisation) {
    if ('SELECT mail FROM Client WHERE mail ='.$email == Null && 'SELECT mail FROM Doctor WHERE mail ='.$email == Null) {
    }

    else {
        echo "Mail Déja Pris";
    }
}
?>