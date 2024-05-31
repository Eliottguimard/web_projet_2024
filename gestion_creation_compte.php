<?php
// Identifier le nom de la base de données
$database = "medicare";

// Connectez-vous à votre base de données
// Rappel: votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($db_found) {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $adresse_ligne1 = $_POST['adresse_ligne_1'];
    $adresse_ligne2 = $_POST['adresse_ligne_2'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $telephone = $_POST['téléphone'];
    $carte_vitale = $_POST['carte_vitale'];
    $type_carte_paiement = $_POST['ctype_carte_paiement'];
    $nom_carte = $_POST['nom_carte'];
    $numero_carte = $_POST['numero_carte'];
    $date_expiration_carte = $_POST['date_expiration_carte'];
    $code_securite = $_POST['code_securite'];

    // Vérifier si le login existe déjà
    $check_sql = "SELECT * FROM clients WHERE login = '$login'";
    $check_result = mysqli_query($db_handle, $check_sql);

    if(mysqli_num_rows($check_result) > 0) {
        // Le login existe déjà, rediriger vers la page de création de compte avec un message d'erreur
        header("Location: creer_compte.php?error=login_taken");
        exit();
    }

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO clients (nom, prenom, adresse_ligne1, adresse_ligne2, ville, code_postal, pays, telephone, carte_vitale, type_carte_paiement, numero_carte, nom_carte, date_expiration_carte, code_securite, login, mdp, type) 
            VALUES ('$nom', '$prenom', '$adresse_ligne1', '$adresse_ligne2', '$ville', '$code_postal', '$pays', '$telephone', '$carte_vitale', '$type_carte_paiement', '$numero_carte', '$nom_carte', '$date_expiration_carte', '$code_securite', '$login', '$mdp', 'client')";

    // Exécuter la requête SQL
    $result = mysqli_query($db_handle, $sql);

    // Vérifier si l'insertion a réussi
    if($result) {
        header("location:compte_reussi.html");
    } else {
        echo "Erreur : " . mysqli_error($db_handle);
    }

    // Fermer la connexion
    mysqli_close($db_handle);
} else {
    echo "Base de données non trouvée";
}
?>
