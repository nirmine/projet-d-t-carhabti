<?php
           function afficherReservationsAujourdhui($utilisateur)
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
            $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));//date exacte en ce moment
            //Tirer les réservations qui 
         
            $reponse=$db->prepare('SELECT * FROM reservation WHERE date_prise_en_charge < ? AND etat_de_reservation =?  UNION  SELECT * FROM reservation WHERE date_restitution <= ? and etat_de_reservation =?');
            $reponse->execute(array($date1,"validée",$date1,"en cours"));
         
            $entree3=$reponse->fetchall();
            
            if(count($entree3)!=0)//si il y a des réservations aujourd'hui
            {
              //afficher les prise et la remise des voitures pour ce jour là ainsi que les retards du remise/prise de la voiture 
              $reponse=$db->prepare('SELECT * FROM reservation WHERE date_prise_en_charge < ? and etat_de_reservation =? and date_restitution>? union  SELECT * FROM reservation WHERE date_restitution <= ? and etat_de_reservation =?');
              $reponse->execute(array($date1,"validée",$date1,$date1,"en cours"));
            while($op=$reponse->fetch())
            {
             $requete1= $db->prepare('SELECT * FROM client  WHERE numero_client= ? ');
              $requete1->execute(array($op['numero_client']));
              $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=?');
              $requete2->execute(array($op['numero_vehicule']));
              while (($entree1 = $requete1->fetch()) && ($vehicule=$requete2->fetch()))
            { 
              $dateRemise=$op['date_restitution'];
              $datePrise=$op['date_prise_en_charge'];
              $heureR=explode(" ",$dateRemise);
              $heureP=explode(" ",$datePrise);
              
              if($op['etat_de_reservation']=='en cours')//il faut consulter l'état de la voiture puis offrir une facture finale s'il y a des dégats
            {
              echo "
              <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
              <div class=\"thumbnail\">
               
                <div class=\"caption\">
                  <h4>Remise de la voiture</h4></br>
                  <p><strong> Client:</strong>".$entree1['nom'].' '.$entree1['prenom'].".</p>
                  <p><strong>tel: </strong>".$entree1['tel']." </p>
                  <p><strong> Voiture réservée:</strong></br> ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes </p>
                  <p> <strong>Heure de la remise:</strong> ".$heureR[1]." </p>";
                  if($utilisateur=='administrateur')
                 echo" <p><a href=\"etatDesLieux_ad.php?num=".$op['numero_reservation']."\"  class=\"btn btn-primary\" role=\"button\"> Etat des lieux </a></p>";
                 if($utilisateur=='fonctionnaire')
                 echo" <p><a href=\"etatDesLieux.php?num=".$op['numero_reservation']."\"  class=\"btn btn-primary\" role=\"button\"> Etat des lieux </a></p>";
  
               echo" </div>
              </div>
            </div>
              ";}
            else //il faut offrir une facture et le contrat de location
            {
                if ($op['etat_de_reservation']=='validée') 
                {
                  echo "
                  <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                  <div class=\"thumbnail\">
                   
                    <div class=\"caption\">
                      <h4>Prise de la voiture</h4></br>
                      <p><strong> Client:</strong>".$entree1['nom'].' '.$entree1['prenom'].".</p>
                      <p><strong>tel: </strong>".$entree1['tel']." </p>
                      <p><strong> Voiture réservée:</strong></br> ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes </p>
                      <p> <strong>Heure de la prise:</strong> ".$heureR[1]." </p>
                      <p ><a target=\"_blank\" href=\"intermediaire3.php?numR=".$op['numero_reservation']."\"  class=\"btn btn-primary\" role=\"button\"> Contrat </a></p>
                    </div>
                  </div>
                </div>
                  ";}
            }
            }
          }}
         else 
          {
            echo "
            <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
            <div class=\"thumbnail\">
             
              <div class=\"caption\">
                <p><strong>Pas de Reservation aujourd'hui</strong></p>
   
              </div>
            </div>
          </div>
            ";
          }
           }
            ?>
 