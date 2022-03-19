<?php
//mise à jour de l'état de vidange et le kilométrage seuil(k2) dans la base de donnée après faire le vidange
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=agence;charset=utf8',
            'root', '');
         }
         catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
         }

         $reponse3 = $db->prepare('SELECT k2 FROM vehicule WHERE numero_vehicule=?');
         $reponse3->execute(array($_GET['num']));
         $e1=$reponse3->fetch();        
         $f2=$e1['k2'];
         $h2=intval($f2+10000);
         $reponse=$db->prepare('UPDATE vehicule SET vidange=?,k2=? WHERE numero_vehicule=?');
         $reponse->execute(array("oui",$h2,$_GET['num']));
         $reponse->closeCursor();
         header('Location: accueilAdmin.php', false);
         exit;
?>