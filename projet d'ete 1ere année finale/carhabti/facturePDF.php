<?php

session_start();
ob_start();
?>
<style>
img{margin-top:40px;margin-left:30px;}
table{width:100%;border-collapse: collapse; }
.titre{font-size:20px;}
.nombre{text-align: center;}
</style>
<page >
	
<table style="margin-bottom:90px;">
<tr>
	<td style="width:50%"><img src="img\logoAgence.png"></td>
	<td ><h1>Facture</h1></td>
</tr>
</table>
<table style="vertical-align:top;margin-left:50px;margin-bottom:60px;">
<tr>
	<td style="width:65%">
	<table>
		
	<tr>
		<td class="titre"style="width:30%" ><strong>Client:</strong></td>
	</tr>
	<?php  if(isset($_GET['numRes']))
                  afficheCoordonneesClient($_GET['numRes']);
                  else
                     afficheCoordonneesClient($_GET['num']);?> 

	</table>
	
	</td>
	
	<td style="font-size:15px;"><strong>n° facture: <?php  if(isset($_GET['numRes']))
	$numeroReservation=$_GET['numRes'];
	else
	$numeroReservation=$_GET['num'];
	 echo $numeroReservation; ?>
	  <br>De date:<?php $dateFacture=date('Y-m-d H:i:s');            
      $dateFacture= date("d-m-Y H:i", strtotime("-60 minutes", strtotime($dateFacture))); echo $dateFacture;?></strong></td>
</tr> 
</table>

<table border='1' style="width:100%;margin-left:50px;">
<tr style="background-color:grey;color:white; " class="nombre">
<th style="width:7%;height:20px;">nbr</th>
<th style="width:50%;height:20px">Description</th>
<th style="width:15%;height:20px">Prix Unitaire (dt)</th>
<th style="width:15%;height:20px">Totale(dt)</th>
</tr>
<?php 
                  
                  if(isset($_GET['numRes']))
                  ContenuFacturePrimaire($_GET['numRes']);
                  else
                 $etat= contenuFacture($_GET['num']);
                  
                   ?>
</table>


<page_footer> 
	<table  >
		<tr>
			<td style="width:70%;height:200px"></td>
			<td style="height:300px"><strong>Timbre/signature:</strong></td>

		</tr>
</table>
<p style="text-align:center;margin-bottom:2px" ><strong>Pour Plus D'info Contactez Carhabti Info-Team</strong></p>
	<hr >
	<p style="text-align:center;margin-top:2px"><strong>page 1/1</strong></p>
</page_footer>	
</page>
<?php
$contenu=ob_get_clean();
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

try
{	if(isset($_GET['numRes']))
	$numeroReservation=$_GET['numRes'];
	else
	$numeroReservation=$_GET['num'];
	
	$pdf = new Html2Pdf();
	$pdf->writeHTML($contenu);
	
	$facture=$pdf->output(__DIR__."/facture$numeroReservation.pdf",'S');
	$pdf->output(__DIR__."/facture$numeroReservation.pdf",'I');
	sauvegarderFacture($facture,$numeroReservation);
	$dateToday=date('Y-m-d H:i:s');            
	 $dateToday= date("Y-m-d H:i", strtotime("-60 minutes", strtotime($dateToday)));//date exacte en ce moment
	conversionVersOperation($numeroReservation,$dateToday,$etat);
	/*
	if(isset($_GET['numRes']))
	header("location:facture.php?numRes=$numeroReservation");
	else
	header("location:facture.php?num=$numeroReservation");
	*/
	
}

catch(Html2Pdf_exception $e)
{
	die($e);
}
?>
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
			   /*
			   //date exacte en ce moment
              */
                $requete1 = $db->prepare('SELECT numero_client FROM reservation  WHERE numero_reservation=? ');
                $requete1->execute(array($numeroReservation));
                $reponse1=$requete1->fetch();
                
                $requete2 = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
                $requete2->execute(array($reponse1['numero_client']));
                $reponse2=$requete2->fetch();
			  
			   echo '<tr><td>'.$reponse2['nom'].' '.$reponse2['prenom'].'</td></tr>'.
			    "<tr><td><strong>CIN/Passeport:</strong>".$reponse2['cin'].'</td></tr>'
			   
			   ."<tr><td>".$reponse2['adresse'].
			   " </td></tr>
			  
			   <tr><td><strong>Tel:</strong> ".$reponse2['tel']."</td></tr>";
			
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
					 echo "
				   
				   <tr >
				   <td style=\"width:7%;height:20px; text-align: center\">". dureeLocation($numeroReservation)."</td>
				   <td style=\"width:50%;height:20px\"'>Durée De location convenu </td>
				   <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
				   <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
				   </tr>
				 
				 
				 
				   ";
					$dureeTotal=dureeLocation($numeroReservation);
				   //afficher prix de location 
				   echo "	 
				 <tr >
				 <td style=\"width:7%;height:20px\"></td>
				 <td style=\"width:50%;height:20px\">Prix de Location hors taxes</td>
				 <td style=\"width:15%;height:20px\"class=\"nombre\">".afficherPrixLocation($numeroReservation)."</td>
				 <td style=\"width:15%;height:20px\"class=\"nombre\">".prixLocationTotale($numeroReservation)."</td>
				 </tr>			 
				 ";
				  
					 $total+=prixLocationTotale($numeroReservation);
			  

				 //T.V.A 
				 echo "
			   <tr >
			   <td style=\"width:7%;height:20px\"></td>
			   <td style=\"width:50%;height:20px\">T.V.A</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".($_SESSION['tauxTVA']*prixLocationTotale($numeroReservation))."</td>
			   </tr>";
			   $TVA=$_SESSION['tauxTVA']*prixLocationTotale($numeroReservation);

			   //droits de timbre
			   echo "
			 <tr >
			   <td style=\"width:7%;height:20px\"></td>
			   <td style=\"width:50%;height:20px\">Droits de Timbre</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['droitTimbre']."</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['droitTimbre']."</td>
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
			   echo "
			 <tr >
			   <td style=\"width:7%;height:20px; \"class=\"nombre\">".$joursDepassee."</td>
			   <td style=\"width:50%;height:20px\">Prolongation de location</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".afficherPrixLocation($numeroReservation)."</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".$prixprolongation."</td>
			   </tr>";
			 $total+=$prixprolongation;
			 echo "
			 <tr >
			 <td style=\"width:7%;height:20px\"></td>
			 <td style=\"width:50%;height:20px\">Pénalité sur prolongation de location inattendu </td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['penaliteProlongementInattendu']."</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['penaliteProlongementInattendu']."</td>
			 </tr>";
			   $total+=$_SESSION['penaliteProlongementInattendu'];
			   $dureeTotal=$dureeTotal+$joursDepassee;
			   $prixprolongation+=$_SESSION['penaliteProlongementInattendu'];
			 }
				//Dépenses pour chauffeur
				
				if(($reponse1['chauffeur']=='oui')||($reponse1['chauffeur']=='Oui'))
				{
				  echo "
				<tr >
			 <td style=\"width:7%;height:20px\"></td>
			 <td style=\"width:50%;height:20px\">Tarifs du chauffeur </td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixChauffeur']."</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".($_SESSION['prixChauffeur']*$dureeTotal)."</td>
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
			 echo "
			 <tr >
			 <td style=\"width:7%;height:20px\"></td>
			 <td style=\"width:50%;height:20px\">dépassement de kilométrage</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['penalitekilometrage']."</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$depassementKilometrage."</td>
			 </tr>";


		   }}
	 
		   if((isset($_SESSION['fautif'])&&($_SESSION['fautif']=='non')))
		   {

			 $requete3 = $db->prepare('SELECT prix FROM vehicule  WHERE numero_vehicule=? ');
			 $requete3->execute(array($reponse1['numero_vehicule']));
			 $reponse3=$requete3->fetch();
			 echo "
		   <tr >
			 <td style=\"width:7%;height:20px\"></td>
			 <td style=\"width:50%;height:20px\">Pénalité sur accident non responsable </td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".(0.4*$reponse3['prix'])."</td>
			 </tr>";
			$total+=0.4*$reponse3['prix'];
		   
		   }

		   if((isset($_SESSION['niveauCarburant'])&&($_SESSION['niveauCarburant']<$reponse2['niveau_carburant'])))
		   {

			 echo "
		   <tr >
			 <td style=\"width:7%;height:20px\"></td>
			 <td style=\"width:50%;height:20px\">Pénalité sur manque de  carburant : </td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixCarburant']."</td>
			 <td style=\"width:15%;height:20px\"class=\"nombre\">".($_SESSION['prixCarburant']*($reponse2['niveau_carburant']-$_SESSION['niveauCarburant']))."</td>
			 </tr>";
				$total+=$_SESSION['prixCarburant']*($reponse2['niveau_carburant']-$_SESSION['niveauCarburant']);
		   
		   }
		   //Cas d'eraflure à la remise
           if(isset($_SESSION['prixEraflure']))
           {
			echo "
			<tr >
			  <td style=\"width:7%;height:20px\"></td>
			  <td style=\"width:50%;height:20px\">Pénalité sur Eraflure </td>
			  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixEraflure']."</td>
			  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixEraflure']."</td>
			  </tr>";
			  $total+=$_SESSION['prixEraflure'];
           
           }

     //Cas de bosse à la remise
	 if(isset($_SESSION['prixBosse']))
	 {


		echo "
		<tr >
		  <td style=\"width:7%;height:20px\"></td>
		  <td style=\"width:50%;height:20px\">Pénalité sur Bosse </td>
		  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixBosse']."</td>
		  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixBosse']."</td>
		  </tr>";
	  $total+=$_SESSION['prixBosse'];
	 
	 }

           //Cas de maque d'une piéce à la remise
           if(isset($_SESSION['prixManque']))
           {

			echo "
			<tr >
			  <td style=\"width:7%;height:20px\"></td>
			  <td style=\"width:50%;height:20px\">Pénalité sur Manque d'une piéce</td>
			  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixManque']."</td>
			  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixManque']."</td>
			  </tr>";
            $total+=$_SESSION['prixManque'];
           
           }


			  //tarifs de location prépayés
			  $prixLocationPrepaye=$reponse1['montant_paye']-$_SESSION['caution'];
			 

		   $test=false;
			   //caution doit étre payé et ne couvre pas les tarifs de location et n'est pas remis en cas d'accident fautif et de perte de papiers
			   if((isset($_SESSION['fautif'])&& $_SESSION['fautif']=='oui')||(isset($_SESSION['manquePapiers'])&&$_SESSION['manquePapiers']=='oui')||(isset($_SESSION['nbrEraflure'])&&$_SESSION['nbrEraflure']!=0)||(isset($_SESSION['nbrBosse'])&&$_SESSION['nbrBosse']!=0)||(isset($_SESSION['nbrManque'])&&$_SESSION['nbrManque']!=0))
			   {
				 echo "
			   <tr >
			   <td style=\"width:7%;height:20px\"></td>
			   <td style=\"width:50%;height:20px\">Caution payé  <span style=\"color:red;\">non remis</span> </td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\"class=\"nombre\">---</td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['caution']."</td>
			   </tr>";
				 $test=true;
				 if(isset($_SESSION['fautif'])&& $_SESSION['fautif']=='oui')
				 {
				   $etatVehicule='endommagee';
				 }
				 if(isset($_SESSION['manquePapiers'])&& $_SESSION['manquePapiers']=='oui')
				 {
				   $etatVehicule=$etatVehicule.' manque des papiers';
				 }
				 if(isset($_SESSION['nbrEraflure'])&& $_SESSION['nbrEraflure']!=0)
				 {
				   $etatVehicule=$etatVehicule.' Eraflures';
				 }
				 if(isset($_SESSION['nbrBosse'])&& $_SESSION['nbrBosse']!=0)
				 {
				   $etatVehicule=$etatVehicule.' bosses';
				 }
				 if(isset($_SESSION['nbrManque'])&& $_SESSION['nbrManque']!=0)
				 {
				   $etatVehicule=$etatVehicule.' manque des piéces mécaniques';
				 }
			   }
			   else
			   {
				 echo "
			   <tr >
			   <td style=\"width:7%;height:20px\"class=\"nombre\"></td>
			   <td style=\"width:50%;height:20px\">Caution </td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\"></td>
			   <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['caution']."</td>
			   </tr>";
   
			   }


		   echo "
		   
		   <tr>
		   <td colspan=\"2\" rowspan=\"4\">
			 <h5> <strong>Termes et Conditions :</strong></h5>
			 
			   -En cas d'accident le locataire doit payer une franchiseégale à 4% de<br>  la valeur de la voiture s'il a appliqué  toute les conditions du contrat et <br>dans le cas contraire,il doit payer tous les frais.<br> 
			  
				-Le kilométrage est limité à ". $_SESSION['seuilkilometrage']." km/jour .Tout excés est  facturé à base<br> de ".($_SESSION['penalitekilometrage']*1000)." millimime/km.<br>
			  
				 -la T.V.A est de taux 18% et calculée sur le totale du prix de location<br>
			   
				 -Le client doit retourner la voiture avec le meme niveau 2 de carburant<br> de départ  càd la moitié du réservoire .<br>
			  
			   </td>
			 
			 <td  ><strong>Total prépayé :</strong></td>
			 <td class=\"nombre\">".$reponse1['montant_paye']."</td>
		 </tr>
		   
		   ";
		   
		   echo"
					  
		   <tr>
			 <td ><strong>Totale dépenses HT</strong></td>
			 <td >".$total."</td>
		   </tr>";

		   echo "<tr>
		   <td ><strong>Total dépenses TTC</strong></td>
		   <td >".($total+$TVA)."</td>
		 </tr>";

		   //Montant finale à payer
		   if($test==true)//le cas ou la voiture est endommagée le caution n'est pas remis et est pris comme pénalité 
		   $montantàpayer=$reponse1['montant_paye']-$_SESSION['caution']-($total+$TVA);
		   else
		   $montantàpayer=$reponse1['montant_paye']-($total+$TVA);

		   if($montantàpayer>0)
		   {
		 echo" <tr>
		 <td style=\" background-color:grey;\">
		   <strong>Total à remettre:</strong>
		 </td>";
		   }
		   else
		   {
			 echo" <tr>
			 <td style=\" background-color:grey;\">
			   <strong>Net à payer:</strong>
			 </td>";
			   }
		 
		 echo "<td ><strong>".(abs($montantàpayer))." dt</strong></td>
		 </tr>

		";
		payerFacture($numeroReservation,$montantàpayer);
		return $etatVehicule;
		
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
 echo "
				   
 <tr >
 <td style=\"width:7%;height:20px; text-align: center\">". dureeLocation($numeroReservation)."</td>
 <td style=\"width:50%;height:20px\"'>Durée De location convenu </td>
 <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
 <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
 </tr>
 ";
$dureeTotal=dureeLocation($numeroReservation);
//afficher prix de location 
echo "	 
<tr >
<td style=\"width:7%;height:20px\"></td>
<td style=\"width:50%;height:20px\">Prix de Location hors taxes</td>
<td style=\"width:15%;height:20px\"class=\"nombre\">".afficherPrixLocation($numeroReservation)."</td>
<td style=\"width:15%;height:20px\"class=\"nombre\">".prixLocationTotale($numeroReservation)."</td>
</tr>			 
";
$total+=prixLocationTotale($numeroReservation);



//T.V.A 
echo "
<tr >
<td style=\"width:7%;height:20px\"></td>
<td style=\"width:50%;height:20px\">T.V.A</td>
<td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
 <td style=\"width:15%;height:20px\"class=\"nombre\">".($_SESSION['tauxTVA']*prixLocationTotale($numeroReservation))."</td>
</tr>";		   
$TVA=$_SESSION['tauxTVA']*prixLocationTotale($numeroReservation);
//droits de timbre
echo "
<tr >
  <td style=\"width:7%;height:20px\"></td>
  <td style=\"width:50%;height:20px\">Droits de Timbre</td>
  <td style=\"width:15%;height:20px\"class=\"nombre\">---</td>
  <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['droitTimbre']."</td>
  </tr>";
$total+=$_SESSION['droitTimbre'];

//Dépenses pour chauffeur

if($reponse1['chauffeur']=='oui')
{
	echo "
	<tr >
 <td style=\"width:7%;height:20px\"></td>
 <td style=\"width:50%;height:20px\">Tarifs du chauffeur </td>
 <td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['prixChauffeur']."</td>
 <td style=\"width:15%;height:20px\"class=\"nombre\">".($_SESSION['prixChauffeur']*$dureeTotal)."</td>
 </tr>";
$total+=($_SESSION['prixChauffeur']*$dureeTotal);
}

//caution doit étre payé et ne couvre pas les tarifs de location et n'est pas remis en cas d'accident fautif et de perte de papiers
echo "
<tr >
<td style=\"width:7%;height:20px\"class=\"nombre\"></td>
<td style=\"width:50%;height:20px\">Caution </td>
<td style=\"width:15%;height:20px\"class=\"nombre\"></td>
<td style=\"width:15%;height:20px\"class=\"nombre\">".$_SESSION['caution']."</td>
</tr>";
$total+=$_SESSION['caution'];


echo "
		   
		   <tr>
		   <td colspan=\"2\" rowspan=\"4\">
			 <h5> <strong>Termes et Conditions :</strong></h5>
			 
			   -En cas d'accident le locataire doit payer une franchiseégale à 4% de<br>  la valeur de la voiture s'il a appliqué  toute les conditions du contrat et <br>dans le cas contraire,il doit payer tous les frais.<br> 
			  
				-Le kilométrage est limité à ". $_SESSION['seuilkilometrage']." km/jour .Tout excés est  facturé à base<br> de ".($_SESSION['penalitekilometrage']*1000)." millimime/km.<br>
			  
				 -la T.V.A est de taux 18% et calculée sur le totale du prix de location<br>
			   
				 -Le client doit retourner la voiture avec le meme niveau 2 de carburant<br> de départ  càd la moitié du réservoire .<br>
			  
			   </td>
			 
			
		 </tr>
		   
		   ";

echo"
  
<tr>
<td ><strong>Totale dépenses HT</strong></td>
<td >".$total."</td>
</tr>";

echo "<tr>
<td ><strong>Total dépenses TTC</strong></td>
<td >".($total+$TVA)."</td>
</tr>";
//Montant finale à payer
$montantàpayer=$total+$TVA;

echo" <tr>
<td style=\" background-color:grey;\">
<strong>Net à payer:</strong>
</td>
<td ><strong>".$montantàpayer." dt</strong></td>
</tr>";
payerFacture($numeroReservation,$montantàpayer);
}
function sauvegarderFacture($facture,$numeroReservation)
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

   $requete = $db->prepare('UPDATE reservation SET Facture=? WHERE numero_reservation=? ');
   $requete->execute(array($facture,$numeroReservation));
}
function payerFacture($numeroReservation,$montant)
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
  $requete = $db->prepare('UPDATE reservation SET montant_paye=? WHERE numero_reservation=? ');
  $requete->execute(array($montant,$numeroReservation));

}
?>
<?php

function conversionVersOperation($numeroReservation,$dateRemise,$etatVehicule)
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
  if(!empty($reponse1))
  {                

$requete2= $db->prepare('INSERT INTO operation(numero_operation,numero_client,numero_vehicule,date_prise_en_charge,date_restitution_reelle,etat_vehicule,prix_paye,facture_finale,contrat) VALUES(?,?,?,?,?,?,?,?,?)');
$requete2->execute(array($reponse1['numero_reservation'],$reponse1['numero_client'],$reponse1['numero_vehicule'],$reponse1['date_prise_en_charge'],$dateRemise,$etatVehicule,$reponse1['montant_paye'],$reponse1['Facture'],$reponse1['contrat']));
$requete3=$db->prepare('DELETE FROM reservation WHERE numero_reservation=?');
$requete3->execute(array($numeroReservation));

  }
}

?>