<?php
        session_start();
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
            'root', '');
         }
         catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
         }
         if(((isset($_POST['cin']))) &&  ((isset($_POST['valeur']))))
         {
             if(($_POST["critere"]=="nom")) // si l'administrateur choisit de modifier le nom du fonctionnaire 
             {
                $reponse=$db->prepare('UPDATE fonctionnaire SET nom=? WHERE ncin=? '); 
                $reponse->execute(array($_POST['valeur'],$_POST['cin']));
             }
             if(($_POST["critere"]=="prenom")) //si l'administrateur choisit de modifier le prenom du fonctionnaire
             {
                $reponse=$db->prepare('UPDATE fonctionnaire SET prenom=? WHERE ncin=? ');
                $reponse->execute(array($_POST['valeur'],$_POST['cin']));    
             }
             if(($_POST["critere"]=="adresse")) //si l'administrateur choisit de modifier l'adresse du fonctionnaire 
             {
                $reponse=$db->prepare('UPDATE fonctionnaire SET adresse=? WHERE ncin=? ');
                $reponse->execute(array($_POST['valeur'],$_POST['cin']));
             }
             if(($_POST["critere"]=="tele") ) //si l'administrateur choisit de modifier le numéro de télèphone du fonctionnaire 
             {
               $v=intval($_POST['valeur']);
                if($v==0) //s'il n'est pas un entier
                {
                  echo "
                  <script type=\"text/javascript\">
                  alert(\"vérifier le numéro de télèphone\");
                  </script>                       
                  ";
                }
                else
                {
                   if(($v<10000000) ||($v>99999999))
                   {
                     echo "
                     <script type=\"text/javascript\">
                     alert(\" le numéro de télèphone doit contenir 8 chiffres\");
                     </script>                       
                     ";
                   }
                   else
                   {
                       $reponse=$db->prepare('UPDATE fonctionnaire SET tel=? WHERE ncin=? ');
                       $reponse->execute(array($_POST['valeur'],$_POST['cin']));
                   }
                }
             }
            
             echo "
             <script type=\"text/javascript\">
             
             window.location.replace(\"modif_fonct.php\");
             </script> ";
         }

?>