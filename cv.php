<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['prenom']) || !isset($_SESSION['nom']) || !isset($_SESSION['type'])) {
    header("Location: connexion.php");
    exit();
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$type = $_SESSION['type'];

$medecinId = isset($_GET['medecin']) ? $_GET['medecin'] : null;

if (!$medecinId) {
    header("Location: toutparcourir_client.php");
    exit();
}

// Identifier le nom de la base de données
$database = "medicare";

// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Récupérer les informations du médecin
$medecin = null;

if ($db_found) {
    $sql = "SELECT * FROM medecin WHERE id=$medecinId";
    $result = mysqli_query($db_handle, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $medecin = mysqli_fetch_assoc($result);
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_handle);
}

if (!$medecin) {
    header("Location: toutparcourir_client.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>CV du médecin</title>
    <link rel="stylesheet" href="styleaccueil.css">
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
            border-radius: 8px;
            padding-left: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .chat-container, .cv-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .message-input {
            width: calc(100% - 60px);
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .send-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .send-button:hover {
            background-color: #0056b3;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
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
                <li><a href="search.html">Recherche</a></li>
                <li><a href="appointments.html">Rendez-vous</a></li>
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

<div class="cv-container">
    <span class="close" onclick="window.location.href='toutparcourir_client.php';">&times;</span>
    <h2>CV de Dr. <?php echo htmlspecialchars($medecin['nom']); ?></h2>
    <p><?php echo htmlspecialchars($medecin['cv']); ?></p>
    <a href="affichage_generalistes.php" class="back-button">Retour à la liste des médecins</a>
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
