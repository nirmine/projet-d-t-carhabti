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
   
                $reponse = $db->query('SELECT * FROM client');
                $i=0 ;
                while ($entree = $reponse->fetch())
                {
                $i++ ;
              
                echo "<tr><td>".$entree['numero_client'] ."</td><td>".$entree['prenom'].' '.$entree['nom'].'</td> <td>'.$entree['tel'].'</td><td>'.$entree['mail']."</td>
                <td><a href=\"ficheClient.php?c=".$entree['numero_client']."\"class=\"btn btn-theme02\">Fiche client</a> <a href=\"historiqueReservations.php?c=".$entree['numero_client']."\"class=\"btn btn-theme03\"> Historique réservations</a></td><td> <a class=\"btn btn-primary btn-xs\" href=\"modifierClient.php?numCli=".$entree['numero_client']."\"style=\"height:30px;width:25px\"><i class=\"fa fa-pencil\"></i></a></td</tr>";
              }
             $reponse->closeCursor();

?>
