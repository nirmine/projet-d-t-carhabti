<?php
//pour libérer la table "reservation" des réservations qui ne sont pas prise en charge et la dates de prise en charge prévue est déjà passée 

 try
 {
 $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
 'root', '');
 }
 catch (Exception $e)
 {
 die('Erreur : ' . $e->getMessage());
 }
 $date1=date('Y-m-d H:i:s');            
 $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));
$requete=$db->prepare('DELETE FROM reservation WHERE date_restitution<=? and etat_de_reservation=\'validée\'');
$requete->execute(array($date1));



?>