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
     if ($_POST['password']==$_SESSION['passwd'])
     {
        $_SESSION['nom']="THE";
        $_SESSION['prenom']="BOSS";  
        header('Location: accueilAdmin.php',false);
                     exit; 
     }
     else 
     {
        $rep=$db->query('SELECT * FROM fonctionnaire');
        
      
          while ($entree=$rep->fetch()) {
              if (password_verify($_POST['password'], $entree['salt'])) {
                  $_SESSION['nom']=$entree['nom'];
                  $_SESSION['prenom']=$entree['prenom'];
               
                  header('Location: accueilFonct.php', false);
                  exit;
              }
          }
      
       
     
           echo 'Votre mot de passe est invalide ' ;
       
       
    } 

    
?>