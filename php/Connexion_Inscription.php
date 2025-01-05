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

function connexion() {

}

// Page Inscription
function createAccount() {

    // Connect to data base
    $conn = pg_connect("host=localhost port=5432 dbname=$dbname user=$user password=$password");

    if (!$conn) {
        echo "An error occurred while connecting to the database.";
        exit;
    }

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
    pg_query($conn, $query);
}
?>