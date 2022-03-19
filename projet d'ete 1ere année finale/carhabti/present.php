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
             $r1=$db->prepare('SELECT nb_jour_travail FROM fonctionnaire WHERE ncin=?');
             $r1->execute(array($_GET['cin']));
             $e=$r1->fetch();
             $f=$e['nb_jour_travail'];
             $h=intval($f++);
             echo $h;
             $r=$db->prepare('UPDATE fonctionnaire SET presence=?,nb_jour_travail=? WHERE ncin=?');
             $r->execute(array("present",$h,$_GET['cin'])) ;
             $r->closeCursor();
             header('Location: accueilAdmin.php',false);
             exit; 
?>