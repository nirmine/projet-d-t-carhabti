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
             $rep=$db->prepare('UPDATE reparation SET etat=? WHERE num_voiture=? AND piece=?');
             $rep->execute(array("repare",$_GET['num_voit'],$_GET['piece']));
             $rep->closeCursor();
             header('Location: accueilFonct.php', false);
                exit;
?>