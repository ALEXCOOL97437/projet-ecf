<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=gamesoft;charset=utf8;', 'root', 'root');
//$bdd = new PDO('mysql:host=sql113.infinityfree.com;dbname=if0_34998643_basetest;charset=utf8', 'if0_34998643', 'tImeLqNFXR');

if(isset($_GET['id']) AND !empty($_GET['id'])){
   $getid = $_GET['id'];
   $recupUser = $bdd->prepare('SELECT * FROM producteurs WHERE id = ?');
   $recupUser->execute(array($getid));
   if($recupUser->rowCount() > 0){

      $bannirUser = $bdd->prepare('DELETE FROM producteurs WHERE id = ?');
      $bannirUser->execute(array($getid));

      header('Location: membres.php');

   }else{
    echo "Aucun membre n'a été trouvé";
   }
}else{
   echo "L'identifiant n'a pas été récupérer";
}
?>