<?php


function ajouterClientNoire($numeroClient,$cause)
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
  $requete1=$db->prepare('SELECT * from liste_noire where numero_client=?');
  $requete1->execute(array($numeroClient));
  $reponse1=$requete1->fetch();
  if(empty($reponse1))
  {
$requete = $db->prepare('INSERT INTO liste_noire(numero_client,cause)
VALUES(?,?)');
$requete->execute(array($numeroClient,$cause));
  }
}
?>