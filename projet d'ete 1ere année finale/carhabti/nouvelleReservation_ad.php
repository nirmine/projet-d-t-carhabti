
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
              
              //vérifier si le client déjà enregistré sinon redirection vers la page d'un nouveau client 
              $cin1=$_POST['cin1'];
              $requete1= $db->prepare('SELECT * FROM client  WHERE cin=? ');
              $requete1->execute(array($cin1));
              $reponse1=$requete1->fetch();
              
              if (empty($reponse1)&&($_POST['cin1']!=0)) //nouveau Client
             {
                 $_SESSION['chauffeur']=$_POST['chauffeur'];
                 $_SESSION['montantPaye']=$_POST['montant_payé'];
              //  
                 $_SESSION['modePaiement']=$_POST['modePaiement'];
                 $_SESSION['numeroPaiement']=$_POST['numeroPaiement'];
                 $_SESSION['cinConducteur2']=$_POST['cin2'];
                 $_SESSION['permisConducteur2']=$_POST['permis2'];
                 $_SESSION['nomConducteur2']=$_POST['nom2'];
                 $_SESSION['telConducteur2']=$_POST['tel2'];
                 $_SESSION['naissanceConducteur2']=$_POST['naissance2'];
              echo"<script type=\"text/javascript\">
              <!--
              window.location.replace(\"ajouterClient_ad.php\");
              -->
              </script>";
             }
              else //client déjà enregistré
              {
     
              //vérifier si le client appartient au liste noire
              $requete2= $db->prepare('SELECT * FROM liste_noire  WHERE numero_client=? ');
              $requete2->execute(array($reponse1['numero_client']));
              $reponse2=$requete2->fetch();
              if (empty($reponse2)) //le client n'est pas dans la liste noire
              {
                  include('intermediaire2.php');
                  //il y a un 2éme conducteur
                  if(($_POST['cin2']!=0)&&( $_POST['permis2']!=0)&&($_POST['nom2']!='')&&($_POST['tel2']!=0)&&($_POST['naissance2']!='0000-00-00'))
             {
                  ajouterReservation1($reponse1['numero_client'],$_SESSION['numv'],$_SESSION['deb'],$_SESSION['fin'],$_POST['chauffeur'],$_POST['montant_payé'],$_POST['cin2'],$_POST['permis2'],$_POST['nom2'],$_POST['naissance2'],$_POST['tel2']);
             echo"avec";
             
             }
                  else
                //pas de 2éme conducteur
               { ajouterReservation2($reponse1['numero_client'],$_SESSION['numv'],$_SESSION['deb'],$_SESSION['fin'],$_POST['chauffeur'],$_POST['montant_payé']);
 
                 echo"sans";}
            /*  echo"<script type=\"text/javascript\">
              <!--
              window.location.replace(\"acceuil.php\");
              -->
              </script>";*/
              } 
              else //le client est dans la liste noire
              {
                 echo "
                 <script type=\"text/javascript\">
                 alert(\"Ce client est dans la liste noire !!\");
                 window.location.replace(\"acceuilAdmin.php\");
                 </script>
                 
                 ";
               }
 
              }
 
         
            
              
 
          ?>