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
 $rep=$db->prepare('SELECT * FROM vehicule WHERE numero_vehicule=?');
 $rep->execute(array($_GET['num']));
 while($e=$rep->fetch())
 {
    echo " 
          <div class=\"servicetitle\">
            <h4>".$e['serie'].' TUN '.$e['enregistrement']."</h4>
            <hr>
          </div>
          <div class=\"icn-main-container\">
            <img src=\"photoVoiture/".$e['img_voiture']. " \" class=\"icn-container\" >
          </div>

          <ul class=\"pricing\" style=\" color:black; \">
            <li >Modèle:  ".$e["modele"]."</li>
            <li >Marque:  ".$e["marque"]."</li>
            <li>Carburant:  ".$e['carburant']."</li>
            <li> Kilomètrage:  ".$e['kilometrage']."</li>
            <li>Prix de Location :  ".$e['prix_location']."</li>
            <li> Nombre des Portes :  ".$e["nb_portes"]."</li>
            
          </ul>
          
            ";
 }

?>