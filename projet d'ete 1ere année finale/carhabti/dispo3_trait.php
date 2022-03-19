<?php
    function dispoDateEtVoiture($utilisateur)
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
     $n=array(); //les voitures à reparer 
     $rep1=$db->prepare('SELECT vehicule.numero_vehicule , repartion.date FROM vehicule,reparation 
     WHERE reparation.date BETWEEN ? AND ? 
     AND etat=? OR etat=?');
    $rep1->execute(array($_POST['date1'],$_POST['date2'],"en_cours_de_reparation","non_encore_traite"));
         while ($entree = $rep1->fetch()) {
          
         array_push($n, $entree['numero_vehicule']);
          }
     $reponse=$db->prepare('SELECT * FROM vehicule WHERE marque=? AND modele=?');
     $reponse->execute(array($_POST['marque'],$_POST['model']));
     $e=$reponse->fetch();
     //si la voiture n'existe pas on affiche toutes les voitures disponibles
     if (empty($e)) {
        $d1=$_POST['date1'];
        $d2=$_POST['date2'];
         $reponse1=$db->prepare('SELECT * FROM vehicule ');
         $reponse1->execute(array());
         $v_dispo=array();
         while ($e=$reponse1->fetch()) {
           
             if (!(in_array($e['numero_vehicule'], $n))) {
                 if (($_POST['date1']>$e['autorisation'])||($e['autorisation']>$_POST['date2'])) {
                     if (($_POST['date1']>$e['assurance'])||($e['assurance']>$_POST['date2'])) {
                         if (($_POST['date1']>$e['visite'])||($e['visite']>$_POST['date2'])) {
                             if ($e['vidange']=="non") {
                                 $r1=$db->prepare('SELECT numero_reservation FROM reservation WHERE numero_vehicule=? ');
                                 $r1->execute(array($e['numero_vehicule']));
                                 $h1=$r1->fetch();
                                 if (empty($h)) {
                                     echo "
                                                <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                                <div class=\"thumbnail\">
                                                  <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                                                  <div class=\"caption\">
                                                    <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                                    <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                        if($utilisateur=='fonctionnaire')
                                                    echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                                  else
                                                  echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";

                                                  echo"  </div>
                                                </div>
                                              </div>
                                                ";
                                 } else {
                                     $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge BETWEEN ? AND ? FILTER BY numero_vehicule=?) ');
                                     $r2->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                     $h2=$r2->fetch();
                                     if (empty($h2)) {
                                         $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge <? FILTER BY numero_vehicule=?');
                                         $r3->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$e['numero_vehicule']));
                                         $h3=$r3->fetch();
                                         if (empty($h3)) {
                                             $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? HAVING date_restitution >? FILTER BY numero_vehicule=?');
                                             $r4->execute(array($_POST['date1'],$_POST['date2'],$_POST['date2'],$e['numero_vehicule']));
                                             $h4=$r4->fetch();
                                             if (empty($h4)) {
                                                 $rep5=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge=? AND date_restitution=? HAVING numero_vehicule=?');
                                                 $rep5->execute(array($_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                                 $h5=$r5->fetch();
                                                 if (empty($h5)) {
                                                     echo "
                                                <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                                <div class=\"thumbnail\">
                                                  <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\">
                                                  <div class=\"caption\">
                                                    <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                                    <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                    if($utilisateur=='fonctionnaire')
                                                    echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                                 else
                                                 echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";


                                                    echo" </div>
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
     }
     else
   {
       //si les voiture existent et disponibles on les affichent
    $d1=$_POST['date1'];
    $d2=$_POST['date2'];
    $reponse1=$db->prepare('SELECT * FROM vehicule WHERE marque=? AND modele=?');
    $reponse1->execute(array($_POST['marque'],$_POST['model']));
     $v_dispo=array(); 
         while ($e=$reponse1->fetch()) {
          
             if (!(in_array($e['numero_vehicule'], $n))) {
                 if (($_POST['date1']>$e['autorisation'])||($e['autorisation']>$_POST['date2'])) {
                     if (($_POST['date1']>$e['assurance'])||($e['assurance']>$_POST['date2'])) {
                         if (($_POST['date1']>$e['visite'])||($e['visite']>$_POST['date2'])) {
                             if ($e['vidange']=="oui") {
                                 $r1=$db->prepare('SELECT numero_reservation FROM reservation WHERE numero_vehicule=? ');
                                 $r1->execute(array($e['numero_vehicule']));
                                 $h1=$r1->fetch();
                                 if (empty($h)) {
                                     echo "
                                            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                            <div class=\"thumbnail\">
                                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                                              <div class=\"caption\">
                                              <h3>". $e['marque'] .' '. $e['modele'] ."</h3>
                                                <h4>". $e['serie'] .' TU '. $e['enregistrement'] ."</h4>
                                                <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                if($utilisateur=='fonctionnaire')
                                                echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                             else
                                             echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";

                                             echo"   </div>
                                            </div>
                                          </div>
                                            ";
                                     array_push($v_dispo, $e['numero_vehicule']);
                                 } else {
                                     $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge BETWEEN ? AND ? FILTER BY numero_vehicule=?) ');
                                     $r2->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                     $h2=$r2->fetch();
                                     if (empty($h2)) {
                                         $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge <? FILTER BY numero_vehicule=?');
                                         $r3->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$e['numero_vehicule']));
                                         $h3=$r3->fetch();
                                         if (empty($h3)) {
                                             
                                             $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? HAVING date_restitution >? FILTER BY numero_vehicule=?');
                                             $r4->execute(array($_POST['date1'],$_POST['date2'],$_POST['date2'],$e['numero_vehicule']));
                                             $h4=$r4->fetch();
                                             if (empty($h4)) {
                                                 $rep5=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge=? AND date_restitution=? HAVING numero_vehicule=?');
                                                 $rep5->execute(array($_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                                 $h5=$r5->fetch();
                                                 if (empty($h5)) {
                                                     echo "
                                            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                            <div class=\"thumbnail\">
                                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                                              <div class=\"caption\">
                                              <h3>". $e['marque'] .' '. $e['modele'] ."</h3>
                                                <h4>". $e['serie'] .' TU '. $e['enregistrement'] ."</h4>
                                                <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                if($utilisateur=='fonctionnaire')
                                                echo"<p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                              else
                                              echo"<p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                              echo"  </div>
                                            </div>
                                          </div>
                                            ";
                                                     array_push($v_dispo, $e['numero_vehicule']);
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
                if (empty($v_dispo)) {
                    //si es voitures existent et ils ne sont pas disponibles on affiche toute les voitures disponibles
                    
                    $reponse10=$db->prepare('SELECT * FROM vehicule ');
                    $reponse10->execute(array());
                    
                         while ($e=$reponse10->fetch()) {
                             
                             if (!(in_array($e['numero_vehicule'], $n))) {
                                 if (($_POST['date1']>$e['autorisation'])||($e['autorisation']>$_POST['date2'])) {
                                     if (($_POST['date1']>$e['assurance'])||($e['assurance']>$_POST['date2'])) {
                                         if (($_POST['date1']>$e['visite'])||($e['visite']>$_POST['date2'])) {
                                             if ($e['vidange']=="oui") {
                                                 $r1=$db->prepare('SELECT numero_reservation FROM reservation WHERE numero_vehicule=? ');
                                                 $r1->execute(array($e['numero_vehicule']));
                                                 $h1=$r1->fetch();
                                                 if (empty($h1)) {
                                                   
                                                     echo "
                                                            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                                            <div class=\"thumbnail\">
                                                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                                                              <div class=\"caption\">
                                                              <h3>". $e['marque'] .' '. $e['modele'] ."</h3>
                                                              <h4>". $e['serie'] .' TU '. $e['enregistrement'] ."</h4>
                                                                <p> Cette voiture est disponible entre ces deux dates  .</p>";
                                                                if($utilisateur=='fonctionnaire')
                                                               echo" <p> <a href=\"NouvelleReservation1.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";
                                                             else
                                                             echo" <p> <a href=\"NouvelleReservation1_ad.php?num=".$e['numero_vehicule']."&amp;deb=".$d1."&amp;fin=".$d2." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a> </p>";

                                                             
                                                              echo" </div>
                                                            </div>
                                                          </div>
                                                            ";
                                                     
                                                 } else {
                                                     
                                                     $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge BETWEEN ? AND ? FILTER BY numero_vehicule=?) ');
                                                     $r2->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                                     $h2=$r2->fetch();
                                                     if (empty($h2)) {
                                                         
                                                         $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge <? AND numero_vehicule=?');
                                                         $r3->execute(array($_POST['date1'],$_POST['date2'],$_POST['date1'],$e['numero_vehicule']));
                                                         $h3=$r3->fetch();
                                                         if (empty($h3)) {
                                                             
                                                             $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? HAVING date_restitution >? FILTER BY numero_vehicule=?');
                                                             $r4->execute(array($_POST['date1'],$_POST['date2'],$_POST['date2'],$e['numero_vehicule']));
                                                             $h4=$r4->fetch();
                                                             if (empty($h4)) {
                                                                 $rep5=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge=? AND date_restitution=? HAVING numero_vehicule=?');
                                                                 $rep5->execute(array($_POST['date1'],$_POST['date2'],$e['numero_vehicule']));
                                                                 $h5=$rep5->fetch();
                                                                 if (empty($h5)) {
                                                                     echo "
                                                            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                                                            <div class=\"thumbnail\">
                                                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                                                              <div class=\"caption\">
                                                              <h3>". $e['marque'] .' '. $e['modele'] ."</h3>
                                                              <h4>". $e['serie'] .' TU '. $e['enregistrement'] ."</h4>
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
                }
          
            
         }
        }
     ?>