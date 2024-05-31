<?php
session_start(); // Démarrer la session

// Vérifier si les informations de l'administrateur sont stockées dans la session
if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
}
else {
    // Redirection vers la page de connexion si les informations de l'administrateur ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Medicare: Accueil Admin</title>
    <link rel="stylesheet" href="styleAdmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="accueil.js" defer></script>
    <style>
        /* Style pour le menu déroulant */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            color: #b30000;
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 170px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px; /* Arrondir les bords */
            padding-left: 10px; /* Déplacer le texte vers la droite */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Style pour l'administrateur */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff7f7;
            color: #333;
        }

        .header-content {
            background-color: #b30000; /* Rouge pour le haut */
            padding: 10px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 50px;
        }

        .main-nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        .main-nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .main-nav a:hover {
            background-color: #990000;
        }

        .content-container {
            padding: 20px;
        }

        .welcome-section {
            background-color: #ffe6e6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .faq-section {
            background-color: #ffe6e6;
            padding: 20px;
            border-radius: 10px;
        }

        .cta-button {
            background-color: #cc0000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .cta-button:hover {
            background-color: #990000;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #cc0000; /* Tous les titres en rouge */
        }

        .footer-content {
            background-color: #b30000;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .footer-content a {
            color: #fff;
            text-decoration: none;
        }

        .footer-content a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_admin.php" class="active">Accueil</a></li>
                <li><a href="gerer_utilisateurs.php">Gérer Utilisateurs</a></li>
                <li><a href="gerer_appointments.php">Gérer Rendez-vous</a></li>
                <li><a href="statistiques.php">Statistiques</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations de l'administrateur -->
                        <p>Nom: <span id="admin-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="admin-prenom"><?php echo $prenom; ?></span></p>
                        <p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="content-container">
        <div class="welcome-section">
            <h1>Bienvenue à Medicare Admin <?php echo $prenom; ?></h1>
            <p>Gérez les services et les utilisateurs avec facilité.</p>
            <button class="cta-button">Commencer maintenant</button>
        </div>
        <div class="faq-section">
            <h2>FAQ Admin</h2>
            <details>
                <summary>Comment ajouter un utilisateur?</summary>
                <p>Accédez à la section "Gérer Utilisateurs" pour ajouter, modifier ou supprimer des utilisateurs.</p>
            </details>
            <details>
                <summary>Comment gérer les rendez-vous?</summary>
                <p>Visitez la section "Gérer Rendez-vous" pour voir, approuver ou annuler les rendez-vous.</p>
            </details>
        </div>
    </div>
</main>
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
