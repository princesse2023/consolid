<?php
$con = mysqli_connect("localhost", "root", "", "console");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['pass'];
    $query = "SELECT * FROM `personne` WHERE `email`='$email' AND `mot_de_passe`='$mot_de_passe'";
    $select = mysqli_query($con, $query);
    $row = mysqli_fetch_array($select);
    if (is_array($row)) {

        $_SESSION["email"] = $row["email"];
        $_SESSION["mot_de_passe"] = $row["mot_de_passe"];
        $nomu = $row["nom"];
    } else {

        echo '<script> alert("Reessayer")</script>';
        echo '<script> window.location.href="connexion.php"</script>';
    }
}
if (isset($_SESSION["email"])) {
    // header("location:accueil.html");
    // echo 'connecté avec succes';

//     <h1> Bienvenue pouyapulcherie@gmail.com</h1>
//     <a href="deconnexion.php">
//     <button><h2>se deconnecter</h2></button> 
// </a> 
}
;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deconnexion.css">
    <title>Document</title>
</head>
<body>
   <h1> Bienvenue: <?php echo $nomu ; ?></h1>
    <a href="deconnexion.php">
    <button><h2>se deconnecter</h2></button> 
</a> 
</body>
</html>

