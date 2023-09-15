<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

$games = $bdd->query('SELECT titre FROM games');

if(isset($_GET['search']) AND !empty($_GET['search'])) {
   $search = htmlspecialchars($_GET['search']);

   $games = $bdd->query('SELECT titre FROM games WHERE titre LIKE"%'.$search.'%"'); // Concatenation de % = affiche tous les résultats avec les caractères mentionnés lors de la recherche

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMESOFT-TOUS-LES-JEUX</title>
    <link rel="stylesheet" href="tous-les-jeuxx.css">
</head>
<body>
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
    <form method="get">
        <input type="search" name="search" placeholder="Recherche..." autocomplete="off">
        <input type="submit" value="Valider">
    </form>
    <?php if($games->rowCount() > 0) { ?>
        <ul>
            <?php while($a = $games->fetch()) { ?>
                <li><?= $a['titre'] ?></li>
            <?php } ?>
        </ul>
    <?php } else { ?>
    Aucun résultat pour: <?php echo $search ?>
    <?php } ?>
 
    <div class="blocs">
        <div class="jeu1" name="Président devil"><a href="fiche-jeu1.php"><img src="IMAGES/Wo Long  Fallen Dynasty Screenshot 004.png" alt=""></a></div>
        <div class="jeu2"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu3"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu4"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu5"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu6"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu7"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu8"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu9"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
        <div class="jeu10"><a href=""><img src="IMAGES/IMAGE ARRIERE PLAN.png" alt=""></a></div>
    </div>
    <script src="tous-les-jeux.js"></script>
</body>
</html>