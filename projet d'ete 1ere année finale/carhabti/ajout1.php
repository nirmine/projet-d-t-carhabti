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
                     if($_FILES['image1']['error']>0)
                     {
                          echo "une erreur est survenue";
                     }
                     else
                     { 
                         $image_tmp= $_FILES['image1']['tmp_name'];
                         $image_name=$_FILES['image1']['name'];
                         $image_size=$_FILES['image1']['size'];
                         $image_type=$_FILES['image1']['type'];
                         $a= $_POST['sr'];
                         $b=(int) $_POST['enregistrement'];


                         $rep=$db->prepare('SELECT * FROM vehicule WHERE serie=? AND enregistrement=? AND modele=?');
                         $rep->execute(array($a,$b,$_POST['model']));
                 
                  
                         $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                         // récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
                         $extension = strrchr($image_name, '.');
                         $r=$rep->fetch();
                            //si la voiture n'existe pas et l'extension de l'image est valide
                         if ((empty($r))&&(in_array($extension, $extensions))) {
                             //si la voiture a un nombre des portes=2 ou =4
                             if (($_POST["porte"]==2) ||(($_POST["porte"]==4))) {
                                 $file="photoVoiture\\".$image_name  ;
                                 $res=move_uploaded_file($image_tmp, $file); // entregistrement de l'image dans le dossier photoVoiture
                                
                             
                                 $reponse=$db->prepare('INSERT INTO vehicule (marque,couleur,categorie,carburant,serie,enregistrement,kilometrage,visite,assurance,autorisation,modele,k2,prix_location,vidange,nb_portes,img_voiture,prix) 
                       VALUES (?,?,?,?,?,?,?,?,?,?,?,10000,?,"non",?,?,?)');
                                 $reponse->execute(array($_POST['mar'],$_POST['color'],$_POST['catego'],(int)$_POST['carb'],(int)$_POST['sr'],(int)$_POST['enregistrement'],(int)$_POST['kilo'],date($_POST['visit']),date($_POST['assurance']),date($_POST['auto']),$_POST['model'],$_POST['prix'],(int)$_POST['porte'],$image_name,$_POST['prix_v']));
                                 $reponse->closeCursor();
                              
                             }
                             else
                             {
                                 //si le nombre de porte est different de 2 et 4
                                echo "
                                <script type=\"text/javascript\">
                                alert(\"le nombre de porte doit etre égale soit à 2 soit à 4\");
                                </script>                       
                                ";
                             }
                         }
                         else
                         {
                             //si la voiture existe déjà
                            echo "
                            <script type=\"text/javascript\">
                            alert(\"la voiture existe déjà\");
                            </script>                       
                            ";
                         }
                         }
                         //redirection vers la page d'ajout
                         echo "
                         <script type=\"text/javascript\">
                         
                         window.location.replace(\"ajout.php\");
                         </script> ";
                        

          ?>