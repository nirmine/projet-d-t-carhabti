<?php
                        function afficheAutorisation($utilisateur)
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
                            $date1=date('Y-m-d H:i:s');            
                            $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));//date exacte en ce moment
                            $date1=date("Y-m-d",strtotime($date1));
                            $reponse = $db->prepare('SELECT * FROM vehicule WHERE autorisation=?');
                            $reponse->execute(array($date1));
                                
                            if (!empty($reponse)) {
                                while ($e = $reponse->fetch()) {
                                    if ($utilisateur=="fonctionnaire") {
                                        echo "
                              <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                              <div class=\"thumbnail\">
                                <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" style=\" width:290px;height:150px;\">
                                <div class=\"caption\">
                                  <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                  <p> Renouvellement de l'autorisation  .</p>
                                  <p><a href=\"autorisation1.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                                </div>
                              </div>
                            </div>
                              ";
                                    }
                               else {
                                        if ($utilisateur=="administrateur") {
                                            echo "
                            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                            <div class=\"thumbnail\">
                              <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                              <div class=\"caption\">
                                <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                                <p> Renouvellement de l'autorisation  .</p>
                                <p><a href=\"autorisation1_ad.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                              </div>
                            </div>
                          </div>
                            ";
                                        }
                                    }
                                }
                            }

                            $reponse->closeCursor();
                        }
?>