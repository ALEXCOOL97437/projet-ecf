<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

if (!$_SESSION['mdp']) {
    header('Location: connexion-gamesoft.php');
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'identifiant (id) depuis l'URL
    $getid = $_GET['id'];

     // Récupérer le titre du jeu
     $recupGamesTitle = $bdd->prepare('SELECT titre FROM games WHERE id = ?');
     $recupGamesTitle->execute(array($getid));

     if ($games = $recupGamesTitle->fetch()) {
        $gamesTitle = $games['titre'];
    } else {
        $gamesTitle = 'Titre du jeu non trouvé';
    }


    // Récupère l'id de l'utilisateur   
    if (isset($_SESSION['id'])) {
        $sessionid = $_SESSION['id'];
        $sessionPseudo = $_SESSION['pseudo'];
    } else {
        echo "Veuillez vous connecté pour pursuivre votre requête";
        exit;
    }
    // Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    $actualites = $_POST['games_actualites'];
        
        // Préparer une requête SQL pour insérer un nouveau jeu dans la base de données
        $inserActualites = $bdd->prepare('INSERT INTO actualites(id_jeu, titre, manager, news, date) VALUES (?, ?, ?, ?,NOW())');
        
        // Exécuter la requête SQL en passant les valeurs des champs
        $inserActualites->execute(array($getid, $gamesTitle, $sessionPseudo, $actualites));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau news ajouter"); window.location.href = "actualites.php";</script>';
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une actualité</title>
    <link rel="stylesheet" href="avis.css">
</head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.php">JEUX</a></li>
            </ul>
        </nav>
    </header>
    <form method="POST" action="" class="forme-container">
    <div class="input-group">
            <label style="color: white;" for="actualites">Ajouter une actualité</label>
            <input type="text" id="games_actualites" name="games_actualites">
        </div>
    <div class="input-action">
        <button type="submit" id="buttonAddActualites" name="envoi">Ajouter une actualité</button>
    </div>
    </form>

</body>
</html>
