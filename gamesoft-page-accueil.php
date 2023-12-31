<?php 
session_start(); // Pour rester connecter sur toutes les pages
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMESOFT</title>
    <link rel="stylesheet" href="gamesoft-page-accueil.css">
</head>
<body>
    
    <header>
        <nav class="menu">
            <ul>
            <li class="logo"><img src="IMAGES/LOGO.png" alt=""></li>
            <li><a href="gamesoft-page-accueil.php">Accueil</a></li>
            <li><a href="tous-les-jeux.php">JEUX</a></li>
            <?php
            session_start();

            if (isset($_SESSION['pseudo'])) {
                // L'utilisateur est connecté, affichez le bouton "Se déconnecter"
                echo '<li><button id="deconnect" type="button"><a href="deconnexion.php">Se déconnecter</a></button></li>';
            } else {
                // L'utilisateur n'est pas connecté, affichez le bouton "S'INSCRIRE"
                echo '<li><button id="subscribe" type="button"><a href="http://localhost:8888/test/ECF/inscription-gamesoft.php">S\'INSCRIRE</a></button></li>';
            }
            ?>
         
            </ul>
            <div class="connect"><a href="connexion-gamesoft.php"><img src="IMAGES/LOGO SE CONNECTER.png" alt=""></a></div>
        </nav>
    </header>
    <h1>GAMESOFT</h1>
    <p>"Bienvenue sur GAMESOFT, le site web de jeu vidéo qui allie divertissement et conscience
         environnementale ! Notre plateforme propose une vaste sélection de jeux vidéo captivants mettant 
         en avant des concepts et des défis liés à l'écologie et à la durabilité. Explorez des mondes 
         virtuels magnifiques et découvrez des environnements numériques où la préservation de la
         nature et la protection de l'écosystème sont au cœur du gameplay. Chaque jeu offre des
         mécanismes uniques pour sensibiliser les joueurs aux enjeux environnementaux actuels, 
         tout en leur permettant de contribuer activement à la conservation de la planète. 
         Rejoignez une communauté passionnée de joueurs engagés qui partagent leur enthousiasme
         pour les jeux vidéo tout en œuvrant pour un avenir plus vert. En plus de l'aspect ludique, 
         GAMESOFT s'engage à soutenir des projets écologiques concrets grâce à des partenariats 
         avec des organisations environnementales. Ensemble, nous pouvons prouver que le jeu vidéo
         peut être un outil puissant pour inspirer des changements positifs et durables pour
         notre planète."</p>
         <br>
         <br>
    
    
<!-- Afficher tous les membres -->
<?php
   $recupNews = $bdd->query('SELECT * FROM actualites ORDER BY date DESC');
   while($news = $recupNews->fetch()){ // Boucle pour récupérer les jeux de la table
   ?>
   <div class="news" style="border: 2px solid black; margin-bottom: 10px; padding: 10px;">
   <h3 style="color:thistle;">DATE : <?php echo $news['date']; ?></h3>
    <h2 style="color:gold;">JEU : <?php echo $news['titre']; ?></h2>
    <h3 style="color:white;">Nouveautés : <?php echo $news['news']; ?></h3>
   </div>
    <?php } ?>

<script src="gamesoft-page-accueil.js"></script>
</body>
</html>