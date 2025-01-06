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

    include_once "Requete_SQL.php";
    $mail = $_POST["email"];

    $query = "SELECT mail, password FROM Client WHERE mail = '$mail';";
    $result_p = requete($query);

    $query = "SELECT mail, password FROM Doctor WHERE mail = '$mail';";
    $result_d = requete($query);

    if ($result_p != [] || $result_d != [] ) {      //Checks if account exists

        // Get the ID unique to the user that logged in
        if ( $result_d == [] ) {
            $query = "SELECT id FROM Client WHERE mail = '$mail';";
            setcookie("doctor", FALSE, time() + 3 * 24 * 60 * 60, "/");
        }
        else {
            $query = "SELECT id FROM Doctor WHERE mail = '$mail';";
            setcookie("doctor", TRUE, time() + 3 * 24 * 60 * 60, "/");
        }
        $result = requete($query);
        //print_r ($result);

        // Set session to recognise the user further on
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypted Password

        if ($result[0][1] == $password) {
            session_start();
            $_SESSION["id"] = $result[0][0];

            // Redirect to Website
            header("Location: Accueil.php");
        }

        else {
            echo '<br><p class="error">Invalid Password !</p>';
        }
    }

    else {
        echo '<br><p class="error">Invalid Email !</p>';
    }
}

// Page Inscription
function isMailValid() {

    // Is it already taken ?
    include_once "Requete_SQL.php";
     $mail = $_POST["email"];

    $query = "SELECT mail FROM Client WHERE mail = '$mail';";
    $result_p = requete($query);

    $query = "SELECT mail FROM Doctor WHERE mail = '$mail';";
    $result_d = requete($query);

    if ($result_p != [] || $result_d != []) {
        echo '<br><p class="error">Mail already taken !</p>';
        return FALSE;
    }

    // Is the given mail the same as the verification email ?
    if ($_POST["email"] != $_POST["email-verif"]) {
        echo '<br><p class="error">Mail de vérification incorrect !</p>';
        return FALSE;
        }

    return TRUE;
}

function createAccount() {

    // Prepare query
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypted Password

    // Differentiate patient from doctor
    if ($_POST["Utilisation"] == "patient"){
        $query = "INSERT INTO Client (name, mail, telephone, password) VALUES ('$nom $prenom', '$mail', '$telephone', '$password');";
    }
    else {
        $query = "INSERT INTO Doctor (name, mail, telephone, password) VALUES ('$nom $prenom', '$mail', '$telephone', '$password');";
    }

    // execute the query
    requete($query);
}
?>