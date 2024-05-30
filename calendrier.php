<?php
session_start(); // Démarrer la session
$IDMedecin = $_GET["medecin"];
//echo $IDMedecin;

// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

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
    if ($result = mysqli_query($db_handle, $cal))
    {
        if ($row = mysqli_fetch_assoc($result))
        {
            $L1 = $row['Lundi1'];
            $L2 = $row['Lundi2'];
            $L3 = $row['Lundi3'];
            $L4 = $row['Lundi4'];
            $L5 = $row['Lundi5'];
            $L6 = $row['Lundi6'];
            $L7 = $row['Lundi7'];
            $L8 = $row['Lundi8'];
            $L9 = $row['Lundi9'];
            $L10 = $row['Lundi10'];
            $L11 = $row['Lundi11'];
            $L12 = $row['Lundi12'];
            $M1 = $row['Mardi1'];
            $M2 = $row['Mardi2'];
            $M3 = $row['Mardi3'];
            $M4 = $row['Mardi4'];
            $M5 = $row['Mardi5'];
            $M6 = $row['Mardi6'];
            $M7 = $row['Mardi7'];
            $M8 = $row['Mardi8'];
            $M9 = $row['Mardi9'];
            $M10 = $row['Mardi10'];
            $M11 = $row['Mardi11'];
            $M12 = $row['Mardi12'];
            $Me1 = $row['Mercredi1'];
            $Me2 = $row['Mercredi2'];
            $Me3 = $row['Mercredi3'];
            $Me4 = $row['Mercredi4'];
            $Me5 = $row['Mercredi5'];
            $Me6 = $row['Mercredi6'];
            $Me7 = $row['Mercredi7'];
            $Me8 = $row['Mercredi8'];
            $Me9 = $row['Mercredi9'];
            $Me10 = $row['Mercredi10'];
            $Me11 = $row['Mercredi11'];
            $Me12 = $row['Mercredi12'];
            $J1 = $row['Jeudi1'];
            $J2 = $row['Jeudi2'];
            $J3 = $row['Jeudi3'];
            $J4 = $row['Jeudi4'];
            $J5 = $row['Jeudi5'];
            $J6 = $row['Jeudi6'];
            $J7 = $row['Jeudi7'];
            $J8 = $row['Jeudi8'];
            $J9 = $row['Jeudi9'];
            $J10 = $row['Jeudi10'];
            $J11 = $row['Jeudi11'];
            $J12 = $row['Jeudi12'];
            $V1 = $row['Vendredi1'];
            $V2 = $row['Vendredi2'];
            $V3 = $row['Vendredi3'];
            $V4 = $row['Vendredi4'];
            $V5 = $row['Vendredi5'];
            $V6 = $row['Vendredi6'];
            $V7 = $row['Vendredi7'];
            $V8 = $row['Vendredi8'];
            $V9 = $row['Vendredi9'];
            $V10 = $row['Vendredi10'];
            $V11 = $row['Vendredi11'];
            $V12 = $row['Vendredi12'];
        }
        else $existeCalendrier = false;
    }
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
        {
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
        .RemplirCaseLibre{
            background-color: white;
            color: white;
        }
        .maResa{
            background-color: red;
            color: red;
        }
        .RemplirCase {
            background-color: #0066cc;
            bgcolor: #0066cc;
            /*color: #fff;
            border: none;
             padding: 10px 20px;
            margi-bottom: 30px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;*/
        }
        .NoircirCase {
            background-color: black;
            bgcolor: black;
        }
    </style>
    <title>Planning</title>
</head>
<body>
<header>
    <div class="header-content">
        <img src="logo.png" alt="Medicare Logo" class="logo">
        <nav class="main-nav">
            <ul>
                <li><a href="index_client.php" class="active">Accueil</a></li>
                <li><a href="toutparcourir.php">Tout Parcourir</a></li>
                <li><a href="search.html">Recherche</a></li>
                <li><a href="appointments.html">Rendez-vous</a></li>
                <!-- Remplacer "connexion.php" par "votre_compte.php" -->
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
    <p>
        <h1> Médecin <?php echo $prenomMedecin, " ", $nomMedecin, " " ?></h1>
        <h4> Contact : <?php echo $telephoneMedecin?> </h4>
        <h2> Spécialité <?php echo $specialiteMedecin ?></h2>
    </p>
    <table border="3" >
        <tr>
            <td>   </td>
            <td>Lundi</td>
            <td>Mardi</td>
            <td>Mercredi</td>
            <td>Jeudi</td>
            <td>Vendredi</td>
        </tr>
        
        <tr>
            <td>9h</td>
            <?php
            if ($L1 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L1 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi1'</a>Votre Rdv</td>";} else if ($L1 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi1'</a>Prendre RDV</td>"; }
            if ($M1 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M1 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi1'</a>Votre Rdv</td>";}else if ($M1 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi1'</a>Prendre RDV</td>"; }
            if ($Me1 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me1 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi1'</a>Votre Rdv</td>";}else if ($Me1 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi1'</a>Prendre RDV</td>"; }
            if ($J1 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J1 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi1'</a>Votre Rdv</td>";}else if ($J1 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi1'</a>Prendre RDV</td>"; }
            if ($V1 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V1 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi1'</a>Votre Rdv</td>";}else if ($V1 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi1'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>9h 20</td>
            <?php
            if ($L2 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L2 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi2'</a>Votre Rdv</td>";} else if ($L2 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi2'</a> Prendre RDV</td>"; }
            if ($M2 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M2 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi2'</a>Votre Rdv</td>";} else if ($M2 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi2'</a>Prendre RDV</td>"; }
            if ($Me2 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me2 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi2'</a>Votre Rdv</td>";} else if ($Me2 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi2'</a>Prendre RDV</td>"; }
            if ($J2 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J2 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi2'</a>Votre Rdv</td>";} else if ($J2 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi2'</a>Prendre RDV</td>"; }
            if ($V2 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V2 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi2'</a>Votre Rdv</td>";} else if ($V2 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi2'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>9h 40</td>
            <?php
            if ($L3 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L3 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi3'</a>Votre Rdv</td>";} else if ($L3 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi3'</a> Prendre RDV</td>"; }
            if ($M3 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M3 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi3'</a>Votre Rdv</td>";} else if ($M3 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi3'</a>Prendre RDV</td>"; }
            if ($Me3 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me3 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi3'</a>Votre Rdv</td>";} else if ($Me3 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi3'</a>Prendre RDV</td>"; }
            if ($J3 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J3 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi3'</a>Votre Rdv</td>";} else if ($J1 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi3'</a>Prendre RDV</td>"; }
            if ($V3 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V3 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi3'</a>Votre Rdv</td>";} else if ($V3 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi3'</a>Prendre RDV</td>"; }
            ?>
        </tr>
        
        <tr>
            <td>10h </td>
            <?php
            if ($L4 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L4 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi4'</a>Votre Rdv</td>";} else if ($L4 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi4'</a> Prendre RDV</td>"; }
            if ($M4 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M4 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi4'</a>Votre Rdv</td>";} else if ($M4 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi4'</a>Prendre RDV</td>"; }
            if ($Me4 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me4 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi4'</a>Votre Rdv</td>";} else if ($Me4 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi4'</a>Prendre RDV</td>"; }
            if ($J4 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J4 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi4'</a>Votre Rdv</td>";} else if ($J4 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi4'</a>Prendre RDV</td>"; }
            if ($V4 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V4 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=vendredi4'</a>Votre Rdv</td>";} else if ($V4 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi4'</a>Prendre RDV</td>"; }
            ?>
        </tr>
        
        <tr>
            <td>10h 20</td>
            <?php
            if ($L5 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L5 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi5'</a>Votre Rdv</td>";} else if ($L5 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi5'</a> Prendre RDV</td>"; }
            if ($M5 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M5 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi5'</a>Votre Rdv</td>";} else if ($M5 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi5'</a>Prendre RDV</td>"; }
            if ($Me5 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me5 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi5'</a>Votre Rdv</td>";} else if ($Me5 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi5'</a>Prendre RDV</td>"; }
            if ($J5 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J5 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi5'</a>Votre Rdv</td>";} else if ($J5 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi5'</a>Prendre RDV</td>"; }
            if ($V5 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V5 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi5'</a>Votre Rdv</td>";} else if ($V5 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi5'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>10h 40</td>
            <?php
            if ($L6 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L6 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi6'</a>Votre Rdv</td>";} else if ($L6 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi6'</a> Prendre RDV</td>"; }
            if ($M6 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M6 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi6'</a>Votre Rdv</td>";} else if ($M6 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi6'</a>Prendre RDV</td>"; }
            if ($Me6 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me6 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi6'</a>Votre Rdv</td>";} else if ($Me6 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi6'</a>Prendre RDV</td>"; }
            if ($J6 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J6 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi6'</a>Votre Rdv</td>";} else if ($J6 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi6'</a>Prendre RDV</td>"; }
            if ($V6 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V6 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi6'</a>Votre Rdv</td>";} else if ($V6 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi6'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>11h</td>
            <?php
            if ($L7 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L7 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi7'</a>Votre Rdv</td>";} else if ($L7 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi7'</a> Prendre RDV</td>"; }
            if ($M7 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M7 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi7'</a>Votre Rdv</td>";} else if ($M7 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi7'</a>Prendre RDV</td>"; }
            if ($Me7 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me7 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi7'</a>Votre Rdv</td>";} else if ($Me7 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi7'</a>Prendre RDV</td>"; }
            if ($J7 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J7 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi7'</a>Votre Rdv</td>";} else if ($J7 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi7'</a>Prendre RDV</td>"; }
            if ($V7 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V7 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi7'</a>Votre Rdv</td>";} else if ($V7 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi7'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>11h 20</td>
            <?php
            if ($L8 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L8 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi8'</a>Votre Rdv</td>";} else if ($L8 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi8'</a> Prendre RDV</td>"; }
            if ($M8 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M8 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi8'</a>Votre Rdv</td>";} else if ($M8 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi8'</a>Prendre RDV</td>"; }
            if ($Me8 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me8 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi8'</a>Votre Rdv</td>";} else if ($Me8 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi8'</a>Prendre RDV</td>"; }
            if ($J8 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J8 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi8'</a>Votre Rdv</td>";} else if ($J8 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi8'</a>Prendre RDV</td>"; }
            if ($V8 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V8 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi8'</a>Votre Rdv</td>";} else if ($V8 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi8'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>11h 40</td>
            <?php
            if ($L9 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L9 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi9'</a>Votre Rdv</td>";} else if ($L9 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi9'</a> Prendre RDV</td>"; }
            if ($M9 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M9 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi9'</a>Votre Rdv</td>";} else if ($M9 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi9'</a>Prendre RDV</td>"; }
            if ($Me9 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me9 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi9'</a>Votre Rdv</td>";} else if ($Me9 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi9'</a>Prendre RDV</td>"; }
            if ($J9 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J9 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi9'</a>Votre Rdv</td>";} else if ($J9 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi9'</a>Prendre RDV</td>"; }
            if ($V9 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V9 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi9'</a>Votre Rdv</td>";} else if ($V9 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi9'</a>Prendre RDV</td>"; }
            ?>
        </tr>
        <tr>
            <td>12h - 14h</td>
            <td class='NoircirCase'> <?php echo "."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
        </tr>
        <tr>
            <td> </td>
            <td class='NoircirCase'> <?php echo "."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
            <td class='NoircirCase'> <?php echo " ."?> </td>
        </tr>

        <tr>
            <td>14h</td>
            <?php
            if ($L10 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L10 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi10'</a>Votre Rdv</td>";} else if ($L10 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi10'</a> Prendre RDV</td>"; }
            if ($M10 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M10 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi10'</a>Votre Rdv</td>";} else if ($M10 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi10'</a>Prendre RDV</td>"; }
            if ($Me10 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me10 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi10'</a>Votre Rdv</td>";} else if ($Me10 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi10'</a>Prendre RDV</td>"; }
            if ($J10 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J10 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi10'</a>Votre Rdv</td>";} else if ($J10 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi10'</a>Prendre RDV</td>"; }
            if ($V10 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V10 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi10'</a>Votre Rdv</td>";} else if ($V10 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi10'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>14h 20</td>
            <?php
            if ($L11 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L11 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi11'</a>Votre Rdv</td>";} else if ($L11 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi11'</a> Prendre RDV</td>"; }
            if ($M11 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M11 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi11'</a>Votre Rdv</td>";} else if ($M11 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi11'</a>Prendre RDV</td>"; }
            if ($Me11 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me11 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi11'</a>Votre Rdv</td>";} else if ($Me11 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi11'</a>Prendre RDV</td>"; }
            if ($J11 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J11 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi11'</a>Votre Rdv</td>";} else if ($J11 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi11'</a>Prendre RDV</td>"; }
            if ($V11 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V11 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi11'</a>Votre Rdv</td>";} else if ($V11 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi11'</a>Prendre RDV</td>"; }
            ?>
        </tr>

        <tr>
            <td>14h 40</td>
            <?php
            if ($L12 == -1) { echo " <td class='RemplirCase'> Indisponible</td>"; } else if ($L12 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Lundi12'</a>Votre Rdv</td>";} else if ($L12 >=1) { echo "<td class='RemplirCase'>    Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Lundi12'</a> Prendre RDV</td>"; }
            if ($M12 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($M12 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mardi12'</a>Votre Rdv</td>";} else if ($M12 >=1) { echo " <td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mardi12'</a>Prendre RDV</td>"; }
            if ($Me12 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($Me12 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Mercredi12'</a>Votre Rdv</td>";} else if ($Me12 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Mercredi12'</a>Prendre RDV</td>"; }
            if ($J12 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($J12 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Jeudi12'</a>Votre Rdv</td>";} else if ($J12 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Jeudi12'</a>Prendre RDV</td>"; }
            if ($V12 == -1) { echo " <td class='RemplirCase'>Indisponible</td>"; } else if ($V12 ==$_SESSION['id']){ echo " <td class='maResa'><a href='annulationRdv.php?medecin=$IDMedecin&creneau=Vendredi12'</a>Votre Rdv</td>";} else if ($V12 >=1) { echo "<td class='RemplirCase'>   Pris   </td>"; } else { echo "<td class='RemplirCaseLibre'> <a href='validationRdv.php?medecin=$IDMedecin&creneau=Vendredi12'</a>Prendre RDV</td>"; }
            ?>
        </tr>
    </table>

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