<?php
session_start();
require 'connexion-bdd.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparer une requête pour récupérer l'utilisateur par email
    $req = $bdd->prepare("SELECT id_user, firstname, name, password FROM user WHERE mail = ?");
    $req->execute([$email]);
    $user = $req->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Le mot de passe est correct, enregistrer l'ID de l'utilisateur dans la session
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['fname'] = $user['firstname'];
        $_SESSION['name'] = $user['name'];
        header("Location: accueil.php"); // Rediriger vers la page d'accueil
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>