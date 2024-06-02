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
<meta charset="UTF-8">
<title>Medicare: Accueil</title>
<link rel="stylesheet" href="styleaccueil.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="accueil.js" defer></script>
<head>
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

        .content-box {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 100px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .advice-box {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 10px;
        }

        .intro, .before, .after {
            text-align: left;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .btn.rendezvous {
            display: block;
            width: auto;
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn.rendezvous:hover {
            background-color: #0056b3;
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


    <main>
        <h1>Gynécologie</h1>
        <div class="content-box">
            <p class="intro"> <h3>Pour les examens gynécologiques, il est essentiel de suivre une préparation appropriée, comme éviter d'utiliser des produits internes (tampons, douches) 24 heures avant le test.</h3></p>
            <div class="advice-box">
                <p class="before">Avant votre visite, veillez à suivre les instructions spécifiques fournies par votre médecin ou la clinique pour minimiser les risques et améliorer la précision des résultats.</p>
                <p class="after">Après votre visite, évitez les activités physiques intenses pour le reste de la journée et prenez note de tout inconfort ou symptôme à discuter avec votre gynécologue lors du suivi.</p>
            </div>
            <a href="RDV_labo.php" class="btn rendezvous">Prendre Rendez-vous</a>
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
