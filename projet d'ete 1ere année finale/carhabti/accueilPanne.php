<?php
                   function affichePanne($utilisateur)
                   {
                       try {
                           $db = new PDO(
                               'mysql:host=localhost;dbname=agence;charset=utf8',
                               'root',
                               ''
                           );
                       } catch (Exception $e) {
                           die('Erreur : ' . $e->getMessage());
                       }
                       $reponse=$db->prepare('SELECT num_voiture , etat FROM reparation WHERE etat=? OR etat=?');
                       $reponse->execute(array("en_cours_de_reparation","non_encore_traite"));
                       while ($entree=$reponse->fetch()) {
                           $r1=$db->prepare('SELECT * FROM vehicule WHERE numero_vehicule=?');
                           $r1->execute(array($entree['num_voiture']));
                           while ($e=$r1->fetch()) {
                               if ($utilisateur=="fonctionnaire") {
                                   echo "
                          <div class=\"col-sm-4\" style=\" width:300px;height:200;\">
                          <div class=\"thumbnail\">
                               <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\"  style=\" width:290px;height:150px;\">
                               <div class=\"caption\">
                                 <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                 <p> Renouvellement de l'autorisation  .</p>
                                 <p><a href=\"piece_panne.php?num=".$e['numero_vehicule']."\"  class=\"btn btn-primary\" role=\"button\">Afficher les pièces en panne  </a></p>
                               </div>
                          </div>
                        </div>
                          ";
                               } else {
                                   if ($utilisateur=="administrateur") {
                                       echo "
                          <div class=\"col-sm-4\" style=\" width:300px;height:110;\">
                          <div class=\"thumbnail\">
                            <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                            <div class=\"caption\">
                              <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                              <p> Renouvellement de l'autorisation  .</p>
                              <p><a href=\"piece_panne_ad.php?num=".$e['numero_vehicule']."\"  class=\"btn btn-primary\" role=\"button\">Afficher les pièces en panne  </a></p>
                            </div>
                          </div>
                        </div>
                          ";
                                   }
                               }
                           }
                       }
                   }      
                   
?>