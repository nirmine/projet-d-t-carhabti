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
       $r=$db->query('SELECT * FROM fonctionnaire ');
       while($e=$r->fetch())
       {
         $_SESSION['num1']=$e['ncin'];
         echo" <li class=\"col-sm-4 col-xs-12 portfolio-item nopadding-lr apps isotope-item\" style=\" width:370px;height:370px; margin-top:50px;margin-left:50px\">
         <div class=\"hover-item\"> 
         <img src=\"photoFonct/".$e['img_fonct']. " \" class=\"img-responsive smoothie \" alt=\" \" >
             <div class=\"overlay-item-caption smoothie\"></div>
             <div class=\"hover-item-caption smoothie\">
                 <div class=\"vertical-center smoothie\">
                 <br> <br> <br> <br> <br>
                     <h3  style=\" color:black \" > ". $e['prenom'] .' '. $e['nom'] ."</h3>
                     <a href=\"affiche_fonct2.php?cin=".$e['ncin'] ." \" title=\"View Gallery\" class=\"btn btn-primary lb-link smoothie\">Plus d'information</a>
                 
                 </div>
             </div>
         </div>
     </li> ";

       }
?>