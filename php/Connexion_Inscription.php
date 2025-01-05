<?php
// Page Connexion
function rememberMe ($name){

    if(isset($_POST[$name])) {

        // Sets Cookies if remember me is cheaked
        if (isset($_POST['remember'])) {
            setcookie($name, $_POST[$name], time() + 3 * 24 * 60 * 60, "/"); // 3 day cookie
        }
    }

    // Fills in the box if cookie is set
    if (isset($_COOKIE[$name])) {
        echo $_COOKIE[$name];
        return;
    }

    echo '';
}

function connect() {

    include_once "Requete_SQL";

    $query = "SELECT mail, password FROM Client WHERE mail = " . $_POST["email"] . ";";
    $result_p = requete($query);

    $query = "SELECT mail, password FROM Doctor WHERE mail = " . $_POST["email"] . ";";
    $result_d = requete($query);

    if ($result_p != [] && $result_d != [] ) {
        //header("Location: Accueil.html");
    }

    echo $result_d;
    echo $result_p;
}

// Page Inscription
function isMailTaken() {

    $query = "SELECT mail FROM Client WHERE mail = " . $_POST["email"] . ";";
    $result_p = requete($query);

    $query = "SELECT mail FROM Doctor WHERE mail = " . $_POST["email"] . ";";
    $result_d = requete($query);

    if ($result_p != [] || $result_d != []) {
        return TRUE;
    }

    return FALSE;
}

function createAccount() {

    // Prepare query
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypted Password

    // Differentiate patient from doctor
    if ($_POST["Utilisation"] == "patient"){
        $query = "INSERT INTO Client (name, mail, telephone, password) VALUES ('$name', '$mail', '$telephone', '$password')";
    }
    else {
        $query = "INSERT INTO Doctor (name, mail, telephone, password) VALUES ('$name', '$mail', '$telephone', '$password')";
    }

    // execute the query
    requete($query);
}
?>