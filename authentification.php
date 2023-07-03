<?php
$con = mysqli_connect("localhost", "root", "", "console");

if (isset($_POST['login'])) {
    $mail = $_POST['email'];
    $mot_de_passe = $_POST['pass'];
    $query = "SELECT * FROM `personne` WHERE `email`='$mail' AND `mot_de_passe`='$mot_de_passe'";
    $select = mysqli_query($con, $query);
    $row = mysqli_fetch_array($select);
    if (is_array($row)) {

        $_SESSION["email"] = $row["email"];
        $_SESSION["mot_de_passe"] = $row["mot_de_passe"];
    } else {

        echo '<script> alert("Mot de passe et/ou email invalide")</script>';
        echo '<script> window.location.href="connexion.php"</script>';
    }
}
if (isset($_SESSION["email"])) {
    header("location:accueil.html");
    echo 'connecté avec succes';
}
;

?>