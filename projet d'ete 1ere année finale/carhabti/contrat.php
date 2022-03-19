<?php

session_start();
ob_start();
?>
<style>
img{margin-top:20px;margin-left:30px;}
table{width:100%;border-collapse: collapse; }
.titre{font-size:20px;}
.nombre{text-align: center;}
h4{line-height:2px;margin-top:1px;margin-bottom:9px}
.espace{margin-left:90px;font-size:15px;}
.distance{word-spacing: 10em;}
.paragraphe{font-size:15px;}
</style>
<page >
	
<table style="margin-bottom:7px;margin-top:2px">
<tr>
	<td style="width:80%"><img src="img\logoAgence.png"></td>
	<?php 
	if(isset($_GET['numRes']))
	$numeroReservation=$_GET['numRes'];
	else
	$numeroReservation=$_GET['num'];	


	echo"<td><a href=\"facture.php?numRes=$numeroReservation\" >Facture Primaire</a></td>";
	
	
	
	?>
	
</tr>
</table>
<h1 class="nombre"style="margin-bottom:30px;margin-top:7px;text-decoration: underline;">Contrat de location </h1>
<p style="margin-left:46px;">
<?php
if(isset($_GET['numRes']))
$numeroReservation=$_GET['numRes'];
else
$numeroReservation=$_GET['num'];	
  echo "<h4 style=\"margin-bottom:20px;\">Contrat n°:$numeroReservation</h4>";
/* try
			   {
			   $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
			   'root', '');
			   }
			   catch (Exception $e)
			   {
			   die('Erreur : ' . $e->getMessage());
			   }
			   if(isset($_GET['numRes']))
			   $numeroReservation=$_GET['numRes'];
			   else
			   $numeroReservation=$_GET['num'];
			   $requete1 = $db->prepare('SELECT numero_vehicule FROM reservation  WHERE numero_reservation=? ');
				$requete1->execute(array($numeroReservation));
				/*
				$reponse1=$requete1->fetch();
			   $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
			   $requete2->execute(array($reponse1['numero_vehicule']));
			   $vehicule=$requete2->fetch();*/
			   ?>
			
<h4>Entre:
<span>Agence CARHABTI</span></h4>

<?php afficherCoordonneesAgence();?>
<h4>Propriétaire de la voiture</h4>
<?php
  
  if(isset($_GET['numRes']))
	$numeroReservation=$_GET['numRes'];
	else
	$numeroReservation=$_GET['num'];	
afficherCoordonneesVoiture($numeroReservation)
?>
<h4>Et Locataire M./Mme:</h4>
<?php
 
 if(isset($_GET['numRes']))
 $numeroReservation=$_GET['numRes'];
 else
 $numeroReservation=$_GET['num'];	
  echo"<p class=\"espace\">";
  afficheCoordonneesClient($numeroReservation);
  echo"</p>";
  
  afficherCoordonneesconducteur2($numeroReservation);

?>
<h4>Etat de la voiture: </h4> 

	<?php 
if(isset($_GET['numRes']))
$numeroReservation=$_GET['numRes'];
else
$numeroReservation=$_GET['num'];	
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
$requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
$requete2->execute(array($reponse1['numero_vehicule']));
$vehicule=$requete2->fetch(); 
$kilom=$vehicule['kilometrage'];
$reservoire=$vehicule['niveau_carburant'];
$datep=$reponse1['date_prise_en_charge'];
$dater=$reponse1['date_restitution'];
$datep=$reponse1['date_prise_en_charge'];
$dater=$reponse1['date_restitution'];
$chauffeur=$reponse1['chauffeur'];
echo "<p class=\"paragraphe\" style=\"margin-bottom:3px\">Le locataire declare avoir recu le vehicule avec un niveau de carburant de: $reservoire et en état de marche. <br> Il atteste également par sa signature que le véhicule loué est prise en charge à l'état suivant :</p>";
echo"<p class=\"espace\"style=\"margin-top:3px\">Kilometrage depart: $kilom<br>Niveau de reservoir depart : $reservoire </p>";
echo"<h4>Prise de => à:</h4><p class=\"espace\">Date De Prise En Charge: $datep <br>Date De Remise: $dater<br></p>";
echo"<h4>l'agence CARHABTI declare avoir recu:  </h4> <p class=\"espace\"  style=\"margin-bottom:1px\">Un cautionnement de valeur:".$_SESSION['caution']."<br>Un montant couvrant la durée de location de valeur: ".($reponse1['montant_paye']-$_SESSION['caution'])."</p>";
echo"<br><span class=\"paragraphe\" >Le locataire et le conducteur confirment avoir pris connaissance des tarifs mentionnées ci-dessus et les tarifs de l'option supplémentaire chauffeur,ainsi que des conditions générales de location et d'assurance mentionnées à la deuxiéme page du contrat.En cas de litiges, ils reconnaissent le domicile du loueur comme for juridique.Fait en deux exemplaires dont un pour le loueur et un pour le locataire.</span>";

?> 
	



</p>

<page_footer> 
	<table style="margin-left:100px;" >
		<tr>
			<td style="width:50%;height:200px;"><strong>Nom & signature de l'Agent </strong></td>
			<td style="height:250px"><strong>Nom & Signature du client</strong></td>

		</tr>
</table>
<p style="text-align:center;margin-bottom:2px" ><strong>Pour Plus D'info Contactez Carhabti Info-Team</strong></p>
	<hr >
	<p style="text-align:center;margin-top:2px"><strong>page 1/3</strong></p>
</page_footer>	
</page>
<page>
<p style="margin-left:46px;margin-right:46px;margin-top:30px">
<h3 >Condition de location</h3>
<h4 style="margin-bottom:30px" >Condition Générale</h4>
<span style="font-size:15px" ><strong>Article 1:Utilisation de la voiture</strong> </span><br>
<p class="paragraphe">Sous peine d'être déchu de l’assurance le locataire s’engage à ne pas laisser conduire la voiture par d’autres personnes  que lui même ou celle agréés par CARHABTI et dont il se porte garant à n’utiliser que ses besoins personnels, à ne pas participer à aucune compétition , à ne pas utiliser la véhicule à des fins illicites ou à des transports de marchandises, à ne pas transporter des personnes à titre onéreux , à ne pas solliciter directement des documents duoaniers , à ne pas surcharger le véhicule tout en transportant un nombre de passagers supérieurs à celui indiqué sur la carte grise . </p>
<span style="font-size:15px" ><strong>Article 2:ASSURANCE</strong> </span><br>
<p class="paragraphe">Le locataire est garanti pour les risques suivants : <br>
1/Pour une somme illimité pour les accidents qu’il peut causer au tiers y compris ceux transportée à titre gracieux mais l’exclusion du locataire, de ses conjoints a ascendant ou descendants et du conducteur  <br>
2/Contre l’incendie du véhicule sauf négligence grave du conducteur. <br> 
3/L’assurance ne rembourse CARHABTI que sur présentation du contrat . Sous peine d'être déchu  de son assurance le locataire s’engage : <br>
A/A déclarer à CARHABTI dans les 48 heures et Immédiatement aux autorités de police toute accident ou incendie
même partiel. <br>
B/ A mentionner dans sa déclaration les circonstances , date , lieu et heure de l’accident , le nom et l’adresse des témoins , le N° de la voiture de l’adversaire , le nom de sa compagnie d’assurance et le numéro de police. <br>
C/ À joindre à cette déclaration tout rapport de police , de gendarmerie ou constat huissier s’il en a été établi . <br>
D/ À ne discuter en aucun CARHABTI stabilité Ni traiter ou transiger avec des tiers relativement à l’accident. <br>
5/a/ Les dommages occasionnés aux pneumatiques , bas de caisse, bris de glaces et accessoires ( rétroviseurs , phares , pare brise , feux de position …) demeurent à la charge du client .  <br>
b/Les dégâts occasionnés par la conduite sur piste ou une mauvaise manipulation de véhicule restent à la charge du client  <br>
Les vêtements et objets transportés ne sont garanties d’aucune façon  <br>
6/La voiture n’est assuré que pour la durée de location :  <br>
passé ce délai et aussi si la prolongation est acceptée CARHABTI décline toute responsabilité  pour les accidents en état d’ivresse  <br>
7/Il n'y a pas d’assurance pour tout conducteur non muni d’un permis de conduite en état de validité en conduisant en état d’ivresse . <br>
8/CARHABTI décline toute responsabilité pour des accidents à la voiture que le locataire pourrait causer pendant la période s’il a délibérément fourni à CARHABTI des informations fausse concernant son identité , son adresse , ou la validité de son permis de conduire . <br>
Suppression de franchise de 2.000 Dinars moyennant un compliment de 7.000 Dinars par journée de location et par voiture , Assurance pour le conducteur et les personnes transportées moyennant 3.000 Dinars par journée de location et par voiture . Cependant la suppression de franchise ne couvre pas les bris de glaces , les dégâts causés au pneumatique , la perte d’équipement et d’accessoires , les frais occasionnés par la perte des papiers du véhicule , le rapatriement et l’immobilisation du du véhicule .
</p>
<span style="font-size:15px" ><strong>Article 3: ESSENCE-HUILE </strong> </span><br>
<p class="paragraphe">L’essence est à la charge du client , le locataire doit vérifier en permanence les niveaux de la boite de vitesse et du pont arrière . Il justifiera de ces travaux par des factures correspondantes sous peine d’avoir à payer une indemnité pour usure anormale .</p>

</p>
<page_footer> 

<p style="text-align:center;margin-bottom:2px" ><strong>Pour Plus D'info Contactez Carhabti Info-Team</strong></p>
	<hr >
	<p style="text-align:center;margin-top:2px"><strong>page 2/3</strong></p>
</page_footer>
</page>
<page>
<p style="margin-left:46px;margin-right:46px;margin-top:26px">
<span style="font-size:15px" ><strong>Article 4: ENTRETIEN ET RÉPARATION </strong> </span><br>
<p class="paragraphe">L’usure mécanique normale est à la charge de CARHABTI toutefois les réparations provenant soit d’une usure anormale soit d’une négligence de la part du locataire seront à la charge et exécutées après un accord écrit et selon la directive de CARHABTI . Elle devront faire l’objet d’une facture acquitté et détaillés , les pièces délictueuse remplacées devront être présentées avec la facture acquitté . En aucune circonstance le locataire ne ne pourra réclamer des dommages et intérêt soit pour retard de livraison de voiture , annulation de la location ou immobilisation dans le cas de réparation effectuée au cours de la location . La responsabilité de CARHABTI ne pourra jamais être engagé  même dans le cas d’accident de personnes ou de chose accusé par vice ou défaut de construction ou défaut de réparation antérieurs .</p>


<span style="font-size:15px" ><strong>  Article 5: ETAT DE LA VOITURE </strong> </span><br>
<p class="paragraphe">La voiture est livrée en parfaite état de marche et de propreté les compteurs et leur prises sont plombés et les plombs ne pourront être enlevé ou violés sous peine de devoir payer la location sur la base de 400 KM par jour . La voiture sera rendu dans le même état de propreté à nettoyage et remise en état . Les cinq pneus sont en bonne sans coupures . En cas de détérioration de l’un d’eux pour cause autre que l’usure normale , le locataire s’engage à le remplacer immédiatement par un pneu de même dimension et d’usure sensiblement égale .</p>


<span style="font-size:15px" ><strong> Article 6:</strong> </span><br>
<p class="paragraphe">Les clients s’interdisent de quitter le territoire tunisien avec les voitures de CARHABTI sans autorisation écrite délivrée par la direction générale </p>



<span style="font-size:15px" ><strong> Article 7: LOCATION-CAUTION-PROLONGATION</strong> </span><br>
<p class="paragraphe">La moitié du prix de location ainsi que la caution sont déterminés par les tarifs en vigueur et payables à l’avance et il peut aussi payer tout à l’avance et prendre sa facture . La caution ne pourra servir en aucun à une prolongation de location afin d’éviter toute contestation et pour un délai supérieur à celui convenu au départ , il devra après avoir obtenu l’accord de CARHABTI faire parvenir le montant de location en cours sous peine de s’exposer à des poursuite judiciaire pour détournement de voiture ou abus de confiance . 
</p>

<span style="font-size:15px" ><strong>Article 8: RÉPARATION DE LA VOITURE </strong> </span><br>
<p class="paragraphe">Le locataire s’interdit formellement d’abandonner le véhicule . En cas d’impossibilité matériel , la voiture sera rapatriée aux frais et par les soins de locataire . La location restant due jusqu’au retour du véhicule .</p>


<span style="font-size:15px" ><strong>Article 9: PAPIER DE LA VOITURE </strong> </span><br>
<p class="paragraphe">Le locataire remettre dès la fin de la location et la rentrée de la voiture , la carte grise et tous les papiers de la voiture le locataire répondra des frais de leur renouvellement . </p>

<span style="font-size:15px" ><strong>Article 10: RESPONSABILITÉ</strong> </span><br>
<p class="paragraphe">Le locataire demeure seul responsable des amandes contraventions et procès  verbaux établis contre lui .</p>

<span style="font-size:15px" ><strong>Article 11:</strong> </span><br>
<p class="paragraphe">A défaut de paiement et en cas de poursuite judiciaire ou de recours à un conseil en vue de poursuite de débiteur devra supporter en sus du montant de sa dette les horaires de dit conseil fixé au minimum: 
-100DT par instance devant le tribunal civil ou la cours d’appel ou devant la juridiction étrangère équivalente 
-50DT avant poursuite et ce au besoin à titre pénal réductible . 
</p>

<span style="font-size:15px" ><strong>Article 12: COMPÉTENCES</strong> </span><br>
<p class="paragraphe">Toute les contestations pouvant être CARHABTI et le locataire sont de compétence exclusive des juridictions du lieu de siège social CARHABTI .</p>
</p>
<page_footer> 

<p style="text-align:center;margin-bottom:2px" ><strong>Pour Plus D'info Contactez Carhabti Info-Team</strong></p>
	<hr >
	<p style="text-align:center;margin-top:2px"><strong>page 3/3</strong></p>
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
	if(isset($_GET['numRes']))
	$pdf->output(__DIR__."/contrat$numeroReservation.pdf",'I');
	else
	{
	
	$contrat=$pdf->output(__DIR__."/contrat$numeroReservation.pdf",'S');
	$pdf->output(__DIR__."/contrat$numeroReservation.pdf",'I');
	sauvegarderContrat($contrat,$numeroReservation);
	}
	/*
	$facture=$pdf->output(__DIR__."/facture$numeroReservation.pdf",'S');
	sauvegarderFacture($facture,$numeroReservation);

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

		function afficherCoordonneesAgence()
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

			
			echo "<p class=\"espace\">Adresse:".$_SESSION['adresse']."<br>Tel:".$_SESSION['telephone']."Fax: ".$_SESSION['fax']."</p>";
			

		}
		function afficherCoordonneesVoiture($numeroReservation)
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
			$requete = $db->prepare('SELECT * FROM vehicule WHERE numero_vehicule=? ');
        	 $requete->execute(array($reponse1['numero_vehicule']));
			$reponse=$requete->fetch();
			echo "<p class=\"espace\">Marque".$reponse['marque']." Modele:".$reponse['modele']." Categorie:".$reponse['categorie']."<br>Immatriculation:".$reponse['serie']." TUN ".$reponse['enregistrement']."</p>";



		}

		function afficherCoordonneesconducteur2($numeroReservation)
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
		   
			if(isset($reponse1['cin_conducteur2'])&&($reponse1['cin_conducteur2']!=0))
			{
			
				echo"<h4>Et un 2eme conducteur M./Mme :</h4>
  				<p class=\"espace\">";
				echo ' Nom & Prénom :'.$reponse1['cin_conducteur2'].' Date de naissance:'.$reponse1['date_naissance_conducteur2'].
				"<br>CIN/Passeport:".$reponse1['cin_conducteur2'].' numéro de permis:'.$reponse1['permis_conducteur2']."<br>Tel°:".$reponse1['tel_conducteur2'];
				echo "</p>";
			}
		}
      
			function afficheCoordonneesClient($numeroReservation)
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
			  
                $requete1 = $db->prepare('SELECT numero_client FROM reservation  WHERE numero_reservation=? ');
                $requete1->execute(array($numeroReservation));
                $reponse1=$requete1->fetch();
                
                $requete2 = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
                $requete2->execute(array($reponse1['numero_client']));
                $reponse2=$requete2->fetch();
			  
			   echo ' Nom:'.$reponse2['nom'].' Prénom:'.$reponse2['prenom'].' Date de naissance:'.$reponse2['date_naissance'].
			    "<br>CIN/Passeport:".$reponse2['cin'].' numéro de permis:'.$reponse2['numero_permis']."<br>Tel°:".$reponse2['tel']."Adresse:".$reponse2['adresse'];
			   
			
			
			  
			
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
			
					
				   
		   
			   ?>

<?php


function sauvegarderContrat($contrat,$numeroReservation)
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
   $requete = $db->prepare('INSERT INTO test (facturepdf)
   VALUES(?)');
   $requete->execute(array($facture));*/
   $requete = $db->prepare('UPDATE reservation SET contrat=? WHERE numero_reservation=? ');
   $requete->execute(array($contrat,$numeroReservation));
}
?>
