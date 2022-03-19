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
   $rep=$db->prepare('SELECT * FROM reservation WHERE numero_reservation=?');
   $rep->execute(array($_SESSION['modif_num_res']));
   while ($e=$rep->fetch()) {
       $rep1=$db->prepare('SELECT serie, enregistrement FROM vehicule WHERE numero_vehicule=? ');
       $rep1->execute(array($e['numero_vehicule']));
       while($e1=$rep1->fetch())
       {
      
       echo"   <fieldset>
       <legend >
       <h6 class=\"mb\"><i class=\"fa fa-angle-right\"></i>Les données de la voiture </h6>
       </legend>
       <label for=\"serie\"> Série : </label>
       <input type=\"number\" name=\"serie\" class=\"form-control round-form\" value=\"" . $e1['serie'] . "\" maxlength=\"3\" min-length=\"2\"> <br>
       <label for=\"enregistrement\"> Enregistrement : </label>
       <input type=\"number\" name=\"enregistrement\" class=\"form-control round-form\" value=\"". $e1['enregistrement']. "\" max-length=\"4\" min-length=\"1\"> <br>
        </fieldset> ";

  
$rep2=$db->prepare('SELECT cin FROM client WHERE numero_client=?');
$rep2->execute(array($e['numero_client']));
$e2=$rep2->fetch();
echo" <fieldset>
   <legend >
   <h6 class=\"mb\"><i class=\"fa fa-angle-right\"></i>Les données du Client </h6>
   </legend>
   <label for=\"cin\"> Numéro de CIN : </label>
   <input type=\"number\" name=\"cin\" class=\"form-control round-form\" value=\"".$e2['cin']."\" maxlength=\"8\"> <br>

    </fieldset>

  <div class=\"form-group\">
  <fieldset>
  <legend >
  <h6 class=\"mb\"><i class=\"fa fa-angle-right\"></i>Les Dates </h6>
  </legend>
  <label for=\"prise\"> Date de prise en charge : </label>
  <input type=\"datetime\" name=\"prise\" class=\"form-control round-form\" value=\"". $e['date_prise_en_charge']."\"> <br>

  <label for=\"restitution\"> Nouvelle Date de restitution : </label>
  <input type=\"datetime\" name=\"restitution\" class=\"form-control round-form\" value=\"".$e['date_restitution']."\"> <br>

  

   </fieldset>
   </div>
   <fieldset>
   <div class=\"form-group\">
           <label class=\"control-label col-md-3\">chauffeur</label>
           <div class=\"col-md-3 col-xs-11\">                    
               <select name=\"chauffeur\" class=\"btn btn-default\">
                 <option>Oui</option>
                 <option>Non</option>
               </select>
                                                    
           </div>
         </div>
       
         </fieldset>
         <fieldset>
         <legend >
         <h6 class=\"mb\"><i class=\"fa fa-angle-right\"></i>2éme Conducteur </h6>
         </legend>
         <label for=\"cin2\"> Numéro de CIN de 2éme conducteur : </label>
         <input type=\"text\" name=\"cin2\" class=\"form-control round-form\" value=\"".$e['cin_conducteur2']."\" maxlength=\"8\" minlength=\"8\"> <br>

         <label for=\"nom2\"> Nom du 2éme conducteur : </label>
         <input type=\"text\" name=\"nom2\" class=\"form-control round-form\" value= \"".$e['nom_conducteur2']."\"> <br>
        
         <label for=\"permis\"> Permis du 2éme conducteur : </label>
         <input type=\"text\" name=\"permis\" class=\"form-control round-form\" value=\"".$e['permis_conducteur2']."\" maxlength=\"8\" minlength=\"8\"> <br>

         <label for=\"tele\"> Numéro de Télèphone du 2éme conducteur : </label>
         <input type=\"number\" name=\"tele\" class=\"form-control round-form\" value=\"".$e['tel_conducteur2']."\" maxlength=\"8\"> <br>
         <label for=\"naissance\"> Date de naissance du 2éme conducteur : </label>
         <input type=\"date\" name=\"naissance\" class=\"form-control round-form\" value=\"".$e['date_naissance_conducteur2']."\"> <br> 

      
          </fieldset>   
          <fieldset>
               <legend> 
               <h6 class=\"mb\"><i class=\"fa fa-angle-right\"></i> Paiement: </h6>
               </legend>
               <label for=\"paye\"> Le Montant Payé : </label>
               <input type=\"number\" name=\"paye\" class=\"form-control round-form\" value=\"". $e['montant_paye']."\"> <br>
               <div class=\"form-group\">
               <div class=\"col-lg-offset-2 col-lg-10\">
               <input  class=\"btn btn-theme\" type=\"submit\">
                   
                   </div>
             </div>
          </fieldset>
       
";
}}
?>