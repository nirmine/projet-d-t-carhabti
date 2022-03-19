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
         $rep=$db->prepare('SELECT * FROM reparation WHERE num_voiture=? AND etat=? OR etat=?');
         $rep->execute(array($_GET['num'],"en_cours_de_reparation","non_encore_traite"));
         while($e=$rep->fetch())
         {
             echo "   <td>".$e["piece"]." </td>
             <td>".$e['type']."</td>
             <td>".$e['etat']."</td>
             <td><a href=\"reparer.php?num_voit=".$e['num_voiture']."&amp; piece=".$e["piece"]." \" class=\"btn btn-theme\"><i class=\"fa fa-cog\"></i> Reparer</a></td>";
         }

?>