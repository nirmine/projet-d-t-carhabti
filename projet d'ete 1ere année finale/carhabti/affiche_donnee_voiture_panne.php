<?php
    function affichecaracteristique($utilisateur)
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
        $i=0;
        $reponse=$db->prepare('SELECT * FROM vehicule   WHERE vehicule.serie=? AND vehicule.enregistrement=? AND modele=? ');
          $reponse->execute(array($_POST['sr'],$_POST['enreg'],$_POST['mod']));
          while($e=$reponse->fetch())
          {
          $reponse1=$db->prepare('SELECT piece,etat,num_voiture FROM reparation WHERE reparation.num_voiture=?');
          $reponse1->execute(array($e['numero_vehicule']));
          
                   $i++;
  
    echo'<tr>
    <td>'. $e['serie'] . ' TU ' . $e['enregistrement'].'</td>
      <td>'. $e['modele'] . '</td>
      <td>'.$e['couleur'] .'</td>
      <td>'.$e['visite'] .'</td></tr>';
     
echo"     
  </tbody>
</table>

<table class=\"table table-hover\" >
<h4 class=\"mb\"><i class=\"fa fa-angle-right\"></i> Les Pièces reparés</h4>
<hr>
<thead>
    <tr>
      
      <th>Pièce </th>
     
      <th>état</th>
      <th>Réparation terminée</th>
     
      
    </tr>
  </thead>
  <tbody>";
while ($entree1=$reponse1->fetch()) { 
    if ($utilisateur=="administrateur") {
        echo " <tr>
      <td>".$entree1['piece']."</td>
      
      <td>".$entree1['etat']."</td>

    <td ><a class=\"btn btn-success btn-xs\" href=\"reparer_ad.php?num_voit=".$entree1['num_voiture']."&amp;piece=".$entree1["piece"]."\"><i class=\" fa fa-check\"></i></a></td>
  </tr>
";
    }
    else if($utilisateur=="fonctionnaire")
    {
        echo " <tr>
        <td>".$entree1['piece']."</td>
        
        <td>".$entree1['etat']."</td>
  
      <td ><a class=\"btn btn-success btn-xs\" href=\"reparer.php?num_voit=".$entree1['num_voiture']."&amp;piece=".$entree1["piece"]."\"><i class=\" fa fa-check\"></i></a></td>
    </tr>
  ";
    }

}
echo"                </tbody>
</table>";
}

if($i==0)
{
  echo " </tbody>
  </table> <h3 style=\"text-align:center\">Ce numéro de série et d'entregistrement sont introuvables</h3> ";
}
    }

?>