<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// Verification si la session contient une valeur pour "mdp"
if(!$_SESSION['mdp']){
    // Si pas de "mdp", rediriger vers la page connexion
    header('Location: connexion-gamesoft.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Espace admin</title>
        <meta charset="utf-8">
    </head>
<body>
<a href="deconnexion.php">
   <button>Se déconnecter</button>
</a>
<br>
<a href="membres.php">
    <button>Afficher tous les membres</button>
</a>
<br>
<a href="publier-membres.php">
    <button>Publier membres</button>
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

<a href="score-jeux.php"><button>Afficher score des jeux</button></a>
</body>
</html>