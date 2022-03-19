<?php
  //ajouter une réservation avec un 2éme conducteur
  function ajouterReservation1($numeroClient,$numeroVehicule,$datePrise,$dateRemise,$chauffeur,$montantPaye,$cin2,$permis2,$nom2,$naissance2,$tel2)
  {

     
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
 $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));//la date d'aujourd'hui est la date d'ajout de la réservation
  $requete = $db->prepare('INSERT INTO reservation (date_ajout,numero_client,numero_vehicule,date_prise_en_charge,date_restitution,chauffeur,etat_de_reservation,montant_paye,cin_conducteur2,permis_conducteur2,nom_conducteur2,date_naissance_conducteur2,tel_conducteur2) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
  $requete->execute(array($date1,$numeroClient,$numeroVehicule,$datePrise,$dateRemise,$chauffeur,'validée',$montantPaye,$cin2,$permis2,$nom2,$naissance2,$tel2));

  }
  //ajouter une réservation sans un 2éme conducteur
  function ajouterReservation2($numeroClient,$numeroVehicule,$datePrise,$dateRemise,$chauffeur,$montantPaye)
  {
  
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
 $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));//la date d'aujourd'hui est la date d'ajout de la réservation
  $requete = $db->prepare('INSERT INTO reservation (date_ajout,numero_client,numero_vehicule,date_prise_en_charge,date_restitution,chauffeur,etat_de_reservation,montant_paye) VALUES(?,?,?,?,?,?,?,?)');
  $requete->execute(array($date1,$numeroClient,$numeroVehicule,$datePrise,$dateRemise,$chauffeur,'validée',$montantPaye));

  }
?>