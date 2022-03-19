
<?php

?>



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
//Historique des réservations d'un client
$numeroClient= $_GET['c'];   // cin doit etre le cin du client saisie par l'agent
$requete = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
$requete->execute(array($numeroClient));
$i=-1;
$entree = $requete->fetch();
$num=$entree['numero_client'];
$nom=$entree['nom'];
$prenom=$entree['prenom'];
$tel=$entree['tel'];
$cin=$entree['cin'];

  
$ch=' ';
$i=0;
//sélectionner les réservations terminées(operations) de ce client
 $requete1 = $db->prepare('SELECT * FROM operation  WHERE numero_client=? ');
 $requete1->execute(array($num));
 while ($entree = $requete1->fetch())
{
$i++ ;
 $reponse = $db->prepare('SELECT modele,categorie,marque,carburant,nb_portes FROM vehicule  WHERE numero_vehicule= :n ');
 $reponse->execute(array('n'=>$entree['numero_vehicule']));
 
 while ($vehicule = $reponse->fetch())
{
$v= $vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes'].' portes';
$ch=$ch.'<tr><td></td><td>'.$entree['date_prise_en_charge'].'</td><td>'.$entree['date_restitution_reelle'].'</td><td>'.$v.'</td><td>'.$entree['etat_vehicule'].'</td><td>'.$entree['prix_paye'].'</td> <td><span class="label label-success label-mini">Terminée</span></td></tr>';

}

}
$requete = $db->prepare('SELECT * FROM reservation  WHERE numero_client= :num ');
 $requete->execute(array('num'=>$num));
 while ($entree = $requete->fetch())
{
$i++ ;
 $reponse = $db->prepare('SELECT modele,categorie,marque,carburant,nb_portes FROM vehicule  WHERE numero_vehicule= :n ');
 $reponse->execute(array('n'=>$entree['numero_vehicule']));
 
 while ($vehicule = $reponse->fetch())
{

$v= $vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes'].' portes';
$ch=$ch.'<tr><td></td><td>'.$entree['date_prise_en_charge'].'</td><td> '.$entree['date_restitution'].'</td><td>'.$v.'</td><td> --- </td><td>caution+avance de '.($entree['montant_paye']-$_SESSION['caution']).'</td>';
if ($entree['etat_de_reservation']=='validée')            
{$ch=$ch.'<td><span class="label label-info label-mini">Validée</span></td></tr>';}
else
if ($entree['etat_de_reservation']=='en cours')   
{$ch=$ch.'  <td><span class="label label-warning label-mini">en cours</span></td></tr>';}
}

}


if($i!=-1)
{
    if($i!=0)
    {
      echo" 
      <section class=\"wrapper\" id=\"themes\"style=\"margin-top:10px;\">
          <div class=\"container\">
         
          <div class=\"row\">
          <div class=\"col-sm-4\" >
          <div class=\"thumbnail\">
          
            <div class=\"caption\">
              <h3 style=\" color: #59A5D8; \">".$nom.' '.$prenom."</h3>
              <p> <strong> Client numéro: </strong>".$num."</p>
              <p>  <strong>Cin: </strong>".$cin."</p>
              <p><strong>Numéro de télèphone:</strong>".$tel."</p>
            </div>
          </div>
        </div>
          </div>
          </div>
          </section>
      ";
  echo"
  <thead>
    <tr>
    <th></th>
      <th class=\"hidden-phone\"style=\"text-align:center\"><i class=\"fa fa-bookmark\"></i> Date de Prise En Charge </th>
      <th style=\"text-align:center\"><i class=\"fa fa-bookmark\"></i> Date de remise de la voiture</th>
      <th style=\"text-align:center\"><i class=\"fa fa-question-circle\"></i> Voiture Réservée</th>
      <th style=\"text-align:center\"><i class=\"fa fa-question-circle\"></i> état de la voiture à la remise</th>
      <th style=\"text-align:center\"><i class=\" fa fa-edit\"></i> Montant Payé</th>
    
      <th style=\"text-align:center\">Status</th>
    </tr>
  </thead>
  <tbody>";  
      echo $ch;
    }
    else 
    {
      echo" 
      <section class=\"wrapper\" id=\"themes\"style=\"margin-top:10px;\">
          <div class=\"container\">
         
          <div class=\"row\">
          <div class=\"col-sm-4\" >
          <div class=\"thumbnail\">
          
            <div class=\"caption\">
              <h3 style=\" color: #59A5D8; \">".$nom.' '.$prenom."</h3>
              <p> <strong> Client numéro: </strong>".$num."</p>
              <p>  <strong>Cin: </strong>".$cin."</p>
              <p><strong>Numéro de télèphone:</strong>".$tel."</p>
            </div>
          </div>
        </div>
          </div>
          </div>
          </section>
      ";
        echo "<h3 style=\"text-align:center\">Pas de reservations pour ce client !</h3>";
        
    }
}

?>