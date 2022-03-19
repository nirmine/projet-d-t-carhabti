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
     $rep=$db->prepare('UPDATE vehicule SET autorisation=? WHERE numero_vehicule=?');
     $rep->execute(array($_POST['nouv_date'],$_SESSION['num_voit1']));
     $rep->closeCursor();
     header('Location: accueilAdmin.php', false);
     exit;

?>