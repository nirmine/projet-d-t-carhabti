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
   $rep1=$db->prepare('SELECT vehicule.* , repartion.date FROM vehicule,reparation 
                            WHERE vehicule.numero_vehicule=reparation.num_voiture 
                             AND reparation.date >= ?');
                             $d=date("Y-m-d");
                            $rep1->execute(array($d));
                            $n=array();
                            while ($entree = $rep1->fetch()) {
                                array_push($n, $entree['numero_vehicule']);

                            }
                            $reponse = $db->prepare('SELECT numero_vehicule FROM reservation
                            EXCEPT(SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge <? AND date_restitution >?  ');
                            $reponse->execute(array(date("Y-m-d"),date("Y-m-d")));
                            //WHERE  DATEADD(day,1,reservation.restitution)= ?
                           

                            // En utilisant une boucle, on affiche chaque entrée (ligne) lue dans le résultat retourné

                           
                            while ($e2=$reponse->fetch()) {
                                echo 'baw';
                                if (!(in_array($e2['numero_vehicule'], $n))) {
                                    echo 'baw';
                                    //verifier si la voiture selectionné est n'est pas reservé
                                    $r2=$db->prepare('SELECT * FROM vehicule WHERE numero_vehicule=? ');
                                    $r2->execute(array($e2['numero_vehicule']));
                                    while($e1=$r2->fetchall()) {
                                        if (($e1['assurance']!=date("Y-m-d"))&&($e1['autorisation']!=date("Y-m-d"))&&($e1['visite']!=date("Y-m-d"))) {
                                            array_push($v_disponible, $e1['numero_vehicule']);


                                            echo "<div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                                            <div class=\"thumbnail\">
                                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\">
                                              <div class=\"caption\">
                                                <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                                <p> Cette voiture est disponible .</p>
                                                <p><a href=\"visite1.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                                              </div>
                                            </div>
                                          </div>";
                                              $r1=$db->prepare('SELECT MIN(date_prise_en_charge) FROM reservation 
                                                          WHERE num_voiture=? AND date_prise_en_charge > ?
                                                          USING etat_de_reservation=?');
                                                          $r1->execute(array($e1['numero_vehicule'],date( "Y-m-d"),"validé"));
                                                          $e=$r1->fetch();
                                                          if(!empty($e) &&($e['date_prise_en_charge']>$e1['assurance'])&&($e['date_prise_en_charge']>$e1['autorisation']))
                                                          {
                                                              $duree=(strtotime($e['date_prise_en_charge'])-strtotime(date( "Y-m-d"))); // resulat en sécondes
                                                              $h= $duree/86400 ; 
                                                              $d=date( "Y-m-d");
                                                              $d1=date( "Y-m-d",strtotime('+$d days'));
                                                              echo $d1; // conversion en jours 
                                                               echo " </p>
                                                               <p><a href=\"visite1.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                                                             </div>
                                                           </div>
                                                         </div>";
                                        }
                                    }
                                }
                            }
                       
                            $rep1->closeCursor();
                            //$r2->closeCursor();
                            $reponse->closeCursor();
                            $r3=$db->prepare('SELECT numero_vehicule FROM vehicule
                            EXCEPT(SELECT UNIQUE(numero_vehicule) FROM reservation))');
                            $r3->execute(array());
                            while ($e1=$r3->fetch()) {
                                if (($e1['assurance']!=date("Y-m-d"))&&($e1['autorisation']!=date("Y-m-d"))&&($e1['visite']!=date("Y-m-d"))) {
                                    echo " <li class=\"col-sm-4 col-xs-12 portfolio-item nopadding-lr apps isotope-item\" style=\" width:370px;height:370px; \">
                                    <div class=\"hover-item\"> 
                                    <img src=\"photoVoiture/".$e['img_voiture']. " \" class=\"img-responsive smoothie \" alt=\" \">
                                        <div class=\"overlay-item-caption smoothie\"></div>
                                        <div class=\"hover-item-caption smoothie\">
                                            <div class=\"vertical-center smoothie\">
                                            <br> <br> 
                                                <h3  style=\" color:black \" > ". $e['serie'] .' TU'. $e['enregistrement'] ."</h3>";
                                      $r1=$db->prepare('SELECT MIN(date_prise_en_charge) FROM reservation 
                                                  WHERE num_voiture=? AND date_prise_en_charge > ?
                                                  USING etat_de_reservation=?');
                                                  $r1->execute(array($e1['numero_vehicule'],date( "Y-m-d"),"validé"));
                                                  $e=$r1->fetch();
                                                  if(!empty($e) &&($e['date_prise_en_charge']>$e1['assurance'])&&($e['date_prise_en_charge']>$e1['autorisation']))
                                                  {
                                                      $duree=(strtotime($e['date_prise_en_charge'])-strtotime(date( "Y-m-d"))); // resulat en sécondes
                                                      $h= $duree/86400 ; 
                                                      $d=date( "Y-m-d");
                                                      $d1=date( "Y-m-d",strtotime('+$d days'));
                                                      echo"<h3  style=\" color:black \" > ". $d1."</h3>"; // conversion en jours 
                                                       echo "      <a href=\"NouvelleReservation.html?num=".$e['numero_vehicule']."&amp;deb=".date("Y-m-d")."&amp;fin=".$d1." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Réserver</a>     </div>
                                                       </div>
                                                   </div>
                                               </li>";
                                    }
                                }

                                 
                            }
                                                }
            
                            ?>
                         