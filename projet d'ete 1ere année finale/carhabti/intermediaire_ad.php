
            
                
                <?php 
              //

                session_start();
                 try
                 {
                 $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
                 'root', '');
                 }
                 catch (Exception $e)
                 {
                 die('Erreur : ' . $e->getMessage());
                 }
                 $reservation=$_SESSION['num'];
                 $requete1 = $db->prepare('SELECT numero_vehicule,numero_client FROM reservation  WHERE numero_reservation=? ');
                 $requete1->execute(array($reservation));
                 $reponse1=$requete1->fetch();
                 $requete2 = $db->prepare('SELECT kilometrage FROM vehicule  WHERE numero_vehicule=? ');
                 $requete2->execute(array($reponse1['numero_vehicule']));
                 $reponse2=$requete2->fetch();
                
                
                if(isset($_POST['kilometrageRetour']))
                {
                  if($_POST['kilometrageRetour']>$reponse2['kilometrage'])
                  {
                      //Mise à jour de l'état de la voiture à la remise(kilometrage et niveau de carburant)
                  $rep1=$db->prepare('UPDATE vehicule SET kilometrage=? , niveau_carburant=? WHERE numero_vehicule=?');
                  $rep1->execute(array($_POST['kilometrageRetour'],$_POST['niveauCarburant'],$reponse1['numero_vehicule']));
                  if($_POST['nbrEraflure']!=0)
                  { 
                    if((isset($_POST['placeEraflure']))&&(isset($_POST['prixEraflure'])))
                    {
                        $pieces=explode("/",$_POST['placeEraflure']);
                       if(count($pieces)==$_POST['nbrEraflure'])
                         {
                        
                          $_SESSION['prixEraflure']=$_POST['prixEraflure'];
                           for($i=0;$i<=($_POST['nbrEraflure']-1);$i++)
                            {
                                  $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                                  $rep2->execute(array($reservation,"reparation","non_encore_traite",$pieces[$i]));
                             }
                         }
                         else
                         {
                            
                             echo "
                             <script type=\"text/javascript\">
                             alert(\"Il y a une place d'eraflure manquante!\");
                             window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                             </script>
                             
                             ";
                         }
     
                    }
                    else
                    {
                       
                        echo "
                        <script type=\"text/javascript\">
                        alert(\"Il y a des données manquantes!\");
                        window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                        </script>
                        
                        ";
                    }

                   }
                  
                   //ajouter une demande de réparation en cas des bosses
                   if($_POST['nbrBosse']!=0)
                   {
                      
                    if((isset($_POST['placeBosse']))&&(isset($_POST['prixBosse'])))
                    {
                      $pieces=explode("/",$_POST['placeBosse']);
                       if(count($pieces)==$_POST['nbrBosse'])
                       {      $_SESSION['prixBosse']=$_POST['prixBosse'];
                           for($i=0;$i<=($_POST['nbrBosse']-1);$i++)
                           {
                               $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                               $rep2->execute(array($reservation,"rechange","non_encore_traite",$pieces[$i]));
                           }
                       }
                       else
                       {
                          
                           echo "
                           <script type=\"text/javascript\">
                           alert(\"Il y a une place de bosse manquante!\");
                           window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                           </script>
                           
                           ";
                       }
                   }
                   else
                   {
                      
                       echo "
                       <script type=\"text/javascript\">
                       alert(\"Il y a des données manquantes!\");
                       window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                       </script>
                       
                       ";
                   }
                  }
                   if($_POST['nbrManque']!=0)
                   {
                       if((isset($_POST['placeManque']))&&(isset($_POST['prixManque'])))
                    {
                    
                      $pieces=explode("/",$_POST['placeManque']);
                       if(count($pieces)==$_POST['nbrManque'])
                       {
                        $_SESSION['prixManque']=$_POST['prixManque'];
                           for($i=0;$i<=($_POST['nbrManque']-1);$i++)
                           {
                               $rep2=$db->prepare('INSERT INTO reparation VALUES (?,?,?,?) ');
                               $rep2->execute(array($_GET['num'],"manque","non_encore_traite",$pieces[$i]));
                           }
                       }
                       else
                       {
                          
                           echo "
                           <script type=\"text/javascript\">
                           alert(\"Il y a une place de manque d'une piéce manquante!\");
                           window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                           </script>
                           
                           ";
                       }
                   }
                   else
                   {
                      
                    echo "
                    <script type=\"text/javascript\">
                    alert(\"Il y a des données manquantes!\");
                    window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                    </script>
                    
                    ";
                }
              }


                  $_SESSION['niveauCarburant']=$_POST['niveauCarburant'];
                  $_SESSION['kilometrageRetour']=$_POST['kilometrageRetour'];
                  $_SESSION['nbrEraflure']=$_POST['nbrEraflure'];
                  $_SESSION['nbrBosse']=$_POST['nbrBosse'];
                  $_SESSION['nbrManque']=$_POST['nbrManque'];
                  include('gestionListeNoire.php');
                  if(isset($_POST['fautif']))
                {
                $_SESSION['fautif']=$_POST['fautif'];
                if($_POST['fautif']=='oui')
                {
                  
                  ajouterClientNoire($reponse1['numero_client'],'endommager la voiture');
                }
              }
                
                  if( $_POST['manquePapiers']=='oui')
                  {
                   
                    ajouterClientNoire($reponse1['numero_client'],'Manque de papiers à la remise du voiture');
                  }
                  
                
               /*   echo "
                  <script type=\"text/javascript\">
                 
                  window.location.replace(\"facture.php?num=$reservation\");
                  </script>
                  
                  ";*/
                  header("location:facture.php?num=$reservation");


               
                  }
                  else
                  {
                    echo "
                    <script type=\"text/javascript\">
                    alert(\"ce kilométrage est erroné.Veuillez saisir une valeure supérieur à celle-ci\");
                    window.location.replace(\"etatDesLieux_ad.php?num=".$reservation."\");
                    </script>
                    
                    ";
                  }
                  
                }
                
               
                
                
                ?>