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
$requete1= $db->prepare('SELECT * FROM reservation where etat_de_reservation=?');
$requete1->execute(array('en cours'));
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
  {  echo "<tr class=\"gradeA\">
    <td>".$i."</td>
    <td>".$reponse1['date_ajout']."</td>
    <td class=\"hidden-phone\">".$reponse1['date_prise_en_charge']."</td>
    <td class=\"center hidden-phone\">".$reponse1['date_restitution']."</td>
    <td class=\"center hidden-phone\">".$client['nom'].' '.$client['prenom']."</td>
    <td class=\"center hidden-phone\">".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
    
    <td class=\"center hidden-phone\">".$reponse1['montant_paye']."</td>";
    if(isset($reponse1['Facture']))
    echo"
    <td class=\"center hidden-phone\"><a  href=\"intermediaire4.php?num=".$reponse1['numero_reservation']."\"><img src=\"img\pdficon.PNG\" style=\"width:40px;height:40px\"></a></td>";
    else
    echo " <td class=\"center hidden-phone\">---</td>";
    
    echo"<td class=\"center hidden-phone\"><a class=\"btn btn-success btn-xs\" href=\"etatDesLieux.php?num=".$reponse1['numero_reservation']."\"><i class=\" fa fa-check\"></i></a>
      </td>
  </tr>";}
  else
  {echo "<tr class=\"gradeC\">
  <td>".$i."</td>
  <td>".$reponse1['date_ajout']."</td>
  <td class=\"hidden-phone\">".$reponse1['date_prise_en_charge']."</td>
  <td class=\"center hidden-phone\">".$reponse1['date_restitution']."</td>
  <td class=\"center hidden-phone\">".$client['nom'].' '.$client['prenom']."</td>
  <td class=\"center hidden-phone\">".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
  
  <td class=\"center hidden-phone\">".$reponse1['montant_paye']."</td>";
  if(isset($reponse1['Facture']))
  echo"
  <td class=\"center hidden-phone\"><a  href=\"intermediaire4.php?num=".$reponse1['numero_reservation']."\"><img src=\"img\pdficon.PNG\" style=\"width:40px;height:40px\"></a></td>";
  else
  echo " <td class=\"center hidden-phone\">---</td>";
 echo"<td class=\"center hidden-phone\"><a class=\"btn btn-success btn-xs\" href=\"etatDesLieux.php?num=".$reponse1['numero_reservation']."\"><i class=\" fa fa-check\"></i></a>
    </td>
  </tr>";
  }
}


?>