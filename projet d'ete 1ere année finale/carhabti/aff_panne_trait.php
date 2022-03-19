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
        
                  $rep=$db->prepare('SELECT num_voiture,piece FROM reparation WHERE etat=? OR etat=?') ;
                  $rep->execute(array("en_cours_de_reparation","non_encore_traite"));
                  while($entree=$rep->fetch())
                  {
                      
                      $rep1=$db->prepare('SELECT * FROM vehicule WHERE numero_vehicule=?');
                      $rep1->execute(array($entree['num_voiture']));
                      while($e=$rep1->fetch())
                      {
                          
                  
                     echo "
                     <div class=\"col-sm-4\">
                     <div class=\"thumbnail\">
                       <img src=\"photoVoiture\\".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:200px;\">
                       <div class=\"caption\">
                         <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                         <p> Cette voiture est en panne .</p>
                         <p> Pièce: ".$entree['piece']."</p>
                         <p><a href=\"reparer.php?num_voit=".$e['numero_vehicule']."&amp;piece=".$entree['piece'] ." \" class=\"smoothie btn btn-primary\"> Réparer </a></p>
                       </div>
                     </div>
                   </div>
                     ";
                
                      }
                  }
?>