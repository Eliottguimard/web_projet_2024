
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleaccueil.css">
    <title>Créer compte</title>

    <style>

        .box-creer-compte {
            margin-left: 15%;
            margin-top: 5%;
            padding: 20px;
            width: 500px;
            /*max-width: 350px; *//* Limite la largeur de la FAQ pour ne pas être trop large */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background: #f9f9f9;

            display: flex; /* Ajout */
            /*justify-content: center;*/ /* Ajout */
            /*align-items: center;*/ /* Ajout */
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
            margin-left: 50%;
        }

        .champs{
            background-color: #82b3d6;
            color: #fff;
            border: 1px;
            border-color: black;
            padding: 5px 20px;
            margin-bottom: 5px;
            cursor: text;
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
                <li><a href="search.html">Recherche</a></li>
                <li><a href="connexion.php"  class="active">Se connecter</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="box-creer-compte">

    <form action="gestion_creation_compte.php" method="post">
        <h2>Création de mon compte</h2>
        <label>Votre prénom :</label><br>
        <input type="text" class="champs" name="prenom"><br><br>
        <label>Votre nom :</label><br>
        <input type="text" class="champs" name="nom"><br><br>
        <label>Choisir Login :</label><br>
        <input type="text" class="champs" name="login"><br><br>
        <?php
        // Afficher le message d'erreur si le login est déjà pris
        if(isset($_GET['error']) && $_GET['error'] == 'login_taken') {
            echo "<p style='color: red;'>Le login saisi est déjà pris par un autre utilisateur. Veuillez en choisir un autre.</p>";
        }
        ?>
        <label>Choisir un mot de passe :</label><br>
        <input type="password" class="champs" name="mdp"><br><br>
        <h3>Vos coordonées</h3>
        <label>Addresse en ligne 1 : </label><br>
        <input type="text" class="champs" name="adresse_ligne_1"><br><br>
        <label>Addresse en ligne 2 : </label><br>
        <input type="text" class="champs" name="adresse_ligne_2"><br><br>
        <label>Pays: :</label><br>
        <input type="text" class="champs" name="pays"><br><br>
        <label>Ville : </label><br>
        <input type="text" class="champs" name="ville"><br><br>
        <label>Code postal : </label><br>
        <input type="text" class="champs" name="code_postal"><br><br>
        <label>Téléphone :</label><br>
        <input type="text" class="champs" name="téléphone"><br><br>
        <label>Numéro carte vitale :</label><br>
        <input type="text" class="champs" name="carte_vitale"><br><br>
        <h3>Vos coordonées bancaires </h3>
        <label>Type de carte de paiement :</label><br>
        <input type="text" class="champs" name="ctype_carte_paiement"><br><br>
        <label>Nom sur la carte  :</label><br>
        <input type="text" class="champs" name="nom_carte"><br><br>
        <label>Numéro carte paiement :</label><br>
        <input type="password" class="champs" name="numero_carte"><br><br>
        <label>Date d'expiration de la carte :</label><br>
        <input type="date" class="champs" name="date_expiration_carte"><br><br>
        <label>Code de sécurité : </label><br>
        <input type="text" class="champs" name="code_securite"><br><br>
        <input id="valid" class="cta-button" type="submit" value="Créer mon compte">
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