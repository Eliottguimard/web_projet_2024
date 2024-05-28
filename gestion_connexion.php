<?php
session_start(); // Démarrer la session

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
    if(isset($_POST['login']) && isset($_POST['mdp'])){
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        $logged_in = false; // Variable pour vérifier si l'utilisateur est déjà connecté

        // Vérification dans la table clients
        $sql = "SELECT * FROM clients WHERE login = '$login' AND mdp = '$mdp'";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row && !$logged_in){
            // Connexion réussie pour un client
            $_SESSION['user_type'] = 'client'; // Stocker le type d'utilisateur dans la session

            // Stocker les informations du client dans des variables PHP
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['type'] = $row['type'];

            // Redirection vers la page index_client.php
           // header("Location: index.html");
            header("location: index_client.php");
            exit(); // Assure que le script s'arrête après la redirection
        }

        // Vérification dans la table medecin
        $sql = "SELECT * FROM medecin WHERE login = '$login' AND mdp = '$mdp'";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row && !$logged_in){
            // Connexion réussie pour un client
            $_SESSION['user_type'] = 'medecin'; // Stocker le type d'utilisateur dans la session

            // Stocker les informations du client dans des variables PHP
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['type'] = $row['type'];

            // Redirection vers la page index_client.php
            // header("Location: index.html");
            header("location: index_medecin.php");
            exit(); // Assure que le script s'arrête après la redirection
        }

        // Vérification dans la table administrateur
        $sql = "SELECT * FROM administrateur WHERE login = '$login' AND mdp = '$mdp'";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row && !$logged_in){
            // Connexion réussie pour un administrateur
            echo "Connexion réussie en tant qu'administrateur";
            // Redirection vers une page de profil administrateur
            $logged_in = true; // Marquer que l'utilisateur est connecté
        }

        // Si aucun utilisateur correspondant n'est trouvé
        if(!$logged_in){
            $_SESSION['error_message'] = "*Utilisateur introuvable, veuillez resaisir les informations";
            header("Location: connexion.php"); // Redirection vers la page de connexion
            exit(); // Assure que le script s'arrête après la redirection
        }
    }
}
else{
    echo "Database not found";
}
?>
