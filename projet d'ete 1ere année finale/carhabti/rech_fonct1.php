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
         $rep=$db->prepare('SELECT * FROM fonctionnaire WHERE ncin=?');
         $rep->execute(array($_POST['cin']));
         while($e=$rep->fetch())
         {
           
           echo" <div class=\"servicetitle\">
            <h4>".$e['nom'].' '.$e['prenom']."</h4>
            <hr>
          </div>
          <div class=\"icn-main-container\">
            <img src=\"photoFonct/".$e['img_fonct']. " \" class=\"icn-container\" >
          </div>

          <ul class=\"pricing\">
            <li>NCIN: ".$e["ncin"]."</li>
            <li>Numéro:".$e["tel"]."</li>
            <li>Adresse:".$e['adresse']."</li>
            <li>".$e['presence']."</li>
            <li>Nombre de jours travaillés:</li>
            <li>".$e["nb_jour_travail"]."</li>
            
          </ul>";
          
         }

?>