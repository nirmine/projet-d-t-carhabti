  <?php 
     function afficheVidange($utilisateur)
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
       //si la voiture à dépassé K2(le seuil de kilométrage) ce code fait la mise à jour de l'état du vidange  par la valeur non pour demander un éventuel vidange
         $rep3=$db->prepare("SELECT k2,numero_vehicule FROM vehicule WHERE vidange=?");
         $rep3->execute(array("oui"));
         while ($e2=$rep3->fetch()) {
             $rep4=$db->prepare("SELECT numero_vehicule FROM vehicule WHERE kilometrage>=? AND numero_vehicule=?");
             $rep4->execute(array($e2['k2'],$e2['numero_vehicule']));
             while ($e4=$rep4->fetch()) {
                 $rep5=$db->prepare('UPDATE vehicule SET vidange=? WHERE numero_vehicule=?');
                 $rep5->execute(array("non",$e4['numero_vehicule']));
             }
         }
    
         $rep2= $db->prepare('SELECT k2,numero_vehicule FROM vehicule WHERE  vidange=?');
         $rep2->execute(array("non"));
         while ($e1=$rep2->fetch()) {
             $rep1= $db->prepare('SELECT * FROM vehicule WHERE kilometrage >=? AND numero_vehicule=?');
             $rep1->execute(array($e1['k2'],$e1['numero_vehicule']));
             while ($e = $rep1->fetch()) {
               if ($utilisateur=="fonctionnaire") {
                   echo "
              <div class=\"col-sm-4\" style=\"width:300px;height:230;\" >
              <div class=\"thumbnail\">
                <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                <div class=\"caption\">
                  <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                  <p> Cette voiture doit faire un vidange  .</p>
                  <p><a href=\"vidange.php?num=".$e['numero_vehicule']." \"class=\"btn btn-primary lb-link smoothie\"   role=\"button\"> >Mettre à jour </a></p>
                </div>
              </div>
            </div>
              ";
               }
               else 
               {
                if ($utilisateur=="administrateur") {
                    echo "
                <div class=\"col-sm-4\" style=\" width:300px;height:230;\" >
                <div class=\"thumbnail\">
                  <img src=\"photoVoiture/".$e['img_voiture']. " \" alt=\"\" style=\" width:290px;height:150px;\">
                  <div class=\"caption\">
                    <h3>". $e['serie'] .' TU '. $e['enregistrement'] ."</h3>
                    <p> Cette voiture doit faire un vidange  .</p>
                    <p><a href=\"vidange_ad.php?num=".$e['numero_vehicule']." \"class=\"btn btn-primary lb-link smoothie\"   role=\"button\"> >Mettre à jour </a></p>
                  </div>
                </div>
              </div>
                ";
                }
               }
             }
         }
         $rep2->closeCursor();
     }  
     
?>