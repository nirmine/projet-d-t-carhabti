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
$requete = $db->prepare('UPDATE client SET nom=?,prenom=?,sexe=?,date_naissance=?,adresse=?,tel=?,mail=? WHERE numero_client=? ');
$requete->execute(array($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['naissance'],$_POST['adresse'],$_POST['tel'],$_POST['mail'],$_GET['numCli']));
if($_GET['stat']=='fonct')
header("location:listeClient.php");
if($_GET['stat']=='admn')
header("location:listeClient_ad.php");
?>