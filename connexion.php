<?php
session_start(); // Démarrer la session
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleaccueil.css">
    <title>Connexion</title>

    <style>

        .box-connexion {
            margin: auto;
            padding: 20px;
            width: 500px;
            /*max-width: 350px; *//* Limite la largeur de la FAQ pour ne pas être trop large */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background: #f9f9f9;

            display: flex; /* Ajout */
            justify-content: center; /* Ajout */
            align-items: center; /* Ajout */
        }


        .error-message {
            color: red; /* Couleur du texte en rouge */
        }

        footer {
            background-color: #87bfdc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e7e7e7;
            margin-top: 50px; /* Ajout d'une marge pour espacer le footer des autres contenus */
        }

        .footer-content a {
            color: #0066cc;
            text-decoration: none;
        }

        .footer-content p {
            margin: 5px 0; /* Espacement entre les paragraphes du footer */
        }

        #valid{
            margin-left: 30px;
        }

        .champs{
            background-color: #82b3d6;
            color: #fff;
            border: 1px;
            border-color: black;
            padding: 5px 10px;
            margin-bottom: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
    </style>

</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <h1 class="medicare-title">MEDICARE</h1> <!-- Ajout du titre MEDICARE -->
        <nav class="main-nav">
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="recherche.php">Recherche</a></li>
                <li><a href="connexion.php"  class="active">Se connecter</a></li>
            </ul>
        </nav>
    </div>
</header>
    <div class="box-connexion">
        <form action="gestion_connexion.php" method="post">
            <h2>Connexion</h2>
            <label for="login">Login :</label><br>
            <input type="text" class="champs" name="login"><br>
            <label for="mdp">Mot de passe :</label><br>
            <input type="password" class="champs" name="mdp"><br><br>
            <input id="valid" class="cta-button" type="submit" value="Se connecter">
            <p><?php
                    // Vérifier si un message d'erreur est défini dans la variable de session
                    if(isset($_SESSION['error_message'])){
                        echo "<span class='error-message'>" . $_SESSION['error_message'] . "</span>"; // Afficher le message d'erreur en rouge
                        unset($_SESSION['error_message']); // Supprimer le message d'erreur de la variable de session après l'avoir affiché
                    }
                ?>
            </p>
        </form>
    </div>
    <footer>
        <div class="footer-content">
            <p>Contactez-nous: <a href="mailto:info@medicare.com">info@medicare.com</a></p>
            <p>Téléphone : <a href="tel:+33171203622">01 71 20 36 22</a></p>
            <p>Adresse : 123 Rue de la Santé, 75013 Paris, France</p>
            <p><a href="https://www.google.com/maps?q=123+Rue+de+la+Sant%C3%A9,+75013+Paris,+France" target="_blank">Voir sur Google Maps</a></p>
        </div>
    </footer>

</body>
</html>
