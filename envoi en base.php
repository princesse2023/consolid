<?php
try {
    // $bd = new PDO("mysql:host=localhost; dbname=forum_dclic", "root", "");
    $bd = mysqli_connect("localhost", "root", "", "console");
    // $bd->setAttribute(PDO::ATTR_ERRMODE, PDO)
    echo "Connexion à la base de donné établie";
} catch (PDOException $e) {
    die("Erreur :" . $e->getMessage());
}
$nom = $_POST['nom'];
$prenom = $_POST["prenom"];
$date_de_naissance = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

$sql = "INSERT INTO personne (nom, prenom, date_de_naissance, sexe, email,  mot_de_passe) 
VALUES ('$nom', '$prenom', '$date_de_naissance', '$sexe', '$email', '$mot_de_passe')";
        mysqli_query($bd, $sql);
        // $message = "Ajout éffectué avec succès.";
        echo '<script> alert("Enregistrement réussi")</script>';
        // echo '<script> window.location.href="../Se_connecter.php"</script>';
?>
