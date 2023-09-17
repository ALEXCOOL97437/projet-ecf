<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

// Pour reporter les erreurs rencontrer
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Vérifie si les paramètres 't' et 'id' existent dans l'URL et ne sont pas vide
if(isset($_GET['t'],$_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])){
//Convertit les valeurs de 'id' et 't' en entiers
   $getid = (int) $_GET['id'];
   $gett = (int) $_GET['t'];

    // Récupère l'id de l'utilisateur   
    if (isset($_SESSION['id'])) {
        $sessionid = $_SESSION['id'];
        $sessionPseudo = $_SESSION['pseudo'];
    } else {
        echo "Veuillez vous connecté pour pursuivre votre requête";
        exit;
    }
   

    //Récupère les jeux de la base de données
    $check = $bdd->prepare('SELECT id FROM games WHERE id = ?');
    $check->execute(array($getid));
 
    //Si le jeu existe
    if($check->rowCount() == 1) {
        if($gett == 1) {
            //Vérifie si l'utilisateur a déjà aimé l'article
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_jeu = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));

            //Vérifie si l'utilisateur a déjà disliké l'article
            $check_dislike = $bdd->prepare('SELECT id FROM dislikes WHERE id_jeu = ? AND id_membre = ?');
            $check_dislike->execute(array($getid,$sessionid));

            //Supprime le dislike si déjà disliké
            $del = $bdd->prepare('DELETE FROM dislikes WHERE id_jeu = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));

            //Supprime le like si déjà liké
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM likes WHERE id_jeu = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));

            }else{
                //Sinon ajoute un like
                $ins = $bdd->prepare('INSERT INTO likes (id_jeu, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        }elseif($gett == 2) {
            //Vérifie si déjà disliké
            $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_jeu = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));

            //Supprime like si déjà liké
            $del = $bdd->prepare('DELETE FROM likes WHERE id_jeu = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));

            //Supprime dislike si déjà disliké
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM dislikes WHERE id_jeu = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));

            }else{
                //Sinon ajoute un dislike
                $ins = $bdd->prepare('INSERT INTO dislikes (id_jeu, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        }//Redirige l'utilisateur sur l'article liké ou dislké
         header("Location: tous-les-jeux.php?id=$getid");
    } else {
        //Affiche un message d"erreur si l'article n'existe pas
        echo('Erreur fatale. <a href="http://localhost:8888/test/ECF/tous-les-jeux.php">Revenir à l\'accueil</a>');
   }
}


// Vérifier si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    $avis = $_POST['games_avis'];
        
        // Préparer une requête SQL pour insérer un nouveau jeu dans la base de données
        $inserAvis = $bdd->prepare('INSERT INTO avis(id_jeu, pseudo, games_avis) VALUES (?, ?, ?)');
        
       // Exécuter la requête SQL en passant les valeurs des champs
        $inserAvis->execute(array($getid, $sessionPseudo, $avis));

        // Afficher un message de succès si l'insertion a réussi
        echo '<script>alert("Bonjour, nouveau avis ajouter"); window.location.href = "tous-les-jeux.php";</script>';
    }

?>


<!--<!DOCTYPE html>
<html>
<head>
    <title>Publier un Avis</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
    <div class="input-group">
            <label for="avis">Ajouter un avis</label>
            <input type="text" id="games_avis" name="games_avis">
        </div>
    <div class="input-action">
        <button type="submit" id="buttonAddAvis" name="envoi">Ajouter un avis</button>
    </div>
    </form>

</body>
</html> -->