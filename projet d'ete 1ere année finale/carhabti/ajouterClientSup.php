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
$requete1=$db->prepare('SELECT numero_client FROM client WHERE cin=:c');
$requete1->execute(array('c'=>$_POST['cin']));
$requete2=$db->prepare('SELECT numero_client FROM client WHERE numero_permis=:nump');
$requete2->execute(array('nump'=>$_POST['numPermis']));
$reponse2=$requete2->fetch();
$reponse1 = $requete1->fetch();
if(empty($reponse1) && empty($reponse2))
{
// un nouveau client 
$requete = $db->prepare('INSERT INTO client (cin,numero_permis,nom, prenom,sexe,date_naissance, adresse,tel,mail)
VALUES(:cin,:num,:nom, :prenom,:sexe,:naissance, :adresse,:tel,:mail)');
$requete->execute(array('cin' => $_POST['cin'],'num'=>$_POST['numPermis'],'nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'sexe' => $_POST['sexe'],'naissance' => $_POST['naissance'],
'adresse' => $_POST['adresse'],'tel' => $_POST['tel'] ,'mail' => $_POST['mail']));
 echo " <p>Client ajouté(e) avec succés ! </p>";
 if(isset($_SESSION['montantPaye'])&&isset($_SESSION['numv'])&&isset($_SESSION['deb'])&&isset($_SESSION['fin']))
 { 
  $requeteAjoutReservation=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
  $requeteAjoutReservation->execute(array($_POST['cin']));
  $reponse = $requeteAjoutReservation->fetch();
   include('intermediaire2.php');
   //il y a un 2éme conducteur

   if(($_SESSION['cinConducteur2']!=0)&&( $_SESSION['permisConducteur2']!=0)&&($_SESSION['nomConducteur2']!='')&&($_SESSION['telConducteur2']!=0)&&($_SESSION['naissanceConducteur2']!='0000-00-00'))

   { 
    ajouterReservation1($reponse['numero_client'],$_SESSION['numv'],$_SESSION['deb'],$_SESSION['fin'],$_SESSION['chauffeur'],$_SESSION['montantPaye'],$_SESSION['cinConducteur2'],$_SESSION['permisConducteur2'],$_SESSION['nomConducteur2'],$_SESSION['naissanceConducteur2'],$_SESSION['telConducteur2']);
   echo "Réservation ajoutée avec Succés ! avec";
  }
  else
  {//pas de 2éme conducteur
    ajouterReservation2($reponse['numero_client'],$_SESSION['numv'],$_SESSION['deb'],$_SESSION['fin'],$_SESSION['chauffeur'],$_SESSION['montantPaye']);
   echo "Réservation ajoutée avec Succés !sans";
  }
 }
}
else //les coordonnées saisies sont déjà utilisées 
{  if(((!empty($reponse1)) && empty($reponse2))||(empty($reponse1) && (!empty($reponse2))))
     echo "vérifiez les coordonnées il existe déjà un client avec l'un de ces données";
   else
    echo " <p>Client(e) déjà enregistré ! </p>";
    
}


?>