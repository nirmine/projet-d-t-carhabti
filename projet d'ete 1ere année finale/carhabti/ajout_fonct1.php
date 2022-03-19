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
 $image_tmp=$_FILES['fonct_img']['tmp_name'];
 $image_name=$_FILES['fonct_img']['name'];
 $image_size=$_FILES['fonct_img']['size'];
 $image_type=$_FILES['fonct_img']['type'];
 $rep=$db->prepare('SELECT nom FROM fonctionnaire WHERE ncin=?  ');
 $rep->execute(array($_POST['cin']));
 $extensions = array('.png', '.gif', '.jpg', '.jpeg','.jfif');
 // récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
 $extension = strrchr($_FILES['fonct_img']['name'], '.');  
 $e=$rep->fetchall();
 $file="photoFonct/".$image_name  ;
 $res=move_uploaded_file($image_tmp,$file);
$salt=password_hash($_POST['pwd'],PASSWORD_DEFAULT);
$crypt=crypt($_POST['pwd']);
 if(empty($e)&&(in_array($extension,$extensions))&&$res)
 {
    
    $r1=$db->prepare('INSERT INTO fonctionnaire (ncin,nom,prenom,adresse,tel,passwrd,img_fonct,salt) VALUES (?,?,?,?,?,?,?,?)');
    $r1->execute(array($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['tel'],$crypt,$image_name,$salt));
    
    header('Location: accueilAdmin.php',false);
                       exit;
 }
?>