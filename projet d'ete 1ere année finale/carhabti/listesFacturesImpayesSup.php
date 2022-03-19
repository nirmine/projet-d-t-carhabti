<?php
function afficherFactures()//afficher tous les factures memes celles d'une réservations déjà terminées
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
$requete= $db->query('SELECT * FROM reservation  WHERE Facture IS NOT NULL ');
$i=0;
while($reponse=$requete->fetch())
{ $i++;
    $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
    $requete2->execute(array($reponse['numero_vehicule']));
    $vehicule=$requete2->fetch();
    $requete3= $db->prepare('SELECT nom,prenom FROM client  WHERE numero_client= ? ');
    $requete3->execute(array($reponse['numero_client']));
    $client=$requete3->fetch();
echo
"<tr>
    <td>".$reponse['numero_reservation']."</td>
    <td>".$reponse['date_prise_en_charge']."</td>
    <td>".$reponse['date_restitution']."</td>
    <td>n°=".$reponse['numero_client'].": ".$client['nom'].' '.$client['prenom']."</td>
    <td>".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
    <td>".$reponse['etat_de_reservation']."</td>
    <td>".$reponse['montant_paye']."</td>
    <td><a target=\"_blank\" href=\"intermediaire4.php?num=".$reponse['numero_reservation']."\"><img src=\"img\pdficon.PNG\" style=\"width:40px;height:40px\"></a></td>
</tr>";

}
$requete= $db->query('SELECT * FROM operation WHERE  facture_finale IS NOT NULL');
while($reponse=$requete->fetch())
{ $i++;
    $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=?  ');
    $requete2->execute(array($reponse['numero_vehicule']));
    $vehicule=$requete2->fetch();
    $requete3= $db->prepare('SELECT nom,prenom FROM client  WHERE numero_client= ? ');
    $requete3->execute(array($reponse['numero_client']));
    $client=$requete3->fetch();
echo
"<tr>
    <td>".$reponse['numero_operation']."</td>
    <td>".$reponse['date_prise_en_charge']."</td>
    <td>".$reponse['date_restitution_reelle']."</td>
    <td>n°=".$reponse['numero_client'].": ".$client['nom'].' '.$client['prenom']."</td>
    <td>".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
    <td>Terminée</td>
    <td>".$reponse['prix_paye']."</td>
    <td><a  target=\"_blank\" href=\"intermediaire4.php?numR=".$reponse['numero_operation']."\"><img src=\"img\pdficon.PNG\" style=\"width:40px;height:40px\"></a></td>
</tr>";
if($i==0)
echo "Pas de réservations.";
}
}
//afficher la liste des réservations qui sont impayées càd que lavoiture est prise mais le total de location n'est pas totalement payé ou bien qu'il y a un retard de la remise de la voiture  non prévu 
function afficherImpaye($utilisateur)
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
    $dateToday = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($dateToday)));
    $requete= $db->prepare('SELECT * FROM reservation  WHERE Facture IS  NULL and etat_de_reservation=\'en cours\' UNION SELECT * FROM reservation  WHERE etat_de_reservation=\'en cours\' and date_restitution<?');
    $requete->execute(array($dateToday));
    while($reponse=$requete->fetch())
    {
        $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
        $requete2->execute(array($reponse['numero_vehicule']));
        $vehicule=$requete2->fetch();
        $requete3= $db->prepare('SELECT nom,prenom FROM client  WHERE numero_client= ? ');
        $requete3->execute(array($reponse['numero_client']));
        $client=$requete3->fetch();
echo"
    <tr><td> ";
        if($reponse['date_restitution']<$dateToday)
echo"<span class=\"badge bg-important\">Retard</span> ";//pour avertir d'une retard de la remise de la voiture

    echo" ".$reponse['numero_reservation']."</td>
    <td>".$reponse['date_prise_en_charge']."</td>
    <td>".$reponse['date_restitution']."</td>
    <td>n°=".$reponse['numero_client'].": ".$client['nom'].' '.$client['prenom']."</td>
    <td>".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes</td>
    <td>".$reponse['montant_paye']."</td>";
    if($utilisateur=='admin')
    echo"<td><a href=\"facture_ad.php?numRes=".$reponse['numero_reservation']."\"><img src=\"img/factureIcon.JPG\" style=\"width:40px;height:40px\"></a>"."</td>";
    else    
    echo"<td><a href=\"facture.php?numRes=".$reponse['numero_reservation']."\"><img src=\"img/factureIcon.JPG\" style=\"width:40px;height:40px\"></a>"."</td>";      
    echo "</tr>";
           

}
}
?>