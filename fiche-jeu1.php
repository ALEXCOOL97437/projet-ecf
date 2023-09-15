<?php 
session_start(); // Pour rester connecter sur toutes les pages
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// ID du jeu que vous souhaitez afficher
$gameId = 1; // Vous pouvez changer cet ID en fonction de vos besoins

// Requête SQL pour récupérer les informations du jeu avec l'ID spécifié
$requete = $bdd->prepare('SELECT * FROM games WHERE id = ?');
$requete->execute(array($gameId));

// Vérifiez si le jeu existe
if ($requete->rowCount() > 0) {
    $games = $requete->fetch(); // Récupérez les données du jeu

    // Réquête SQL pour compter le nombre de likes
    $requeteLikes = $bdd->prepare('SELECT COUNT(*) AS total_likes FROM likes WHERE id_jeu = ?');
    $requeteLikes->execute(array($gameId));
    $likeData = $requeteLikes->fetch();

    // Récupérer le nombre de likes
    $likes = $likeData['total_likes'];
} else {
    // Le jeu n'a pas été trouvé, vous pouvez afficher un message d'erreur ou rediriger l'utilisateur
    echo "Jeu non trouvé.";
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jeu['titre']; ?></title>
    <link rel="stylesheet" href="fiche-jeux.css">
</head>
<body style="background-image: url('IMAGES/IMAGE\ ARRIERE\ PLAN.png'); background-size: cover;">
    <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="">JEUX</a></li>
            <li><button id="subscribe" type="button"><a href="inscription-gamesoft.php">S'INSCRIRE</a></button></li>
            </ul>
            <div class="connect"><a href="connexion-gamesoft.php"><img src="IMAGES/LOGO SE CONNECTER.png" alt=""></a></div>
        </nav>
    </header>
    <div class="bloc-container">
            <div class="bloc1"><video width="500" height="400" controls><source src="IMAGES/Wo Long  Fallen Dynasty 2023.07.31 - 22.24.09.02.mp4"></video></div>
            <div class="bloc2">
                <ul class="description" style="color:ghostwhite">
                    <li>TITRE : <?php echo $games['titre'];?></li>
                    <br>
                    <li>STUDIO : <?php echo $games['studio'];?></li>
                    <br>
                    <li>SUPPORT : <?php echo $games['support'];?></li>
                    <br>
                    <li>PRIORITE DEVELOPPEMENT : <?php echo $games['priorite_developpement'];?></li>           
                    <br>
                    <li>MOTEUR : <?php echo $games['moteur'];?></li>
                    <br>
                    <li>DATE DE CREATION : <?php echo $games['date_creation'];?></li>
                    <br>
                    <li>DERNIERE MAJ : <?php echo $games['date_maj'];?></li>
                    <br>
                    <li>DATE DE SORTIE : <?php echo $games['date_sortie'];?></li>
                    <br>
                    <li>STATUT : <?php echo $games['statut'];?></li>
                    <br>
                    <li>TYPE : <?php echo $games['genre'];?></li>
                    <br>
                    <li>NOMBRE DE JOUEUR : <?php echo $games['nombre_joueurs'];?></li>
                    <br>
                    <li>Score : <?php echo $likes; ?></li>
                    <br>
                    <li><a href="favoris.php?t=1&id=<?php echo $games['id']; ?>">
                    <button style="color:white; background-color: green; margin-bottom: 10px;">Mettre en favoris</button>
                    </a></li>
                    <li><a href="favoris.php?t=2&id=<?php echo $games['id']; ?>">
                    <button style="color:black; background-color: yellow; margin-bottom: 10px;">Supprimer favoris</button>
                    </a></li>
                    <li><a href="publier-avis.php?t=2&id=<?php echo $games['id']; ?>">
                    <button style="color:white; background-color: orange; margin-bottom: 10px;">Publier un avis</button>
                    </a></li>
                    <li><a href="avis.php?t=2&id=<?php echo $games['id']; ?>">
                    <button style="color:black; background-color: orange; margin-bottom: 10px;">Voir les avis du jeu</button>
                    </a></li>
                </ul>
            </div>
    </div>
        <h2>A propos du jeu</h2>
            <p class="descriptif" style="color: ghostwhite;"><?php echo $games['descriptif']; ?> </p>
            <div class="blocs">
                <div class="image1"><a href="IMAGES/Wo Long  Fallen Dynasty Screenshot 001.png"><img src="IMAGES/Wo Long  Fallen Dynasty Screenshot 001.png" alt=""></a></div>
                <div class="image2"><a href="IMAGES/Wo Long  Fallen Dynasty Screenshot 002.png"><img src="IMAGES/Wo Long  Fallen Dynasty Screenshot 002.png" alt=""></a></div>
                <div class="image3"><a href="IMAGES/Wo Long  Fallen Dynasty Screenshot 003.png"><img src="IMAGES/Wo Long  Fallen Dynasty Screenshot 003.png" alt=""></a></div>
            </div>
    <script src="fiche-jeu1.js"></script>
</body>
</html>