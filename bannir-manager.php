<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

if(isset($_GET['id']) AND !empty($_GET['id'])){
   $getid = $_GET['id'];
   $recupManager = $bdd->prepare('SELECT * FROM manager WHERE id = ?');
   $recupManager->execute(array($getid));
   if($recupManager->rowCount() > 0){

      $bannirUser = $bdd->prepare('DELETE FROM manager WHERE id = ?');
      $bannirUser->execute(array($getid));

      header('Location: membres.php');

   }else{
    echo "Aucun manager n'a été trouvé";
   }
}else{
   echo "L'identifiant n'a pas été récupérer";
}
?>