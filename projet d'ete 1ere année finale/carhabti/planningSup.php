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
$i=0;
$requete1= $db->query('SELECT * FROM reservation ');
while( $reponse1=$requete1->fetch())
{
  $i++;
  $requete2 = $db->prepare('SELECT * FROM vehicule  WHERE numero_vehicule=? ');
   $requete2->execute(array($reponse1['numero_vehicule']));
    $vehicule=$requete2->fetch();
    if((isset($vehicule))&&($reponse1['etat_de_reservation']=='validée'))
    {
    $dateP=$reponse1['date_prise_en_charge'];                       
    $annee=date("Y", strtotime($dateP));                      
    $mois=date("m", strtotime($dateP));   
    $mois1=date("m", strtotime($dateP));                                             
    $jour=date("d", strtotime($dateP));                     
    $heure=date("H", strtotime($dateP));                      
    $minute=date("i", strtotime($dateP));
   
    echo" {
        title: ':Prise: ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes',
        start: new Date(".$annee.",".($mois-1).",".$jour.",".$heure.",".$minute."),
        allDay: false,
    },";
  }
    else
    {
      if($reponse1['etat_de_reservation']=='en cours')
      {
        $dateR=$reponse1['date_restitution'];                       
        $annee=date("Y", strtotime($dateR));
        $mois1=date("m", (strtotime($dateR)));                            
        $mois=date("m", strtotime($dateR));                                              
        $jour=date("d", strtotime($dateR));                     
        $heure=date("H", strtotime($dateR));                      
        $minute=date("i", strtotime($dateR));
    echo" {
      title: ':Remise: ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes',

        start: new Date(".$annee.",".($mois-1).",".$jour.",".$heure.",".$minute."),
        allDay: false,
    },";
  }

    }


}
//afficher les autorisations,assurances,visites techniques
$requete1= $db->prepare('SELECT  * FROM vehicule ');
$requete1->execute(array());
$vehicule=$requete1->fetch();
if(!empty($vehicule))
{$i++;
  while( $vehicule=$requete1->fetch())
  {
      $dateA=$vehicule['autorisation'];                       
      $annee=date("Y", strtotime($dateA));                      
      $mois=date("m", strtotime($dateA));                                              
      $jour=date("d", strtotime($dateA));                                              
      echo" {
          title: ':Autorisation: ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes',
          start: new Date(".$annee.",".($mois-1).",".$jour.",12,00),
          allDay: false,
      },";

      $dateA=$vehicule['visite'];                       
      $annee=date("Y", strtotime($dateA));                      
      $mois=date("m",strtotime($dateA));                                              
      $jour=date("d", strtotime($dateA));                                              
      echo" {
          title: ':Visite Technique: ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes',
          start: new Date(".$annee.",".($mois-1).",".$jour.",10,0),
          allDay: false,
      },";

      $dateA=$vehicule['assurance'];                       
      $annee=date("Y", strtotime($dateA));                      
      $mois=date("m",strtotime($dateA));                                              
      $jour=date("d", strtotime($dateA));                                              
      echo" {
          title: ':Assurance: ".$vehicule['marque'].' '.$vehicule['modele'].' '.$vehicule['categorie'].' '.$vehicule['carburant'].' à '.$vehicule['nb_portes']." portes',
          start: new Date(".$annee.",".($mois-1).",".$jour.",10,0),
          allDay: false,
      },";

    
      


  }




}


?>