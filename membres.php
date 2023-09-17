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
    <title>Afficher les membres</title>
    <link rel="stylesheet" href="membres.css">
</head>
<body>
   <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <li><a href="membres.php">Membres</a></li>
            <li><a href="publier-membres.php">Publier membres</a></li>
            <li><a href="jeux.php">Voir jeux</a></li>
            <li><a href="publier-jeux.php">Publier jeux</a></li>
            <li><a href="score-jeux.php">Score des jeux</a></li>
          
        </nav>
    </header>

<!-- Afficher tous les membres -->
<?php
   $recupUsers = $bdd->query('SELECT * FROM producteurs');
   while($user = $recupUsers->fetch()){ // Boucle pour récupérer les membres de la table
    ?>
 <div class="membres" style="border: 1px solid black; margin-bottom: 10px;  padding: 10px;">
    <p style="color: white;"><?php echo $user['pseudo']; ?></p>
     <a href="bannir.php?id=<?= $user['id']; ?>">
     <button style="color:white; background-color: red; margin-bottom: 10px;">Bannir le membre</button></a>
    <a href="gerer-membres.php?id=<?= $user['id']; ?>">
    <button style="color:white; background-color: blue; margin-bottom: 10px;">Modifier le membre</button></a></p>
 </div>
    <?php
   }
?>
</body>
</html>