<?php
session_start(); // Démarrer la session
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <style>
        .error-message {
            color: red; /* Couleur du texte en rouge */
        }
    </style>

</head>
<body>
    <h2>Connexion</h2>
    <?php
    // Vérifier si un message d'erreur est défini dans la variable de session
    if(isset($_SESSION['error_message'])){
        echo "<span class='error-message'>" . $_SESSION['error_message'] . "</span>"; // Afficher le message d'erreur en rouge
        unset($_SESSION['error_message']); // Supprimer le message d'erreur de la variable de session après l'avoir affiché
    }
    ?>
    <form action="gestion_connexion.php" method="post">
        <label for="login">Login :</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="mdp">Mot de passe :</label><br>
        <input type="password" id="mdp" name="mdp"><br><br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
