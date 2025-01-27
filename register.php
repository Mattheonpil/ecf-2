
<?php
session_start();
require 'connexion-bdd.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

    // Insérer l'utilisateur dans la base de données
    $req = $bdd->prepare("INSERT INTO user (firstname, name, mail, password) VALUES (?, ?, ?, ?)");
    
    if ($req->execute([$firstName, $lastName, $email, $password])) {
        $_SESSION['id_user'] = $bdd->lastInsertId(); // Enregistrer l'ID de l'utilisateur dans la session
       
        $_SESSION['fname'] = $firstName;
        $_SESSION['name'] = $lastName;

        header("Location: accueil.php"); // Rediriger vers la page d'accueil
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
