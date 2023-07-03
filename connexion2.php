<?php
//demarron la session
session_start();

if (isset($_POST['bouton-valider'])) { //si on clique sur le bouton alors:
    if(isset($_POST['email'])  && isset($_POST['mdp'])){
    // variables
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mdp'];
    $erreur ="" ;
    // verifier les infos
    // connexion à la base de donnés
    $nom_serveur = "localhost";
    $utilisateur ="root";
    $mot_de_passe ="";
    $nom_base_de_données ="console";
    $conn = mysqli_connect($nom_serveur ,$utilisateur ,$mot_de_passe ,$nom_base_de_données);
    // requette pour selectionner l'utilisateur qui a pour email et mot de passe les identifiants entres
    $req = mysqli_query($conn , "SELECT *FROM personne WHERE email='$email' AND mot_de_passe='$mdp'");
    $num_ligne = mysqli_num_rows($req) ; 
    if($num_ligne > 0){
        header("location:inscription.php");
        //nous allons créer une varialbe session qui va contenir l'email de l'utilisateur
        $_SESSION['email'] = $email;
    }else {
        $erreur = "Adresse Mail ou Mot de passe incorrectes!";
    
    }
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexionnn</title>
    <link rel="stylesheet" href="connexion2.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/js/bootstrap.min.js">
</head>
<body style="background-color: #57b846;">
    <section>
     <h1>Connexion</h1>
     <?php
     if (isset($erreur)) {
        echo "<p class= 'erreur'>".$erreur."</p>";
     }
     
     ?>
     <form action ="" method = "POST"><!--on ne mets plus rien au niveau de l'action pour pouvoir envoyé les données dans la même page-->
        <label >Adresse Mail</label>
        <input type="text" name="email">
        <label >Mot de passe</label>
        <input type="password" name="password">
        <input type="submit" value=" Envoyer" name="bouton-valider">
    </form> 
    </section>
</body>
</html>