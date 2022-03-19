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
                     $r1=$db->prepare(' SELECT img_voiture,numero_vehicule FROM vehicule WHERE serie=? AND enregistrement=? AND marque=?'); //selectionner le nom de l'image et le numéro de véhicule à supprimer
                     $r1->execute(array($_POST['sr'],$_POST['enreg'],$_POST['marq']));
                     $e1=$r1->fetch();
                     try {
                         $filename="photoVoiture\\". $e1['img_voiture']; //supprimer l'image de la voiture contenue dans le dossier photoVoiture
                         unlink($filename);
                     }
                    catch(E_WARNING $e)
                    {
                        die('Erreur: '. $e->getMessage());
                    }
                    $sup_reservation=$db->prepare('DELETE FROM reservation WHERE numero_vehicule=?'); //supprimer les reservations de la voiture
                    $sup_reservation->execute(array($e1['numero_vehicule']));
                    $sup_reparation=$db->prepare('DELETE FROM reparation WHERE num_voiture=?'); //supprimer les réparations de la voiture
                    $sup_reparation->execute(array($e1['numero_vehicule']));
                 $reponse=$db->prepare('DELETE FROM vehicule WHERE serie=? AND enregistrement=? AND marque=? AND modele=?'); //supprimer la voiture 
                 $reponse->execute(array($_POST['sr'],$_POST['enreg'],$_POST['marq'],$_POST['model']));
                 echo 'Vehicule supprimé' ;
                 $reponse->closeCursor();
                 $r1->closeCursor();
                 header('Location: delete_ad.php',false);
                 exit;
     ?>