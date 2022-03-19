<?php
    session_start();
   

    try
    {
        $bd = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
        'root', '');
    }
   catch (Exception $e)
   {
       die('Erreur : ' . $e->getMessage());
    }
    //Modifier la nuovelle valeur dans le table véhicule selon le critère choisi
    if($_POST['modif']=='marque') // si le critère choisi est marque il va remplacer l'ancienne valeur de marque par la nouvelle valeur
    {
        $reponse=$bd->prepare('UPDATE vehicule SET marque=? WHERE serie=? AND enregistrement=? AND modele=?');
        $reponse->execute(array($_POST['mod'],$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
    }
    elseif($_POST['modif']=='couleur') // si le critère choisi est couleur il va remplacer l'ancienne valeur de couleur par la nouvelle valeur
    {
        $reponse=$bd->prepare('UPDATE vehicule SET couleur=? WHERE serie=? AND enregistrement=? AND modele=?');
        $reponse->execute(array($_POST['mod'],$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
    }
    elseif($_POST['modif']=='categorie') // si le critère choisi est categorie il va remplacer l'ancienne valeur de categorie par la nouvelle valeur si elle est parmi les categories existantes
    {
        $categories=array('citadine','economique','compacte','break compacte','intermédiaire','break intermediaire','standard','break standard'
        ,'familiale','break grand modèle','luxe','decapotable','SUV','monospace');
        if(in_array($_POST['mod'],$categories) )
        {
            $reponse=$bd->prepare('UPDATE vehicule SET categorie=? WHERE serie=? AND enregistrement=? AND modele=?');
            $reponse->execute(array($_POST['mod'],$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
        }
        else
        {
            
            echo "
                         <script type=\"text/javascript\">
                         alert(\"Cette categorie est non disponible\");
                         </script>                       
                         ";
        }
    }
    elseif($_POST['modif']=='carburant') // si le critère choisi est carburant il va remplacer l'ancienne valeur du carburant par la nouvelle valeur
    {
        $carburants=array("diesel","essence","gazole","GPL","GNV");
        if(in_array($_POST['mod'],$carburants))
        {
            $reponse=$bd->prepare('UPDATE vehicule SET carburant=? WHERE serie=? AND enregistrement=? AND modele=?');
            $reponse->execute(array($_POST['mod'],$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
        }
        else
        {
         echo "
         <script type=\"text/javascript\">
         alert(\"Ce type de carburant est non disponible\");
         </script>                       
         ";
        }
    }
    elseif($_POST['modif']=='visite') // si le critère choisi est visite il va vérifier s'in s'agit bien d'une date et le remplacer  par la nouvelle valeur
    {
        
            $visite=date("Y-m-d", strtotime($_POST['mod']));
            if($visite=="1970-01-01")
            {
                
                echo "
                <script type=\"text/javascript\">
                alert(\"la valeur n'est pas transformable en une date\");
                </script>                       
                ";
            }
            else
            {
            $reponse=$bd->prepare('UPDATE vehicule SET visite=? WHERE serie=? AND enregistrement=? AND modele=?');
            $reponse->execute(array($visite,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
        }
      
    }
    elseif($_POST['modif']=="autorisation") // si le critère choisi est autorisation il va vérifier s'in s'agit bien d'une date et le remplacer  par la nouvelle valeur
    {
       
 
        $autorisation=date("Y-m-d", strtotime($_POST['mod']));
        if($autorisation=="1970-01-01")
        {
         echo "
         <script type=\"text/javascript\">
         alert(\"la valeur n'est pas transformable en une date\");
         </script>                       
         ";
        }
        else
        {
         $reponse=$bd->prepare('UPDATE vehicule SET autorisation=? WHERE serie=? AND enregistrement=? AND modele=?');
         $reponse->execute(array($autorisation,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
    }
    }
    elseif($_POST['modif']=="assurance") // si le critère choisi est assurance il va vérifier s'in s'agit bien d'une date et le remplacer  par la nouvelle valeur
    {
        
        $assurance=date("Y-m-d", strtotime($_POST['mod']));
        if($assurance=="1970-01-01")
        {
         echo "
         <script type=\"text/javascript\">
         alert(\"la valeur n'est pas transformable en une date\");
         </script>                       
         ";
        }
        else
        {
         $reponse=$bd->prepare('UPDATE vehicule SET assurance=? WHERE serie=? AND enregistrement=? AND modele=?');
         $reponse->execute(array($assurance,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
    }
    }
    elseif($_POST['modif']=="kilometrage") // si le critère choisi est kilometrage  et la valeur est valide il va remplacer l'ancienne valeur du kilometrage par la nouvelle valeur
    {
        $v=intval($_POST['mod']);
        if($v==0)
        {
            
             echo "
             <script type=\"text/javascript\">
             alert(\"vérifier le kilometrage saisie\");
             </script>                       
             ";
        }
        else
        {
            if ($v>0) {
                $reponse=$bd->prepare('UPDATE vehicule SET kilometrage=? WHERE serie=? AND enregistrement=? AND modele=?');
                $reponse->execute(array($v,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
            }
            else
            {
               
                echo "
                <script type=\"text/javascript\">
                alert(\"le kilometrage est une valeur strictement positif\");
                </script>                       
                ";
            }
        }
    }
    elseif($_POST['modif']=="vidange") // si le critère choisi est vidange il va verifier que la nouvelle valeur est valide et la  remplacer  par la nouvelle valeur
    {
        $vidanges=array("oui","non");
        if(in_array($_POST['mod'],$vidanges))
        {
            $reponse=$bd->prepare('UPDATE vehicule SET vidange=? WHERE serie=? AND enregistrement=? AND modele=?');
            $reponse->execute(array($_POST['mod'],$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
        }
        else
        {
         echo "
         <script type=\"text/javascript\">
         alert(\"la valeur de vidange est invalide , le vidange doit etre oui ou non\");
         </script>                       
         ";
        }
    }
 
    elseif($_POST['modif']=="prix_location") // si le critère choisi est prix_location  et la valeur est valide il va remplacer l'ancienne valeur du prix_location par la nouvelle valeur
    {
     $v=intval($_POST['mod']);
     if($v==0)
     {
        
          echo "
          <script type=\"text/javascript\">
          alert(\"vérifier le prix de location saisie\");
          </script>                       
          ";
     }
     else
     {
         if ($v>0) {
             $reponse=$bd->prepare('UPDATE vehicule SET prix_location=? WHERE serie=? AND enregistrement=? AND modele=?');
             $reponse->execute(array($v,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
         }
         else
         {
             
             echo "
             <script type=\"text/javascript\">
             alert(\"le prix de location est une valeur strictement positif\");
             </script>                       
             ";
         }
     }
    }
    elseif($_POST['modif']=="prix_vente") // si le critère choisi est prix_vente  et la valeur est valide il va remplacer l'ancienne valeur du prix_vente par la nouvelle valeur
    {
     $v=intval($_POST['mod']);
     if($v==0)
     {
         
            
          echo "
          <script type=\"text/javascript\">
          alert(\"vérifier le prix de vente saisie\");
          </script>                       
          ";
     }
     else
     {
         if ($v>0) {
             $reponse=$bd->prepare('UPDATE vehicule SET prix=? WHERE serie=? AND enregistrement=? AND modele=?');
             $reponse->execute(array($v,$_POST['serie'],$_POST['enregistrement'],$_POST['model']));
         }
         else
         {
            
             echo "
             <script type=\"text/javascript\">
             alert(\"le prix de vente est une valeur strictement positif\");
             </script>                       
             ";
         }
     }
    }
  
   echo "
                        <script type=\"text/javascript\">
                        
                        window.location.replace(\"modifier.php\");
                        </script> ";



?>
