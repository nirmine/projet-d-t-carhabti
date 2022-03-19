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
     $r1=$db->prepare(' SELECT img_fonct FROM fonctionnaire WHERE ncin=?');
     $r1->execute(array($_POST['cin']));
     $e1=$r1->fetch();
     try {
         $filename="photoFonct\\". $e1['img_fonct'];
         unlink($filename);
     }
    catch(E_WARNING $e)
    {
        die('Erreur: '. $e->getMessage());
    }
     $r=$db->prepare('DELETE FROM fonctionnaire WHERE ncin=?');
     $r->execute(array($_POST['cin']));
     $r->closeCursor();
     header('Location: accueilAdmin.php',false);
                          exit; 
?>