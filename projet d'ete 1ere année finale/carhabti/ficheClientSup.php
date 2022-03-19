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
$numeroClient=$_GET['c'];//passé par url
$requete = $db->prepare('SELECT * FROM client  WHERE numero_client=? ');
$requete->execute(array($numeroClient));
while ($reponse = $requete->fetch())
{
echo " <div class=\"row\">
<div class=\"col-lg-12\">

  <div class=\"col-lg-4 col-md-4 col-sm-4 col-xs-12\" style=\" width:1100px; \">
    <div class=\"custom-box\">
      <div class=\"servicetitle\">
        <h3><strong>".$reponse['nom'].' '.$reponse['prenom']."</strong></h3>
        <hr>
      </div>
      <div class=\"icn-main-container\">";
      if($reponse['sexe']=='homme'||$reponse['sexe']=='Homme')
      {
      echo"<img src=\"img/homme.PNG \" class=\"icn-container\" >";
      }
     else 
        {
            if($reponse['sexe']=='femme'||$reponse['sexe']=='Femme')
            echo"<img src=\"img/femme.png \" class=\"icn-container\"  >";
        }
        echo"
      </div>

      <ul class=\"pricing\">
      <li><br></li>
      <li><strong >Client N°:</strong>".$reponse["numero_client"]."</li>
        <li><strong >NCIN:</strong> ".$reponse["cin"]."</li>
        <li><strong >Numéro de permis:</strong>".$reponse["numero_permis"]."</li>
        <li><strong >Date De naissance:</strong>".$reponse["date_naissance"]."</li>
        <li><strong>Numéro de télèphone:</strong>".$reponse["tel"]."</li>
        <li><strong >Adresse:</strong>".$reponse['adresse']."</li>
        <li><strong >Mail:</strong>".$reponse['mail']."</li>";

        $requete1= $db->prepare('SELECT * FROM liste_noire  WHERE numero_client=? ');
        $requete1->execute(array($numeroClient));
        $reponse1 = $requete1->fetch();
        if(!empty($reponse1))
        {
       echo "<li>
       <ul>
       <li>
       <span class=\"badge bg-important\">NB</span> Ce client est dans la liste noire</li>
       <li><span class=\"badge bg-info\">cause</span> ".$reponse1['cause']."</li></ul></li>";
        }
       echo"
      </ul>
      <a class=\"btn btn-theme\" target=\"_blank\" href=\"ficheClientPdf.php?num_c=".$reponse['numero_client']." \">Edition</a>
    </div>
   
  </div> </div> </div>";
}
?>