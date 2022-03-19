<?php
if(isset($_GET['numReser']))
{
supprimerReservation($_GET['numReser']);

}
try
{
$db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
$requete1= $db->prepare('SELECT * FROM reservation where etat_de_reservation=?');
$requete1->execute(array('validée'));
$i=0;
while($reponse1=$requete1->fetch())
{   $i++;
    $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
    $requete2->execute(array($reponse1['numero_vehicule']));
    $vehicule=$requete2->fetch();
    $requete3= $db->prepare('SELECT nom,prenom FROM client  WHERE numero_client= ? ');
    $requete3->execute(array($reponse1['numero_client']));
    $client=$requete3->fetch();
    if($i%5==0 || $i%5==1 || $i%5==2)
    echo "<tr class=\"gradeA\">
    <td>".$reponse1['numero_reservation']."</td>
    <td>".$reponse1['date_ajout']."</td>
    <td class=\"hidden-phone\">".$reponse1['date_prise_en_charge']."</td>
    <td class=\"center hidden-phone\">".$reponse1['date_restitution']."</td>
    <td class=\"center hidden-phone\">".$client['nom'].' '.$client['prenom']."</td>
    <td class=\"center hidden-phone\">".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
    <td class=\"center hidden-phone\">".$reponse1['etat_de_reservation']."</td>
    <td class=\"center hidden-phone\">".$reponse1['montant_paye']."</td>
    <td class=\"center hidden-phone\"><a class=\"btn btn-success btn-xs\" href=\"contrat.php?numRes=".$reponse1['numero_reservation']."\"><i class=\" fa fa-check\"></i></a>
    <a class=\"btn btn-primary btn-xs\" href=\"modifierReservation_ad.php?numRes=".$reponse1['numero_reservation']."\"><i class=\"fa fa-pencil\"></i></a>
    <a class=\"btn btn-danger btn-xs\" href=\"listeReservations_ad.php?numReser=".$reponse1['numero_reservation']."\"><i class=\"fa fa-trash-o\"></i></a></td>
     </tr>";
  else
  echo "<tr class=\"gradeC\">
  <td>".$reponse1['numero_reservation']."</td>
  <td>".$reponse1['date_ajout']."</td>
  <td class=\"hidden-phone\">".$reponse1['date_prise_en_charge']."</td>
  <td class=\"center hidden-phone\">".$reponse1['date_restitution']."</td>
  <td class=\"center hidden-phone\">".$client['nom'].' '.$client['prenom']."</td>
  <td class=\"center hidden-phone\">".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
  <td class=\"center hidden-phone\">".$reponse1['etat_de_reservation']."</td>
  <td class=\"center hidden-phone\">".$reponse1['montant_paye']."</td>
  <td class=\"center hidden-phone\"><a class=\"btn btn-success btn-xs\" href=\"contrat.php?numRes=".$reponse1['numero_reservation']."\"><i class=\" fa fa-check\"></i></a>
    <a class=\"btn btn-primary btn-xs\" href=\"modifierReservation_ad.php?numRes=".$reponse1['numero_reservation']."\"><i class=\"fa fa-pencil\"></i></a>
    <a class=\"btn btn-danger btn-xs\" href=\"listeReservations_ad.php?numReser=".$reponse1['numero_reservation']."\"><i class=\"fa fa-trash-o\"></i></a></td>
     </tr>";


}


?>
<?php 

function supprimerReservation($numeroReservation)
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
  $requete=$db->prepare('DELETE FROM reservation WHERE numero_reservation=?');
  $requete->execute(array($numeroReservation));


}


?>