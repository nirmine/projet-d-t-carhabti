<?php
          if(isset($_GET['numClt']))
          {
          supprimerClient($_GET['numClt']);
          
          }
          // NB: à fixer 7kéyit les boutons

            try
              {
              $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
              'root', '');
              }
              catch (Exception $e)
              {
              die('Erreur : ' . $e->getMessage());
              }
   
                $reponse = $db->query('SELECT * FROM client');
                $i=0 ;
                while ($entree = $reponse->fetch())
                {
                $i++ ;
              
                echo "<tr><td>".$entree['numero_client'] ."</td><td>".$entree['prenom'].' '.$entree['nom'].'</td> <td>'.$entree['tel'].'</td><td>'.$entree['mail']."</td>
                <td><a href=\"ficheClient_ad.php?c=".$entree['numero_client']."\"class=\"btn btn-theme02\">Fiche client</a> <a href=\"historiqueReservations_ad.php?c=".$entree['numero_client']."\"class=\"btn btn-theme03\"> Historique réservations</a></td><td> <a class=\"btn btn-danger btn-xs\"style=\"height:30px;width:25px\" href=\"listeClient_ad.php?numClt=".$entree['numero_client']."\"><i class=\"fa fa-trash-o\"></i></a>
                <nbspr><a class=\"btn btn-primary btn-xs\" href=\"modifierClient_ad.php?numCli=".$entree['numero_client']."\"style=\"height:30px;width:25px\"><i class=\"fa fa-pencil\"></i></a></td></tr>";
              }
             $reponse->closeCursor();

?>
<?php 

function supprimerClient($numeroClient)
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
  $requete=$db->prepare('DELETE FROM client WHERE numero_client=?');
  $requete->execute(array($numeroClient));
  $requete=$db->prepare('DELETE FROM reservation WHERE numero_client=?');
  $requete->execute(array($numeroClient));
  $requete=$db->prepare('DELETE FROM operation WHERE numero_client=?');
  $requete->execute(array($numeroClient));

}


?>