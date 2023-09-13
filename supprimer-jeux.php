<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');

// Vérifie si un id est présent dans l'URL et s'il n'est pas vide
if(isset($_GET['id']) AND !empty($_GET['id'])){

   // Récupère l'id depuis l'URL
   $getid = $_GET['id'];

   // // Prépare une requête SQL pour récupérer les informations du jeu correspondant à l'identifiant
   $recupGames = $bdd->prepare('SELECT * FROM games WHERE id = ?');
   $recupGames->execute(array($getid));

   // Vérifie si le jeu existe dans la base de données
   if($recupGames->rowCount() > 0){

      // Préparer une requête SQL pour supprimer le jeu de la base de données
      $deleteGames = $bdd->prepare('DELETE FROM games WHERE id = ?');
      $deleteGames->execute(array($getid));

      header('Location: jeux.php');

   }else{
    echo "Aucun jeu n'a été trouvé";
   }
}else{
   echo "L'identifiant n'a pas été récupérer";
}
?>