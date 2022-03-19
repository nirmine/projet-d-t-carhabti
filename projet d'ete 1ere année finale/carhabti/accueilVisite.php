<?php
            function afficheVisite($utilisateur)
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
               $date1=date('Y-m-d H:i:s');            
               $date1 = date("Y-m-d H:i", strtotime("-60 minutes", strtotime($date1)));//date exacte en ce moment
               $date1=date("Y-m-d",strtotime($date1));
                $reponse = $db->prepare('SELECT * FROM vehicule WHERE visite=? ');
                $reponse->execute(array($date1));
        
         
                while ($e = $reponse->fetch()) {
                  if ($utilisateur=="fonctionnaire") {
                      echo "
                   <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                   <div class=\"thumbnail\">
                     <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                     <div class=\"caption\">
                       <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                       <p> Cette voiture a une visite technique  .</p>
                       <p><a href=\"visite1.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                     </div>
                   </div>
                 </div>
                   ";
                  }
                  else
                  {
                    if($utilisateur=="administrateur")
                    {
                      echo "
                      <div class=\"col-sm-4\" style=\" width:300px;height:230;\">
                      <div class=\"thumbnail\">
                        <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                        <div class=\"caption\">
                          <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                          <p> Cette voiture a une visite technique  .</p>
                          <p><a href=\"visite1_ad.php?num=".$e['numero_vehicule']." \"  class=\"btn btn-primary\" role=\"button\">Mettre à jour </a></p>
                        </div>
                      </div>
                    </div>
                      ";
                    }
                  }
                }
                $reponse->closeCursor();
            }
?>