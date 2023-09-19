<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer l'identifiant (id) depuis l'URL
    $getid = $_GET['id'];

    // Préparer une requête SQL pour récupérer tous les avis liés à ce jeu
    $recupAvis = $bdd->prepare('SELECT * FROM avis WHERE id_jeu = ? ORDER BY id DESC');
    $recupAvis->execute(array($getid));

    // Vérifier si des avis existent pour ce jeu
    if ($recupAvis->rowCount() > 0) {

        // Boucle pour afficher tous les avis
        while ($avisInfo = $recupAvis->fetch()) {
            $pseudo = $avisInfo['pseudo'];
            $avis = $avisInfo['games_avis'];
            $date = $avisInfo['date'];

            // Afficher les avis
            echo '<div class="game-info" style="border: 2px solid black; margin-bottom: 10px;  padding: 10px;">';
            echo '<p>Date :'.$date .'</p>';
            echo '<h1>'.$pseudo .'</h1>';
            echo '<p>Avis :'.$avis .'</p>';
            echo '</div>';
        }
    } else {
        echo "Aucun avis trouvé pour ce jeu.";
    }
} else {
    echo "Aucun jeu trouvé.";
}
?>


