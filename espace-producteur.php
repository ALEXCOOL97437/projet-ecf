<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

// Verification si la session contient une valeur pour "mdp"
if(!$_SESSION['mdp']){
    // Si pas de "mdp", rediriger vers la page connexion
   header('Location: connexion-gamesoft.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace producteur</title>
        <link rel="stylesheet" href="admin.css">
    </head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <li><a href="publier-jeux.php">Publier jeux</a></li>
            <li><a href="jeux.php">Voir jeux</a></li>
            <li><a href="score-jeux.php">Score des jeux</a></li>
          
        </nav>
    </header>

<!--
<a href="deconnexion.php">
   <button>Se déconnecter</button>
</a>
<br>
<a href="publier-jeux.php">
    <button>Publier jeux</button>
</a>
<br>
<a href="jeux.php">
    <button>Afficher tous les jeux</button>
</a>
<br>
<a href="score-jeux.php"><button>Afficher score des jeux</button></a> -->
</body>
</html>