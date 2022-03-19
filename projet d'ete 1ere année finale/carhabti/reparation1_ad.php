<?php
try
 {
 $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
 'root', '');
 }
 catch (Exception $e)
 {
 die('Erreur : ' . $e->getMessage());
 }
 $reponse1=$db->prepare('SELECT numero_vehicule FROM vehicule WHERE serie=? AND enregistrement=? AND modele=?');
 $reponse1->execute(array($_POST['sr'],$_POST['enreg'],$_POST['mod']));
 while($entree=$reponse1->fetch())
 {
$reponse=$db->prepare('INSERT INTO reparation (num_voiture,typee,etat,piece) VALUES (?,?,?,?)');
$reponse->execute(array($entree['numero_vehicule'],$_POST['type'],$_POST['etat'],$_POST['piece']));
}
header('Location: reparation_ad.php',false);

?>