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
    <title>Afficher les jeux</title>
    <link rel="stylesheet" href="membres.css">
    
</head>
<body>
<header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <li><a href="score-jeux.php">Score des jeux</a></li>
          
        </nav>
    </header>

<!-- Afficher tous les jeux -->
<?php
   $recupGames = $bdd->query('SELECT * FROM games');
   while($games = $recupGames->fetch()){ // Boucle pour récupérer les jeux de la table
    ?>
 <div class="jeux" style="border: 1px solid black;">
    <p style="color: white;"><?php echo $games['titre']; ?></p>
     <a href="publier-actualites.php?id=<?= $games['id']; ?>">
     <button style="color:black; background-color: yellow; margin-bottom: 10px;">Mettre une news</button></a> <!-- ce code affiche le pseudo de l'utilisateur dans un paragraphe HTML et fournit également un lien hypertexte vers un script de bannissement en utilisant l'ID de l'utilisateur comme paramètre dans l'URL. -->
    <a href="infos-jeux.php?id=<?= $games['id']; ?>">
    <button style="color:white; background-color: orange; margin-bottom: 10px;">Infos du jeu</button></a></p>
 </div>
    <?php
   }
?>
</body>
</html>