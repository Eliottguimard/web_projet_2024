<?php
session_start(); // Démarrer la session

// Vérifier si les informations du client sont stockées dans la session
if(!isset($_SESSION['prenom']) || !isset($_SESSION['nom']) || !isset($_SESSION['type'])){
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$type = $_SESSION['type'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Medicare: Accueil</title>
    <link rel="stylesheet" href="styleaccueil.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="accueil.js" defer></script>
    <style>
        /* Style pour le menu déroulant */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            color: #003366;
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

        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .service-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: calc(33% - 40px);
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        .service-card h2 {
            color: #0056b3;
        }
        .service-card p {
            color: #666;
            font-size: 16px;
            margin: 10px 0 20px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #004a9f;
        }
        .footer-content a {
            color: #0066cc;
            text-decoration: none;
        }

        .footer-content p {
            margin: 5px 0;
        }

        footer {
            background-color: #87bfdc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e7e7e7;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php">Accueil</a></li>
                <li><a href="toutparcourir_client.php" class="active">Tout Parcourir</a></li>
                <li><a href="recherche.php">Recherche</a></li>
                <li><a href="RDVClient.php">Rendez-vous</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>

</header>

<h1>Services de Laboratoire</h1>

<div class="service-container">
    <div class="service-card">
        <h2>Dépistage COVID-19</h2>
        <p>Informations sur le prélèvement de sang, d'urine et les précautions à prendre avant, pendant, et après le prélèvement.</p>
        <a href="covid.php" class="btn">En savoir plus</a>
    </div>

    <div class="service-card">
        <h2>Biologie de la Femme Enceinte</h2>
        <p>Tests spécifiques et conseils pour le suivi biologique durant la grossesse.</p>
        <a href="pregnancy.php" class="btn">En savoir plus</a>
    </div>

    <div class="service-card">
        <h2>Cancérologie</h2>
        <p>Dépistage et suivi oncologique, avec explications sur les différents types de biomarqueurs et tests disponibles.</p>
        <a href="cancer.php" class="btn">En savoir plus</a>
    </div>
    <div class="service-card">
        <h2>Gynécologie</h2>
        <p>Suivi gynécologique, prévention et traitement des pathologies féminines.</p>
        <a href="gynecology.php" class="btn">En savoir plus</a>
    </div>
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

