<?php
session_start(); // Démarrer la session
$IDMedecin = $_GET["medecin"];
$creneau = $_GET["creneau"];
//echo $IDMedecin;
//echo $creneau;

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Vérifier si les informations du client sont stockées dans la session
if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type']) && isset($_SESSION['id'])){
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
    $type = $_SESSION['type'];
    $id = $_SESSION['id'];
} else {
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

if($db_found){
    //1ere requete pour récupérer les infos du medecin
    $sql = "SELECT nom, prenom, telephone, specialite FROM medecin WHERE id = $IDMedecin";
    //Execution 1ere requete
    $result = mysqli_query($db_handle, $sql);
    $row = mysqli_fetch_assoc($result);
    //ajouter test au moins 1 resultat recupéré
    $nomMedecin = $row['nom'];
    $prenomMedecin = $row['prenom'];
    $telephoneMedecin = $row['telephone'];
    $specialiteMedecin = $row['specialite'];

    //2eme requete pour récupérer le calendrier du medecin
    $cal = "SELECT * FROM calendrier WHERE id = $IDMedecin";
    //Execution 2eme requete
    //ajouter test au moins 1 resultat recupéré
    $result = mysqli_query($db_handle, $cal);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['PrendreRDV']))
{
    $sql = "UPDATE calendrier SET $creneau = $id WHERE calendrier.id = $IDMedecin";
    $result = mysqli_query($db_handle, $sql);
    header("Location: calendrier.php?medecin=$IDMedecin ");
    exit();
}
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
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
            padding: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .content-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .welcome-section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" class="active">Accueil</a></li>
                <li><a href="toutparcourir_client.php">Tout Parcourir</a></li>
                <li><a href="recherche.php">Recherche</a></li>
                <li><a href="RDVClient.php">Rendez-vous</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $nom; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $prenom; ?></span></p>
                        <p>type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="content-container"> <!-- Conteneur principal pour flexbox -->
        <div class="welcome-faq-container"> <!-- Nouveau conteneur pour le contenu de bienvenue et FAQ -->
            <div class="welcome-section">
                <h1>Confirmez-vous la prise de rendez vous avec le médecin <?php echo $prenomMedecin, " ", $nomMedecin, " " ?> ? </h1>
                <p> Le rendez vous n'est pas remboursable s'il est maintenu</p>
                <p> Le rendez vous peut être annulé à tout moment depuis la page du calendrier de votre médecin</p>
                <form method="post" >
                    <input type="submit" class="cta-button" name="PrendreRDV" value="Oui">
                    <button class="cta-button"><a class="calendrier" href="calendrier.php?medecin= <?php echo $IDMedecin ?>">Non</a></button>
                    <p><?php
                        // Vérifier si un message d'erreur est défini dans la variable de session
                        if(isset($_SESSION['error_message'])){
                            echo "<span class='error-message'>" . $_SESSION['error_message'] . "</span>"; // Afficher le message d'erreur en rouge
                            unset($_SESSION['error_message']); // Supprimer le message d'erreur de la variable de session après l'avoir affiché
                        }
                        ?>
                    </p>
                </form>

                <!-- construire requete sql de type "update calendrier set (creneau à passer en paramètre de l'appel à la page) = 1 (ou ID du patient) where id = $IDMedecin)" -->
            </div>
        </div>

        <!-- Fin du contenu principal -->
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