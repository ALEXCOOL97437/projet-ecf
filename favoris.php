<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// Pour reporter les erreurs rencontrer
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Vérifie si les paramètres 't' et 'id' existent dans l'URL et ne sont pas vide
if(isset($_GET['t'],$_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])){
//Convertit les valeurs de 'id' et 't' en entiers
   $getid = (int) $_GET['id'];
   $gett = (int) $_GET['t'];

   //$sessionid = $_SESSION['id'];
   $sessionid = 4;

    //Récupère les articles de la base de données
    $check = $bdd->prepare('SELECT id FROM articles WHERE id = ?');
    $check->execute(array($getid));
 
    //Si l'article existe
    if($check->rowCount() == 1) {
        if($gett == 1) {
            //Vérifie si l'utilisateur a déjà aimé l'article
            $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));

            //Vérifie si l'utilisateur a déjà disliké l'article
            $check_dislike = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $check_dislike->execute(array($getid,$sessionid));

            //Supprime le dislike si déjà disliké
            $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));

            //Supprime le like si déjà liké
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));

            }else{
                //Sinon ajoute un like
                $ins = $bdd->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        }elseif($gett == 2) {
            //Vérifie si déjà disliké
            $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));

            //Supprime like si déjà liké
            $del = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));

            //Supprime dislike si déjà disliké
            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));

            }else{
                //Sinon ajoute un dislike
                $ins = $bdd->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        }//Redirige l'utilisateur sur l'article liké ou dislké
          header('Location: http://localhost:8888/test/ADMIN/fiche-jeu.php?id='.$getid);
    } else {
        //Affiche un message d"erreur si l'article n'existe pas
        echo('Erreur fatale. <a href="http://localhost:8888/test/ADMIN/fiche-jeu1.php">Revenir à l\'accueil</a>');
   }
} else {
    echo('Erreur fatale. <a href="http://localhost:8888/test/ADMIN/fiche-jeu1.php">Revenir à l\'accueil</a>');
}

?> 