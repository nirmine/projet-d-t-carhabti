
<?php
            
            function afficheCoordonneesClient( $numeroReservation)
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
               $dateToday=date('Y-m-d H:i:s');            
             $dateToday= date("Y-m-d H:i", strtotime("-60 minutes", strtotime($dateToday)));//date exacte en ce moment
             
               $requete1 = $db->prepare('SELECT * FROM reservation  WHERE numero_reservation=? ');
               $requete1->execute(array($numeroReservation));
               $reponse1=$requete1->fetch();
               
               $requete2 = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
               $requete2->execute(array($reponse1['numero_client']));
               $reponse2=$requete2->fetch();
               echo " <h4><b> Client:</b></h4> ";
               echo '<strong>'.$reponse2['nom'].' '.$reponse2['prenom'].'</strong>';
               echo " <address>
               CIN/Passeport:".$reponse2['cin'] ."<br>".$reponse2['adresse'].
               " <br>
              
               <abbr title=\"Phone\">Tel:</abbr>".$reponse2['tel'].
            " </address>
               </div>
               <!-- /col-md-9 -->
               <div class=\"col-md-3\">
                 <br>
                 <div>
                   
                   <div class=\"pull-left\"> Facture n°: </div>"."<div class=\"pull-right\">".$numeroReservation."</div>";
                 echo"
                     
                 <div class=\"clearfix\"></div>
               </div>
               <div>
                 <!-- /col-md-3 -->
                 <div class=\"pull-left\">De date: </div>
                 <div class=\"pull-right\">".$dateToday."</div>";
                 
                 }
                   function afficherPrixLocation($numeroReservation)

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
                     
                     $requete1 = $db->prepare('SELECT numero_vehicule FROM reservation  WHERE numero_reservation=? ');
                     $requete1->execute(array($numeroReservation));
                     $reponse1=$requete1->fetch();
                     
                     $requete2 = $db->prepare('SELECT prix_location FROM vehicule  WHERE numero_vehicule=? ');
                     $requete2->execute(array($reponse1['numero_vehicule']));
                     $reponse2=$requete2->fetch();
                       return $reponse2['prix_location'];
                   }
                   function prixLocationTotale($numeroReservation)

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
                    
                     $requete1 = $db->prepare('SELECT numero_vehicule,date_prise_en_charge,date_restitution FROM reservation  WHERE numero_reservation=? ');
                     $requete1->execute(array($numeroReservation));
                     $reponse1=$requete1->fetch();
                     
                     $requete2 = $db->prepare('SELECT prix_location FROM vehicule  WHERE numero_vehicule=? ');
                     $requete2->execute(array($reponse1['numero_vehicule']));
                     $reponse2=$requete2->fetch();
                     
                       return $reponse2['prix_location']*dureeLocation($numeroReservation);
                   }
                   function dureeLocation($numeroReservation)
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
                     $requete1 = $db->prepare('SELECT numero_vehicule,date_prise_en_charge,date_restitution FROM reservation  WHERE numero_reservation=? ');
                     $requete1->execute(array($numeroReservation));
                     $reponse1=$requete1->fetch();
                     $requete2 = $db->prepare('SELECT prix_location FROM vehicule  WHERE numero_vehicule=? ');
                     $requete2->execute(array($reponse1['numero_vehicule']));
                     $reponse2=$requete2->fetch();
                     //extraire le nombre de jour de location           
                    $date_debut = $reponse1['date_prise_en_charge'];
                     $date_fin = $reponse1['date_restitution'];
                     $date1 = new DateTime($date_debut);
                     $date2 = $date1->diff(new DateTime($date_fin));
                     $nbJours=$date2->days;
                     return $nbJours;
                
                  
                   }
                    
                   function contenuFacture($numeroReservation)
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
                     $requete1 = $db->prepare('SELECT * FROM reservation  WHERE numero_reservation=? ');
                     $requete1->execute(array($numeroReservation));
                     $reponse1=$requete1->fetch();
                     $requete2 = $db->prepare('SELECT kilometrage,prix_location,niveau_carburant FROM vehicule  WHERE numero_vehicule=? ');
                     $requete2->execute(array($reponse1['numero_vehicule']));
                     $reponse2=$requete2->fetch();
                     $etatVehicule='normale';
                     $total=0;
                     //afficher durée de location
                     echo "<tr>
                     <td class=\"text-center\">". dureeLocation($numeroReservation)."</td>
                     <td>Durée De location convenu </td>
                     <td class=\"text-right\">---</td>
                     <td class=\"text-right\">---</td>
                   </tr>";
                    $dureeTotal=dureeLocation($numeroReservation);
                   //afficher prix de location 
                   echo "<tr>
                   <td class=\"text-center\"></td>
                   <td>Prix de Location hors taxes</td>
                   <td class=\"text-right\">".afficherPrixLocation($numeroReservation)."</td>
                   <td class=\"text-right\">".prixLocationTotale($numeroReservation)."</td>
                 </tr>";
                $total+=prixLocationTotale($numeroReservation);

              

                 //T.V.A 
                 echo "<tr>
                 <td class=\"text-center\"></td>
                 <td>T.V.A</td>
                 <td class=\"text-right\">---</td>
                 <td class=\"text-right\">".($_SESSION['tauxTVA']*prixLocationTotale($numeroReservation))."</td>
               </tr>";
               $TVA=$_SESSION['tauxTVA']*prixLocationTotale($numeroReservation);

               //droits de timbre
               echo "<tr>
               <td class=\"text-center\"></td>
               <td>Droits de Timbre </td>
               <td class=\"text-right\">".$_SESSION['droitTimbre']."</td>
               <td class=\"text-right\">".$_SESSION['droitTimbre']."</td>
             </tr>";
             $total+=$_SESSION['droitTimbre'];
             //Cas de retard de remise de la voiture
             $dateToday=date('Y-m-d H:i:s');            
             $dateToday= date("Y-m-d H:i", strtotime("-60 minutes", strtotime($dateToday)));//date exacte en ce moment
             $date_debut = $reponse1['date_restitution'];
             $date1= date("Y-m-d H:i", strtotime( $date_debut));
             $prixprolongation=0;
             if($date1<$dateToday)
             {
              
               $date_fin = $dateToday;
               $date1 = new DateTime($date_debut);
               $date2 = $date1->diff(new DateTime($date_fin));
               $joursDepassee=$date2->days;
               $prixprolongation=afficherPrixLocation($numeroReservation)*$joursDepassee;
               echo "<tr>
               <td class=\"text-center\">".$joursDepassee."</td>
               <td>Prolongation de location </td>
               <td class=\"text-right\">".afficherPrixLocation($numeroReservation)."</td>
               <td class=\"text-right\">".$prixprolongation."</td>
             </tr>";
             $total+=$prixprolongation;
             echo "<tr>
               <td class=\"text-center\"></td>
               <td>Pénalité sur prolongation de location inattendu </td>
               <td class=\"text-right\">".$_SESSION['penaliteProlongementInattendu']."</td>
               <td class=\"text-right\">".$_SESSION['penaliteProlongementInattendu']."</td>
             </tr>";
               $total+=$_SESSION['penaliteProlongementInattendu'];
               $dureeTotal=$dureeTotal+$joursDepassee;
               $prixprolongation+=$_SESSION['penaliteProlongementInattendu'];
             }
                //Dépenses pour chauffeur
                
                if(($reponse1['chauffeur']=='oui')||($reponse1['chauffeur']=='Oui'))
                {
                  echo "<tr>
                  <td class=\"text-center\"></td>
                  <td>Tarifs du chauffeur</td>
                  <td class=\"text-right\">".$_SESSION['prixChauffeur']."</td>
                  <td class=\"text-right\">".($_SESSION['prixChauffeur']*$dureeTotal)."</td>
                </tr>";
                  $total+=($_SESSION['prixChauffeur']*$dureeTotal);
                }
         
        
           //Dépassement de seuil de kilométrage permis
           if((isset($_SESSION['kilometrageRetour'])))
           {
           if(($_SESSION['kilometrageRetour']-$reponse2['kilometrage'])>$_SESSION['seuilkilometrage'])
           {
             $depassementKilometrage=($_SESSION['kilometrageRetour']-$reponse2['kilometrage'])*$_SESSION['penalitekilometrage'];
             $total+=$depassementKilometrage;
                  //Mise à jour de l'état de la voiture à la remise
                  $rep1=$db->prepare('UPDATE vehicule SET kilometrage=? , niveau_carburant=? WHERE numero_vehicule=?');
                  $rep1->execute(array($_SESSION['kilometrageRetour'],$_SESSION['niveauCarburant'],$reponse1['numero_vehicule']));
             echo "<tr>
               <td class=\"text-center\"></td>
               <td>dépassement de kilométrage </td>
               <td class=\"text-right\">".$_SESSION['penalitekilometrage']."</td>
               <td class=\"text-right\">".$depassementKilometrage."</td>
             </tr>";


           }}
     
           if((isset($_SESSION['fautif'])&&($_SESSION['fautif']=='non')))//cas d'un accident non fautif il faut que le client paye 4% de la valeur de la voiture
           {

             $requete3 = $db->prepare('SELECT prix FROM vehicule  WHERE numero_vehicule=? ');
             $requete3->execute(array($reponse1['numero_vehicule']));
             $reponse3=$requete3->fetch();
             echo "<tr>
             <td class=\"text-center\"></td>
             <td>Pénalité sur accident non responsable </td>
             <td class=\"text-right\">---</td>
             <td class=\"text-right\">".(0.4*$reponse3['prix'])."</td>
           </tr>";
            $total+=0.4*$reponse3['prix'];
           
           }
//niveau de carburant différence de celui à la prise du voiture
           if((isset($_SESSION['niveauCarburant'])&&($_SESSION['niveauCarburant']<$reponse2['niveau_carburant'])))
           {

             echo "<tr>
             <td class=\"text-center\"></td>
             <td>Pénalité sur manque de  carburant </td>
             <td class=\"text-right\">".$_SESSION['prixCarburant']."</td>
             <td class=\"text-right\">".($_SESSION['prixCarburant']*($reponse2['niveau_carburant']-$_SESSION['niveauCarburant']))."</td>
           </tr>";

           $total+=$_SESSION['prixCarburant']*($reponse2['niveau_carburant']-$_SESSION['niveauCarburant']);
           }
//Cas d'eraflure à la remise
           if((isset($_SESSION['prixEraflure']))&&($_SESSION['nbrEraflure']!=0))
           {

             echo "<tr>
             <td class=\"text-center\"></td>
             <td>Pénalité sur Eraflure </td>
             <td class=\"text-right\">".$_SESSION['prixEraflure']."</td>
             <td class=\"text-right\">".$_SESSION['prixEraflure']."</td>
           </tr>";
              $total+=$_SESSION['prixEraflure'];
           
           }
           //Cas de bosse à la remise
           if((isset($_SESSION['prixBosse']))&&($_SESSION['nbrBosse']!=0))
           {

             echo "<tr>
             <td class=\"text-center\"></td>
             <td>Pénalité sur Bosse </td>
             <td class=\"text-right\">".$_SESSION['prixBosse']."</td>
             <td class=\"text-right\">".$_SESSION['prixBosse']."</td>
           </tr>";
            $total+=$_SESSION['prixBosse'];
           
           }

           //Cas de maque d'une piéce à la remise
           if((isset($_SESSION['prixManque'])&&($_SESSION['nbrManque']!=0)))
           {

             echo "<tr>
             <td class=\"text-center\"></td>
             <td>Pénalité sur Manque d'une piéce </td>
             <td class=\"text-right\">".$_SESSION['prixManque']."</td>
             <td class=\"text-right\">".$_SESSION['prixManque']."</td>
           </tr>";
            $total+=$_SESSION['prixManque'];
           
           }

              //tarifs de location prépayés
              $prixLocationPrepaye=$reponse1['montant_paye']-$_SESSION['caution'];
             

           $test=false;
               //caution doit étre payé et ne couvre pas les tarifs de location et n'est pas remis en cas d'accident fautif et de perte de papiers
               if((isset($_SESSION['fautif'])&& $_SESSION['fautif']=='oui')||(isset($_SESSION['manquePapiers'])&&$_SESSION['manquePapiers']=='oui')||(isset($_SESSION['nbrEraflure'])&&$_SESSION['nbrEraflure']!=0)||(isset($_SESSION['nbrBosse'])&&$_SESSION['nbrBosse']!=0)||(isset($_SESSION['nbrManque'])&&$_SESSION['nbrManque']!=0))
               {
                 echo "<tr>
                 <td class=\"text-center\"></td>
                 <td>Caution payé  <span class=\"badge bg-important\">non remis</span></td>
                 <td class=\"text-right\"></td>
                 <td class=\"text-right\">".$_SESSION['caution']."</td>
               </tr>";
                 $test=true;
               
               }
               else
               {
                 echo "<tr>
                 <td class=\"text-center\"></td>
                 <td>Caution </td>
                 <td class=\"text-right\"></td>
                 <td class=\"text-right\">".$_SESSION['caution']."</td>
               </tr>";
   
               }


           echo "
           
           <tr>
           <td colspan=\"2\" rowspan=\"4\">
             <h5> <strong>Termes et Conditions</strong></h5>
             <table>
               <tr>
                 <td >-En cas d'accident le locataire doit payer une franchise égale à 4% de la valeur de la voiture s'il a appliqué toute les conditions du contrat et dans le cas contraire,il doit payer tous les frais</td>
               </tr>
               <tr>
                 <td>-Le kilométrage est limité à ". $_SESSION['seuilkilometrage']." km/jour .Tout excés est facturé à base de ".($_SESSION['penalitekilometrage']*1000)." millimime/km</td>
               </tr>
               <tr>
                 <td>-la T.V.A est de taux 18% et calculée sur le totale du prix de location</td>
               </tr>
               <tr>
                 <td>-Le client doit retourner la voiture avec le meme niveau de carburant de départ 2 càd la moitié du réservoire</td>
               </tr>
               
             </table>";
             //le reste à payer de prix de location 
             
             echo"
             <td class=\"text-right\"><strong>Total prépayé :</strong></td>
             <td class=\"text-right\">".$reponse1['montant_paye']."</td>
         </tr>
           
           ";
           //
           echo"
                      
           <tr>
             <td class=\"text-right no-border\"><strong>Totale dépenses HT</strong></td>
             <td class=\"text-right\">".$total."</td>
           </tr>";

           echo "<tr>
           <td class=\"text-right no-border\"><strong>Total dépenses TTC</strong></td>
           <td class=\"text-right\">".($total+$TVA)."</td>
         </tr>";

           //Montant finale à payer
           if($test==true)//le cas ou la voiture est endommagée le caution n'est pas remis et est pris comme pénalité 
           $montantàpayer=$reponse1['montant_paye']-$_SESSION['caution']-($total+$TVA);
           else
           $montantàpayer=$reponse1['montant_paye']-($total+$TVA);

           if($montantàpayer>0)
           {
         echo" <tr>
         <td class=\"text-right no-border\">
           <div class=\"well well-small green\"><strong>Total à remettre:</strong></div>
         </td>";
           }
           else
           {
             echo" <tr>
             <td class=\"text-right no-border\">
               <div class=\"well well-small green\"><strong>Net à payer:</strong></div>
             </td>";
               }
         
         echo "<td class=\"text-right\"><strong>".(abs($montantàpayer))."</strong></td>
         </tr>
         </tbody>
         </table>
         <a  target=\"_blank\" class=\"btn btn-theme02\" href=\"facturePDF.php?num=".$numeroReservation."\">Payer et éditer</a>";
    
         }
    
               
               ?>

<?php
function ContenuFacturePrimaire($numeroReservation)
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
 $requete1 = $db->prepare('SELECT * FROM reservation  WHERE numero_reservation=? ');
 $requete1->execute(array($numeroReservation));
 $reponse1=$requete1->fetch();
 $requete2 = $db->prepare('SELECT prix_location FROM vehicule  WHERE numero_vehicule=? ');
 $requete2->execute(array($reponse1['numero_vehicule']));
 $reponse2=$requete2->fetch();
 
 $total=0;
 //afficher durée de location
 echo "<tr>
 <td class=\"text-center\">". dureeLocation($numeroReservation)."</td>
 <td>Durée De location convenu </td>
 <td class=\"text-right\">---</td>
 <td class=\"text-right\">---</td>
</tr>";
$dureeTotal=dureeLocation($numeroReservation);
//afficher prix de location 
echo "<tr>
<td class=\"text-center\"></td>
<td>Prix de Location</td>
<td class=\"text-right\">".afficherPrixLocation($numeroReservation)."</td>
<td class=\"text-right\">".prixLocationTotale($numeroReservation)."</td>
</tr>";
$total+=prixLocationTotale($numeroReservation);



//T.V.A 
echo "<tr>
<td class=\"text-center\"></td>
<td>T.V.A</td>
<td class=\"text-right\">---</td>
<td class=\"text-right\">".($_SESSION['tauxTVA']*prixLocationTotale($numeroReservation))."</td>
</tr>";
$TVA=$_SESSION['tauxTVA']*prixLocationTotale($numeroReservation);

//droits de timbre
echo "<tr>
<td class=\"text-center\"></td>
<td>Droits de Timbre </td>
<td class=\"text-right\">".$_SESSION['droitTimbre']."</td>
<td class=\"text-right\">".$_SESSION['droitTimbre']."</td>
</tr>";
$total+=$_SESSION['droitTimbre'];

//Dépenses pour chauffeur

if($reponse1['chauffeur']=='oui')
{
echo "<tr>
<td class=\"text-center\"></td>
<td>Tarifs du chauffeur</td>
<td class=\"text-right\">".$_SESSION['prixChauffeur']."</td>
<td class=\"text-right\">".($_SESSION['prixChauffeur']*$dureeTotal)."</td>
</tr>";
$total+=($_SESSION['prixChauffeur']*$dureeTotal);
}

//caution doit étre payé et ne couvre pas les tarifs de location et n'est pas remis en cas d'accident fautif et de perte de papiers
echo "<tr>
<td class=\"text-center\"></td>
<td>Caution</td>
<td class=\"text-right\"></td>
<td class=\"text-right\">".$_SESSION['caution']."</td>
</tr>";
$total+=$_SESSION['caution'];


echo "

<tr>
<td colspan=\"2\" rowspan=\"4\">
<h5> <strong>Termes et Conditions</strong></h5>
<table>
<tr>
<td >-En cas d'accident le locataire doit payer une franchise égale à 4% de la valeur de la voiture s'il a appliqué toute les conditions du contrat et dans le cas contraire,il doit payer tous les frais</td>
</tr>
<tr>
<td>-Le kilométrage est limité à ". $_SESSION['seuilkilometrage']." km/jour .Tout excés est facturé à base de ".($_SESSION['penalitekilometrage']*1000)." millimime/km</td>
</tr>
<tr>
<td>-la T.V.A est de taux 18% et calculée sur le totale du prix de location</td>
</tr>
<tr>
<td>-Le client doit retourner la voiture avec le meme niveau de carburant de départ 2 càd la moitié du réservoire</td>
</tr>

</table>
<td class=\"text-right no-border\"><strong>Totale dépenses HT</strong></td>
<td class=\"text-right\">".$total."</td>
</tr>";



echo "<tr>
<td class=\"text-right no-border\"><strong>Total dépenses TTC</strong></td>
<td class=\"text-right\">".($total+$TVA)."</td>
</tr>";

//Montant finale à payer
$montantàpayer=$total+$TVA;
echo" <tr>
<td class=\"text-right no-border\">
<div class=\"well well-small green\"><strong>Net à payer:</strong></div>
</td>
<td class=\"text-right\"><strong>".$montantàpayer."</strong></td>
</tr>
</tbody>
</table>
<a target=\"_blank\"  class=\"btn btn-theme02\" href=\"facturePDF.php?numRes=".$numeroReservation."\">Payer et éditer</a>";


}

?>
