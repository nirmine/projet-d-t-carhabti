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
         if ($_POST['rech']=='marque') {
             $reponse = $db->prepare('SELECT * FROM vehicule WHERE marque=?');
             $reponse->execute(array($_POST['mark']));
             
            
             while ($entree = $reponse->fetch()) {
                echo "
                <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                <div class=\"thumbnail\">
                  <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                  <div class=\"caption\">
                    <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                  </div>
                </div>
              </div>
                ";
             }
         }
        
                 elseif($_POST['rech']=='couleur')
                 {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE couleur=?');
                    $reponse -> execute(array( $_POST['mark']));
                    
                   
                    while ($entree = $reponse->fetch())
                    {
                      
                               
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                }
        
                  
                 }
                 elseif($_POST['rech']=='categorie')
                 {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE categorie=?');
                    $reponse -> execute(array( $_POST['mark']));
                  
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
 
                   }
        
                    }
                    else 
                    {
                        die('catégorie  non disponible ');
                    }
                     
                 }
                 elseif($_POST['rech']=='carburant')
                 {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE carburant=?');
                    $reponse -> execute(array( $_POST['mark']));
                  
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
 
                    }
        
                    }
                    else 
                    {
                        die('carburant non disponible ');
                    }
                    
                 }
                 elseif($_POST['rech']=='vidange')
                 {
                     $Li=array("oui","non");
                     if(in_array($_POST['mark'],$Li))
                     {
                        $reponse = $db->prepare('SELECT * FROM vehicule WHERE vidange=?');
                        $reponse -> execute(array( $_POST['mark']));
                       echo" 
                      ";
                        if(!(isset($response)))
                        {
                            while ($entree = $reponse->fetch())
                            {
                                echo "
                                <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                                <div class=\"thumbnail\">
                                  <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                                  <div class=\"caption\">
                                    <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>
        
                                  </div>
                                </div>
                              </div>
                                ";
                     }
                    
                   }
                    else 
                    {
                        die('cette valeur de kilomètrage est non disponible ');
                    }
                }
                }
                    elseif($_POST['rech']=='immatriculation')
                    {
                        $pieces=explode('TU',$_POST['mark']);
                       $reponse = $db->prepare('SELECT * FROM vehicule WHERE enregistrement=? AND serie=?');
                       $reponse -> execute(array( $pieces[0],$pieces[1]));
                     
                       if(!(isset($response)))
                       {
                       while ($entree = $reponse->fetch())
                       {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                        }
           
                       }
                       else 
                       {
                           die("Série d'immatriculation non disponible ");
                       }
                        
                         }
                    elseif($_POST['rech']=='visite')
                 {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE visite=?');
                    $reponse -> execute(array( $_POST['mark']));
                   
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                }
                }
                else 
                { echo 'date de visite technique non disponible' ;}
                }
                elseif($_POST['rech']=='modele')
                {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE modele=?');
                    $reponse -> execute(array($_POST['mark']));
                   
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                }
                }
                else 
                { echo 'date de visite technique non disponible' ;}
                }
                elseif($_POST['rech']=='kilometrage')
                {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE kilometrage=?');
                    $reponse -> execute(array( (int)$_POST['mark']));
                   
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                }
                }
                else 
                { echo 'date de visite technique non disponible' ;}
                }
            
                elseif($_POST['rech']=='prix')
                {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE prix=?');
                    $reponse -> execute(array( (int)$_POST['mark']));
                   
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                }
                }
                 }
                 elseif($_POST['rech']=='prix_location')
                 {
                     $reponse = $db->prepare('SELECT * FROM vehicule WHERE prix_location=?');
                     $reponse -> execute(array( (int)$_POST['mark']));
                    
                     if(!(isset($response)))
                     {
                     while ($entree = $reponse->fetch())
                     {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                 }
                 }
                  }
                 elseif($_POST['rech']=='portes')
                 {
                    $reponse = $db->prepare('SELECT * FROM vehicule WHERE nb_portes=?');
                    $reponse -> execute(array( (int)$_POST['mark']));
                   
                    if(!(isset($response)))
                    {
                    while ($entree = $reponse->fetch())
                    {
                        echo "
                        <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                        <div class=\"thumbnail\">
                          <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                          <div class=\"caption\">
                            <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>

                          </div>
                        </div>
                      </div>
                        ";
                        }
                        }
                        }
                        elseif($_POST['rech']=='assurance')
                        {
                           $reponse = $db->prepare('SELECT * FROM vehicule WHERE assurance=?');
                           $reponse -> execute(array( date($_POST['mark'])));
                           
                           if(!(isset($response)))
                           {
                               echo"<li class=\"col-sm-4 col-xs-12 portfolio-item nopadding-lr apps isotope-item\">";
                           while ($entree = $reponse->fetch())
                           {
                            echo "
                            <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                            <div class=\"thumbnail\">
                              <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                              <div class=\"caption\">
                                <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>
    
                              </div>
                            </div>
                          </div>
                            ";
                       }
                       
                       }
                       else 
                       { echo 'date de visite technique non disponible' ;}
                       } 
                            elseif($_POST['rech']=='autorisation')
                       {
                          $reponse = $db->prepare('SELECT * FROM vehicule WHERE autorisation=?');
                          $reponse -> execute(array( date($_POST['mark'])));
                         
                          if(!(isset($response)))
                          {
                          while ($entree = $reponse->fetch())
                          {
                            echo "
                            <div class=\"col-sm-4\" style=\" width:370px;height:370px; \">
                            <div class=\"thumbnail\">
                              <img src=\"photoVoiture/".$entree['img_voiture']. " \" alt=\"\">
                              <div class=\"caption\">
                                <h3>". $entree['serie'] .' TU '. $entree['enregistrement'] ."</h3>
    
                              </div>
                            </div>
                          </div>
                            ";
                      }
                      }
                      else 
                      { echo 'date de visite technique non disponible' ;}
                      }
        
                 
                        $reponse->closeCursor(); 
?>