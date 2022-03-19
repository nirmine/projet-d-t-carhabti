<?php
//afficher des factures
try
{
$db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
if(isset($_GET['num']))
{
$numeroReservation=$_GET['num'];
$requete1 = $db->prepare('SELECT Facture from reservation where numero_reservation=?');  
$requete1->execute(array($numeroReservation));
$resultat=$requete1->fetch();
header('Content-type: application/pdf');
echo($resultat['Facture']);
}
if(isset($_GET['numR']))
{

    $numeroReservation=$_GET['numR'];
    $requete1 = $db->prepare('SELECT facture_finale FROM operation WHERE numero_operation=? ');  
    $requete1->execute(array($numeroReservation));
    $resultat=$requete1->fetch();
    header('Content-type: application/pdf');
    echo($resultat['facture_finale']);  
}
?>