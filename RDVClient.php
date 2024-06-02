<?php
session_start(); // Démarrer la session

// Vérifier si les informations du client sont stockées dans la session
if(!isset($_SESSION['prenom']) || !isset($_SESSION['nom']) || !isset($_SESSION['type'])){
    // Redirection vers la page de connexion si les informations du client ne sont pas disponibles
    header("Location: connexion.php");
    exit(); // Assure que le script s'arrête après la redirection
}

// Identifier le nom de la base de données
$database = "medicare";

// Connexion à la base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Tableau pour stocker les RDV avec id médecin et horaire
$RDVClient = [];
$RDVCal = [];

if ($db_found) {
    $sqlCal = "SELECT calendrier.*, medecin.nom, medecin.prenom FROM calendrier, medecin where medecin.id = calendrier.id and (
                        Lundi1= $_SESSION[id] or
                        Lundi2= $_SESSION[id] or
                        Lundi3= $_SESSION[id] or
                        Lundi4= $_SESSION[id] or
                        Lundi5= $_SESSION[id] or
                        Lundi6= $_SESSION[id] or
                        Lundi7= $_SESSION[id] or
                        Lundi8= $_SESSION[id] or
                        Lundi9= $_SESSION[id] or
                        Lundi10= $_SESSION[id] or
                        Lundi11= $_SESSION[id] or
                        Lundi12= $_SESSION[id] or
                        Mardi1= $_SESSION[id] or
                        Mardi2= $_SESSION[id] or
                        Mardi3= $_SESSION[id] or
                        Mardi4= $_SESSION[id] or
                        Mardi5= $_SESSION[id] or
                        Mardi6= $_SESSION[id] or
                        Mardi7= $_SESSION[id] or
                        Mardi8= $_SESSION[id] or
                        Mardi9= $_SESSION[id] or
                        Mardi10= $_SESSION[id] or
                        Mardi11= $_SESSION[id] or
                        Mardi12= $_SESSION[id] or
                        Mercredi1= $_SESSION[id] or
                        Mercredi2= $_SESSION[id] or
                        Mercredi3= $_SESSION[id] or
                        Mercredi4= $_SESSION[id] or
                        Mercredi5= $_SESSION[id] or
                        Mercredi6= $_SESSION[id] or
                        Mercredi7= $_SESSION[id] or
                        Mercredi8= $_SESSION[id] or
                        Mercredi9= $_SESSION[id] or
                        Mercredi10= $_SESSION[id] or
                        Mercredi11= $_SESSION[id] or
                        Mercredi12= $_SESSION[id] or
                        Jeudi1= $_SESSION[id] or
                        Jeudi2= $_SESSION[id] or
                        Jeudi3= $_SESSION[id] or
                        Jeudi4= $_SESSION[id] or
                        Jeudi5= $_SESSION[id] or
                        Jeudi6= $_SESSION[id] or
                        Jeudi7= $_SESSION[id] or
                        Jeudi8= $_SESSION[id] or
                        Jeudi9= $_SESSION[id] or
                        Jeudi10= $_SESSION[id] or
                        Jeudi11= $_SESSION[id] or
                        Jeudi12= $_SESSION[id] or
                        Vendredi1= $_SESSION[id] or
                        Vendredi2= $_SESSION[id] or
                        Vendredi3= $_SESSION[id] or
                        Vendredi4= $_SESSION[id] or
                        Vendredi5= $_SESSION[id] or
                        Vendredi6= $_SESSION[id] or
                        Vendredi7= $_SESSION[id] or
                        Vendredi8= $_SESSION[id] or
                        Vendredi9= $_SESSION[id] or
                        Vendredi10= $_SESSION[id] or
                        Vendredi11= $_SESSION[id] or
                        Vendredi12= $_SESSION[id]  )";
    $resultCal = mysqli_query($db_handle, $sqlCal);
    if ($resultCal) {
        // Parcourir les résultats et les stocker dans le tableau $RDVClient
        while ($row = mysqli_fetch_assoc($resultCal)) {
            $RDVCal[] = $row;
        }
    }
    function creneauVersHoraire($creneau)
    {
        if ($creneau  == 'Lundi1') return "Lundi 9h";
        else if ($creneau  == 'Lundi2') return "Lundi 9h20";
        else if ($creneau  == 'Lundi3') return "Lundi 9h40";
        else if ($creneau  == 'Lundi4') return "Lundi 10h";
        else if ($creneau  == 'Lundi5') return "Lundi 10h20";
        else if ($creneau  == 'Lundi6') return "Lundi 10h40";
        else if ($creneau  == 'Lundi7') return "Lundi 11h";
        else if ($creneau  == 'Lundi8') return "Lundi 11h20";
        else if ($creneau  == 'Lundi9') return "Lundi 11h40";
        else if ($creneau  == 'Lundi10') return "Lundi 14h";
        else if ($creneau  == 'Lundi11') return "Lundi 14h20";
        else if ($creneau  == 'Lundi12') return "Lundi 14h40";
        if ($creneau  == 'Mardi1') return "Mardi 9h";
        else if ($creneau  == 'Mardi2') return "Mardi 9h20";
        else if ($creneau  == 'Mardi3') return "Mardi 9h40";
        else if ($creneau  == 'Mardi4') return "Mardi 10h";
        else if ($creneau  == 'Mardi5') return "Mardi 10h20";
        else if ($creneau  == 'Mardi6') return "Mardi 10h40";
        else if ($creneau  == 'Mardi7') return "Mardi 11h";
        else if ($creneau  == 'Mardi8') return "Mardi 11h20";
        else if ($creneau  == 'Mardi9') return "Mardi 11h40";
        else if ($creneau  == 'Mardi10') return "Mardi 14h";
        else if ($creneau  == 'Mardi11') return "Mardi 14h20";
        else if ($creneau  == 'Mardi12') return "Mardi 14h40";
        if ($creneau  == 'Mercredi1') return "Mercredi 9h";
        else if ($creneau  == 'Mercredi2') return "Mercredi 9h20";
        else if ($creneau  == 'Mercredi3') return "Mercredi 9h40";
        else if ($creneau  == 'Mercredi4') return "Mercredi 10h";
        else if ($creneau  == 'Mercredi5') return "Mercredi 10h20";
        else if ($creneau  == 'Mercredi6') return "Mercredi 10h40";
        else if ($creneau  == 'Mercredi7') return "Mercredi 11h";
        else if ($creneau  == 'Mercredi8') return "Mercredi 11h20";
        else if ($creneau  == 'Mercredi9') return "Mercredi 11h40";
        else if ($creneau  == 'Mercredi10') return "Mercredi 14h";
        else if ($creneau  == 'Mercredi11') return "Mercredi 14h20";
        else if ($creneau  == 'Mercredi12') return "Mercredi 14h40";
        if ($creneau  == 'Jeudi1') return "Jeudi 9h";
        else if ($creneau  == 'Jeudi2') return "Jeudi 9h20";
        else if ($creneau  == 'Jeudi3') return "Jeudi 9h40";
        else if ($creneau  == 'Jeudi4') return "Jeudi 10h";
        else if ($creneau  == 'Jeudi5') return "Jeudi 10h20";
        else if ($creneau  == 'Jeudi6') return "Jeudi 10h40";
        else if ($creneau  == 'Jeudi7') return "Jeudi 11h";
        else if ($creneau  == 'Jeudi8') return "Jeudi 11h20";
        else if ($creneau  == 'Jeudi9') return "Jeudi 11h40";
        else if ($creneau  == 'Jeudi10') return "Jeudi 14h";
        else if ($creneau  == 'Jeudi11') return "Jeudi 14h20";
        else if ($creneau  == 'Jeudi12') return "Jeudi 14h40";
        if ($creneau  == 'Vendredi1') return "Vendredi 9h";
        else if ($creneau  == 'Vendredi2') return "Vendredi 9h20";
        else if ($creneau  == 'Vendredi3') return "Vendredi 9h40";
        else if ($creneau  == 'Vendredi4') return "Vendredi 10h";
        else if ($creneau  == 'Vendredi5') return "Vendredi 10h20";
        else if ($creneau  == 'Vendredi6') return "Vendredi 10h40";
        else if ($creneau  == 'Vendredi7') return "Vendredi 11h";
        else if ($creneau  == 'Vendredi8') return "Vendredi 11h20";
        else if ($creneau  == 'Vendredi9') return "Vendredi 11h40";
        else if ($creneau  == 'Vendredi10') return "Vendredi 14h";
        else if ($creneau  == 'Vendredi11') return "Vendredi 14h20";
        else if ($creneau  == 'Vendredi12') return "Vendredi 14h40";
    }


    function afficheRDVClient($creneau, $idMed, $nomMed, $prenomMed) {
        $horaire = creneauVersHoraire($creneau);
        echo " <h2> Rendez vous $horaire avec $nomMed $prenomMed";
        echo " <button class='cta-button'><a class='calendrier' href='annulationRdv.php?medecin=$idMed&creneau=$creneau'>Annuler ce RDV</a></button>";
        echo " </h2>";
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_handle);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vos Rendez-vous</title>
    <link rel="stylesheet" href="styleaccueil.css">
    <style>
        /* Styles pour la mise en page */
        .medecin {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .dropdown {
            position: relative;
            display: inline-block;
        }

        footer {
            background-color: #87bfdc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e7e7e7;
            margin-top: 20px; /* Ajout d'une marge pour espacer le footer des autres contenus */
        }

        .footer-content a {
            color: #0066cc;
            text-decoration: none;
        }

        .footer-content p {
            margin: 5px 0; /* Espacement entre les paragraphes du footer */
        }
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <h1 class="medicare-title">MEDICARE </h1>
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" >Accueil</a></li>
                <li><a href="toutparcourir_client.php" >Tout Parcourir</a></li>
                <li><a href="recherche.php" >Recherche</a></li>
                <li><a href="appointments.html" class="active">Rendez-vous</a></li>
                <!-- Remplacer "connexion.php" par "votre_compte.php" -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Votre Compte</a>
                    <div class="dropdown-content">
                        <!-- Contenu du menu déroulant avec les informations du patient -->
                        <p>Nom: <span id="patient-nom"><?php echo $_SESSION['nom']; ?></span></p>
                        <p>Prénom: <span id="patient-prenom"><?php echo $_SESSION['prenom']; ?></span></p>
                        <p>Adresse: <span id="patient-prenom"><?php echo $_SESSION['adresseComplete']; ?></span></p>
                        <p>email: <span id="patient-prenom"><?php echo $_SESSION['email']; ?></span></p>
                        <!--<p>Type connexion: <span id="type-connexion"><?php echo $type; ?></span></p>-->
                        <!-- Ajoutez d'autres champs selon les informations du patient que vous souhaitez afficher -->
                    </div>
                </li>
                <li><a href="index.html">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>

<h1>Liste des vos Rendez-vous</h1>
<?php if (!empty($RDVCal)) : ?>
    <?php foreach ($RDVCal as $RDVCalCli) : ?>
        <div class="medecin">
            <?php if ($RDVCalCli['Lundi1'] == $_SESSION['id']) afficheRDVClient("Lundi1", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi2'] == $_SESSION['id']) afficheRDVClient("Lundi2", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi3'] == $_SESSION['id']) afficheRDVClient("Lundi3", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi4'] == $_SESSION['id']) afficheRDVClient("Lundi4", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi5'] == $_SESSION['id']) afficheRDVClient("Lundi5", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi6'] == $_SESSION['id']) afficheRDVClient("Lundi6", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi7'] == $_SESSION['id']) afficheRDVClient("Lundi7", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi8'] == $_SESSION['id']) afficheRDVClient("Lundi8", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi9'] == $_SESSION['id']) afficheRDVClient("Lundi9", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi10'] == $_SESSION['id']) afficheRDVClient("Lundi10", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi11'] == $_SESSION['id']) afficheRDVClient("Lundi11", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Lundi12'] == $_SESSION['id']) afficheRDVClient("Lundi12", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>

            <?php if ($RDVCalCli['Mardi1'] == $_SESSION['id']) afficheRDVClient("Mardi1", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi2'] == $_SESSION['id']) afficheRDVClient("Mardi2", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi3'] == $_SESSION['id']) afficheRDVClient("Mardi3", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi4'] == $_SESSION['id']) afficheRDVClient("Mardi4", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi5'] == $_SESSION['id']) afficheRDVClient("Mardi5", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi6'] == $_SESSION['id']) afficheRDVClient("Mardi6", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi7'] == $_SESSION['id']) afficheRDVClient("Mardi7", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi8'] == $_SESSION['id']) afficheRDVClient("Mardi8", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi9'] == $_SESSION['id']) afficheRDVClient("Mardi9", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi10'] == $_SESSION['id']) afficheRDVClient("Mardi10", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi11'] == $_SESSION['id']) afficheRDVClient("Mardi11", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mardi12'] == $_SESSION['id']) afficheRDVClient("Mardi12", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>

            <?php if ($RDVCalCli['Mercredi1'] == $_SESSION['id']) afficheRDVClient("Mercredi1", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi2'] == $_SESSION['id']) afficheRDVClient("Mercredi2", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi3'] == $_SESSION['id']) afficheRDVClient("Mercredi3", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi4'] == $_SESSION['id']) afficheRDVClient("Mercredi4", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi5'] == $_SESSION['id']) afficheRDVClient("Mercredi5", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi6'] == $_SESSION['id']) afficheRDVClient("Mercredi6", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi7'] == $_SESSION['id']) afficheRDVClient("Mercredi7", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi8'] == $_SESSION['id']) afficheRDVClient("Mercredi8", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi9'] == $_SESSION['id']) afficheRDVClient("Mercredi9", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi10'] == $_SESSION['id']) afficheRDVClient("Mercredi10", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi11'] == $_SESSION['id']) afficheRDVClient("Mercredi11", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Mercredi12'] == $_SESSION['id']) afficheRDVClient("Mercredi12", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>

            <?php if ($RDVCalCli['Jeudi1'] == $_SESSION['id']) afficheRDVClient("Jeudi1", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi2'] == $_SESSION['id']) afficheRDVClient("Jeudi2", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi3'] == $_SESSION['id']) afficheRDVClient("Jeudi3", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi4'] == $_SESSION['id']) afficheRDVClient("Jeudi4", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi5'] == $_SESSION['id']) afficheRDVClient("Jeudi5", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi6'] == $_SESSION['id']) afficheRDVClient("Jeudi6", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi7'] == $_SESSION['id']) afficheRDVClient("Jeudi7", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi8'] == $_SESSION['id']) afficheRDVClient("Jeudi8", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi9'] == $_SESSION['id']) afficheRDVClient("Jeudi9", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi10'] == $_SESSION['id']) afficheRDVClient("Jeudi10", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi11'] == $_SESSION['id']) afficheRDVClient("Jeudi11", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Jeudi12'] == $_SESSION['id']) afficheRDVClient("Jeudi12", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>

            <?php if ($RDVCalCli['Vendredi1'] == $_SESSION['id']) afficheRDVClient("Vendredi1", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi2'] == $_SESSION['id']) afficheRDVClient("Vendredi2", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi3'] == $_SESSION['id']) afficheRDVClient("Vendredi3", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi4'] == $_SESSION['id']) afficheRDVClient("Vendredi4", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi5'] == $_SESSION['id']) afficheRDVClient("Vendredi5", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi6'] == $_SESSION['id']) afficheRDVClient("Vendredi6", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi7'] == $_SESSION['id']) afficheRDVClient("Vendredi7", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi8'] == $_SESSION['id']) afficheRDVClient("Vendredi8", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi9'] == $_SESSION['id']) afficheRDVClient("Vendredi9", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi10'] == $_SESSION['id']) afficheRDVClient("Vendredi10", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi11'] == $_SESSION['id']) afficheRDVClient("Vendredi11", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>
            <?php if ($RDVCalCli['Vendredi12'] == $_SESSION['id']) afficheRDVClient("Vendredi12", $RDVCalCli['id'], $RDVCalCli['nom'], $RDVCalCli['prenom']); ?>

            <!-- Ajoutez d'autres informations à afficher selon vos besoins -->
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Vous n'avez aucun rendez-vous.</p>
<?php endif; ?>
</body>
<footer>
    <div class="footer-content">
        <p>Contactez-nous: <a href="mailto:info@medicare.com">info@medicare.com</a></p>
        <p>Téléphone : <a href="tel:+33171203622">01 71 20 36 22</a></p>
        <p>Adresse : 123 Rue de la Santé, 75013 Paris, France</p>
        <p><a href="https://www.google.com/maps?q=123+Rue+de+la+Sant%C3%A9,+75013+Paris,+France" target="_blank">Voir sur Google Maps</a></p>
    </div>
</footer>
</html>