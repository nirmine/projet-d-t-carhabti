<?php
  function dispoDeuxDates($utilisateur)
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
 
     
     $d1=$_POST['date3'];
     $d2=$_POST['date4'];
      $reponse1=$db->prepare('SELECT * FROM vehicule ');
      $reponse1->execute(array());
      
      while ($e=$reponse1->fetch()) {
     
         
              if (($_POST['date3']>$e['autorisation'])||($e['autorisation']>$_POST['date4'])) { //si la voiture n'a pas de renouvellement d'autorisation entre ses 2 dates 
                  if (($_POST['date3']>$e['assurance'])||($e['assurance']>$_POST['date4'])) { //si la voiture n'a pas de renouvellement d'assurance entre ses deux dates 
                      if (($_POST['date3']>$e['visite'])||($e['visite']>$_POST['date4'])) { //si la voiture n'a pas de visite technique entre ses 2 dates 
                          if ($e['vidange']=="oui") { //si elle n'avait pas de vidange
                              $r1=$db->prepare('SELECT numero_reservation FROM reservation WHERE numero_vehicule=? ');
                              $r1->execute(array($e['numero_vehicule']));
                              $h1=$r1->fetch();
                              if (empty($h1)) { //si elle n'est pas jamais reservée
                                  echo "
                                             <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                                             <div class=\"thumbnail\">
                                               <img src=\"photoVoiture\\".$e['img_voiture']. " \" alt=\"\">
                                               <div class=\"caption\">
                                               <h3>". $e['marque'] .'  '. $e['modele'] ."</h3>
                                                 <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                                 <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                 if($utilisateur=='fonctionnaire')
                                                 echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                                  else
                                                  echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";

                                              echo"   </div>
                                             </div>
                                           </div>
                                             ";
                              } 
                              else {
                                  $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? AND date_prise_en_charge BETWEEN ? AND ? AND numero_vehicule=?) ');
                                  $r2->execute(array($_POST['date3'],$_POST['date4'],$_POST['date3'],$_POST['date4'],$e['numero_vehicule']));
                                  $h2=$r2->fetch();
                                  if (empty($h2)) {
                                      $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? AND date_prise_en_charge <? AND numero_vehicule=?');
                                      $r3->execute(array($_POST['date3'],$_POST['date4'],$_POST['date3'],$e['numero_vehicule']));
                                      $h3=$r3->fetch();
                                      if (empty($h3)) {
                                          $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? AND date_restitution >? AND numero_vehicule=?');
                                          $r4->execute(array($_POST['date3'],$_POST['date4'],$_POST['date4'],$e['numero_vehicule']));
                                          $h4=$r4->fetch();
                                          if (empty($h4)) {
                                              $rep5=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge=? AND date_restitution=? AND numero_vehicule=?');
                                              $rep5->execute(array($_POST['date3'],$_POST['date4'],$e['numero_vehicule']));
                                              $h5=$rep5->fetch();
                                              if (empty($h5)) {
                                                  echo "
                                             <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                                             <div class=\"thumbnail\">
                                               <img src=\"photoVoiture\\".$e['img_voiture']. " \" alt=\"\">
                                               <div class=\"caption\">
                                               <h3>". $e['marque'] .'  '. $e['modele'] ."</h3>
                                                 <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                                 <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                 if($utilisateur=='fonctionnaire')
                                                 echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                               else
                                               echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";

                                                 echo"</div>
                                             </div>
                                           </div>
                                             ";
                                              }
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }
              }
          
      }

     


    }
?>