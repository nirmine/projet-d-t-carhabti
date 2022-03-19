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
            
            
            $_SESSION['login']="12345678"; // creer des variables superglobales pour le login et le mot de passe de l'administrateur
            $_SESSION['passwd']="THEboss";
            $_SESSION['adm_image']="admin.jpg";
        if(($_POST['cin']==$_SESSION['login'])&&($_POST['wd']==$_SESSION['passwd']))
        {
            $_SESSION['nom']="THE";
             $_SESSION['prenom']="BOSS";  
             $_SESSION['image']=$_SESSION['adm_image'];
             header('Location: accueilAdmin.php',false);
                          exit; 

        }
         else
         {
            if(($_POST['cin']==$_SESSION['login'])&&($_POST['wd']!=$_SESSION['passwd']))//si l'utilisateur courant est l'administrateur et le mot de passe est incorrecte
            {
                echo "
                <script type=\"text/javascript\">
                alert(\"Le mot de passe saisie est incorrect\");
                
                </script>
                
                ";
            header("location:login.php");}
            else
            {
             $a=substr($_POST['cin'],1,7); 
             $rep=$db->prepare('SELECT * FROM fonctionnaire WHERE ncin=? ');
              $rep->execute(array((int)$a));
            if(!(empty($rep)))
             {
                 $i=0;
                 while($entree=$rep->fetch())
                 {
                  
                     if (password_verify($_POST['wd'],$entree['salt']))//le cas où le ncin et le mot de passe sont correctes 
                      {$i++;
                         
                         $_SESSION['nom']=$entree['nom'];
                         $_SESSION['prenom']=$entree['prenom'];
                         $_SESSION['image']=$entree['img_fonct'];
                         header('Location: accueilFonct.php', false);
                         exit;
                     }
                     }
                     if($i==0)//le cas où ncin existe (càd c'est le ncin d'un fonctionnaire)mais le mot de passe est erroné
                     {
                        echo "
                        <script type=\"text/javascript\">
                        alert(\"le mot de passe saisie est invalide\");
                        window.location.replace(\"login.php\");
                        </script>                       
                        ";
                  
               }

         }

             else
             {
                 echo "le numèro de cin saisie est invalide " ;
             
             } 
          } 
        }

        ?>