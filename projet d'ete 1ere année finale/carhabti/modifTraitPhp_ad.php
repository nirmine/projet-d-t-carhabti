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
     
             if($_POST['cin2']==0)
             $_POST['cin2']=NULL;
             if($_POST['permis']==0)
             $_POST['permis']=NULL;
             if($_POST['tele2']==0)
             $_POST['tele2']=NULL;
             if($_POST['naissance']==0)
             $_POST['naissance']=NULL;
             if($_POST['nom2']==0)
             $_POST['nom2']=NULL;
             $d1= $_POST['prise'];
             $d2= $_POST['restitution'];
             $r1=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
             $r1->execute(array($_POST['cin']));
             $e1=$r1->fetch();
             if (empty($e1))//le client n'existe pas
             {
                 echo "
             <script type=\"text/javascript\">
             alert(\" C'est un nouveau client veuillez créer un nouveau client tout d'abord ! \");
             window.location.replace(\"ajouterClient_ad.php\");
             </script>                       
             ";
             }
        $r=$db->prepare('SELECT * FROM vehicule WHERE serie=? AND enregistrement=?');
        $r->execute(array($_POST['serie'],$_POST['enregistrement']));
        $e=$r->fetch();//la voiture saisie dans le formulaire
        if (!(empty($e))) //la voiture existe déjà
        {
            $voiture=$db->prepare('SELECT numero_vehicule FROM reservation WHERE numero_reservation=?');//le numéro de la voiture avant la modification
            $voiture->execute(array($_SESSION['modif_num_res']));
            $h=$voiture->fetch();
            if ($e['numero_vehicule']!=$h['numero_vehicule'])//s'il a changer la voiture
             { 
                if (($d1>$e['autorisation'])||($e['autorisation']>$d2)) //n'a pas d'autorisation
                {
                    if (($d1>$e['assurance'])||($e['assurance']>$d2))
                     {
                        if (($d1>$e['visite'])||($e['visite']>$d2)) {
                            if ($e['vidange']=="oui")//n'a pas de vidange
                             {
                                 $r1=$db->prepare('SELECT numero_reservation FROM reservation WHERE numero_vehicule=? ');
                                 $r1->execute(array($e['numero_vehicule']));
                                 $h1=$r1->fetch();
                                 if (empty($h1)) { //n'a aucune réservation
                                     $r1=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
                                     $r1->execute(array($_POST['cin']));
                                     $e1=$r1->fetch();
                                     $r2=$db->prepare('UPDATE reservation SET numero_vehicule=?, numero_client=?, date_prise_en_charge=?, date_restitution=?,chauffeur=?, montant_paye=?, cin_conducteur2=?, nom_conducteur2=?, date_naissance_conducteur2=?, tel_conducteur2=? , permis_conducteur2=? WHERE numero_reservation=?');
                                     $r2->execute(array($e['numero_vehicule'],$e1['numero_client'],$_POST['prise'],$_POST['restitution'],$_POST['chauffeur'],$_POST['paye'],$_POST['cin2'],$_POST['nom2'],$_POST['naissance'],$_POST['tele'],$_POST['permis'],$_SESSION['modif_num_res']));
                                    
                                     echo "
                                    <script type=\"text/javascript\">
                                    
                                    window.location.replace(\"listeReservations_ad.php\");
                                    </script>                       
                                    ";
                                 } else { // a des réservations
                                    $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge BETWEEN ? AND ? FILTER BY numero_vehicule=?) ');//les réservations qui sont strictement inclus cet intervalle de temps voulu
                                    $r2->execute(array($_POST['prise'],$_POST['restitution'],$_POST['prise'],$_POST['restitution'],$e['numero_vehicule']));
                                     $h2=$r2->fetch();
                                     if (empty($h2)) {
                                         $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge <? FILTER BY numero_vehicule=?');//les réservations qui coupe  cet intervalle de temps voulu de l'extimité inférieur
                                         $r3->execute(array($_POST['prise'],$_POST['restitution'],$_POST['prise'],$e['numero_vehicule']));
                                         $h3=$r3->fetch();
                                         if (empty($h3)) {
                                             $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? HAVING date_restitution >? FILTER BY numero_vehicule=?');//les réservations qui coupe  cet intervalle de temps voulu de l'extimité supérieur
                                             $r4->execute(array($_POST['prise'],$_POST['restitution'],$_POST['restitution'],$e['numero_vehicule']));
                                             $h4=$r4->fetch();
                                             if (empty($h4)) {
                                                 $rep6=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge>? AND date_restitution<?');
                                                 $rep6->execute(array($_POST['prise'],$_POST['restitution']));
                                                 $h6=$rep6->fetch();
                                                 if (empty($h6)) { //si la date de prise et la date de restitution sont egales aux dates trouvés dans la base de donnée
                                                     echo"h6";
                                                     echo"<br> ";
                                                     $rep5=$db->prepare('SELECT date_prise_en_charge , date_restitution FROM reservation WHERE  numero_vehicule=?');
                                                     $rep5->execute(array($e['numero_vehicule']));
                                                     $h5=0;
                                                     $d1=explode(" ", $_POST['prise']);
                                                     $d2=explode(" ", $_POST['restitution']);
                                                     $prise=date("Y-m-d", strtotime($d1[0])); // extraire la nouvelle date de prise
                                                    $restitution=date("Y-m-d", strtotime($d2[0])); //extraire la nouvelle date de restitution
                                                    echo $prise;
                                                     echo"<br> ";
                                                     echo $restitution;
                                                     echo"<br> ";
                                                     while ($e5=$rep5->fetch()) {
                                                         $date_prise_precedent=explode(" ", $e5['date_prise_en_charge']); // extraire la date de prise
                                                        $date_restitution_precedent=explode(" ", $e5['date_restitution']); //extraire la date de restitution
                                                        
                                                        $prise_precedent=date("Y-m-d", strtotime($date_prise_precedent[0]));
                                                       
                                                         $restitution_precedent=date("Y-m-d", strtotime($date_restitution_precedent[0]));
                                                         if (($prise==$prise_precedent) && ($restitution==$restitution_precedent)) {
                                                             //si la date de restitution  = a la nouvelle date de restitution et date de prise = a la nouvelle date de prise
                                                             $h5++;
                                                             //la voiture avait une reservation dans ses deux dates
                                                         }
                                                     }
                                                
                                                     if ($h5==0) {//cette voiture est disponible
                                                         echo "libre";
                                                         $r1=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
                                                         $r1->execute(array($_POST['cin']));
                                                         $e1=$r1->fetch();
                                                         $r2=$db->prepare('UPDATE reservation SET numero_vehicule=?, numero_client=?, date_prise_en_charge=?, date_restitution=?,chauffeur=?, montant_paye=?, cin_conducteur2=?, nom_conducteur2=?, date_naissance_conducteur2=?, tel_conducteur2=? , permis_conducteur2=? WHERE numero_reservation=?');
                                                         $r2->execute(array($e['numero_vehicule'],$e1['numero_client'],$_POST['prise'],$_POST['restitution'],$_POST['chauffeur'],$_POST['paye'],$_POST['cin2'],$_POST['nom2'],$_POST['naissance'],$_POST['tele'],$_POST['permis'],$_SESSION['modif_num_res']));
                                                    
                                                         echo "
                                                    <script type=\"text/javascript\">
                                                    
                                                    window.location.replace(\"listeReservations_ad.php\");
                                                    </script>                       
                                                    ";
                                                     } else {// il y a une réservation
                                                         echo "
                                                    <script type=\"text/javascript\">
                                                    alert(\" Cette voiture est déjà réservée dans cette période! \");
                                                    window.location.replace(\"listeReservations_ad.php\");
                                                    </script>                       
                                                    ";
                                                     }
                                                 } else {// il y a une réservation
                                                     echo "
                                                    <script type=\"text/javascript\">
                                                    alert(\" Cette voiture est déjà réservée dans cette période! \");
                                                    window.location.replace(\"listeReservations_ad.php\");
                                                    </script>                       
                                                    ";
                                                 }
                                             } else {// il y a une réservation
                                                 echo "
                                                    <script type=\"text/javascript\">
                                                    alert(\" Cette voiture est déjà réservée dans cette période! \");
                                                    window.location.replace(\"listeReservations_ad.php\");
                                                    </script>                       
                                                    ";
                                             }
                                         } else {// il y a une réservation
                                             echo "
                                                    <script type=\"text/javascript\">
                                                    alert(\" Cette voiture est déjà réservée dans cette période! \");
                                                    window.location.replace(\"listeReservations_ad.php\");
                                                    </script>                       
                                                    ";
                                         }
                                     }
                                     else {// il y a une réservation
                                        echo "
                                               <script type=\"text/javascript\">
                                               alert(\" Cette voiture est déjà réservée dans cette période! \");
                                               window.location.replace(\"listeReservations_ad.php\");
                                               </script>                       
                                               ";
                                    }
                                 }
                             }
                            else
                            {
                                echo "
                                <script type=\"text/javascript\">
                                alert(\" Cette voiture doit faire son vidange  \");
                                window.location.replace(\"listeReservations_ad.php\");
                                </script>                       
                                ";
                            }
                        } 
                        else {
                            echo "
                    <script type=\"text/javascript\">
                    alert(\" Cette voiture a une visite technique entre ces 2 dates  \");
                    window.location.replace(\"listeReservations_ad.php\");
                    </script>                       
                    ";
                        }
                    } 
                    else
                     {
                        echo "
                    <script type=\"text/javascript\">
                    alert(\" Cette voiture a un renouvellement d'assurance entre ces 2 dates  \");
                    window.location.replace(\"listeReservations_ad.php\");
                    </script>                       
                    ";
                    }
                }
                 else
                  {
                    echo "
                <script type=\"text/javascript\">
                alert(\" Cette voiture a un renouvellement d'autorisation entre ces 2 dates  \");
                window.location.replace(\"listeReservations_ad.php\");
                </script>                       
                ";
                }
            }
            
            else // si la voiture reste la meme
            {
                $rep=$db->prepare('SELECT date_prise_en_charge,date_restitution FROM reservation WHERE numero_reservation=?');
                $rep->execute(array($_SESSION['modif_num_res']));
                $reservation=$rep->fetch();
                if(($reservation['date_prise_en_charge']!=$_POST['prise']) || ($reservation['date_restitution']!=$_POST['restitution'])) //si au moins 1 des 2 dates a changé il determine si la voiture est disponible entre ces 2 dates            
                { echo "dates différentes";
                    $nombre_reservation=$db->prepare('SELECT numero_vehicule FROM reservation WHERE numero_vehicule=?');
                    $nombre_reservation->execute(array($e['numero_vehicule']))  ;
                    $i=0;
                    while($n=$nombre_reservation->fetch())
                    {
                        $i++;//nombre des reservations faites pour cette voiture
                    }
                    if($i==1) //cette reservation est la seule réservation de la voiture qui est celle-ci qui nous somme en train de modifier
                    {   echo"1";
                        if (($d1>$e['autorisation'])||($e['autorisation']>$d2)) {
                            if (($d1>$e['assurance'])||($e['assurance']>$d2)) {
                                if (($d1>$e['visite'])||($e['visite']>$d2)) {
                                    if ($e['vidange']=="oui") {
                                            //et la voiture est disponible entre les deux dates
                                        $r2=$db->prepare('UPDATE reservation SET numero_vehicule=?, numero_client=?, date_prise_en_charge=?, date_restitution=?,chauffeur=?, montant_paye=?, cin_conducteur2=?, nom_conducteur2=?, date_naissance_conducteur2=?, tel_conducteur2=? , permis_conducteur2=? WHERE numero_reservation=?');
                                                        $r2->execute(array($e['numero_vehicule'],$e1['numero_client'],$_POST['prise'],$_POST['restitution'],$_POST['chauffeur'],$_POST['paye'],$_POST['cin2'],$_POST['nom2'],$_POST['naissance'],$_POST['tele'],$_POST['permis'],$_SESSION['modif_num_res']));
                                                         echo "
                                                        <script type=\"text/javascript\">
                                                        
                                                        window.location.replace(\"listeReservations_ad.php\");
                                                        </script>                       
                                                        ";
                                                        echo"vidange oui";
                                    }
                                    else
                                    {
                                        echo "
                                        <script type=\"text/javascript\">
                                        alert(\" Cette voiture doit faire son vidange  \");
                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>                       
                                        ";
                                    }
                                    
                                }
    
                                    else
                                     {
                                        echo "
                                <script type=\"text/javascript\">
                                alert(\" Cette voiture a une visite technique entre ces 2 dates  \");
                                window.location.replace(\"listeReservations_ad.php\");
                                </script>                       
                                ";
                                    }
                                } 
                                else
                                 {
                                    echo "
                                <script type=\"text/javascript\">
                                alert(\" Cette voiture a un renouvellement d'assurance entre ces 2 dates  \");
                                window.location.replace(\"listeReservations_ad.php\");
                                </script>                       
                                ";
                                }
                            } 
                            else 
                            {
                                echo "
                            <script type=\"text/javascript\">
                            alert(\" Cette voiture a un renouvellement d'autorisation entre ces 2 dates  \");
                            window.location.replace(\"listeReservations_ad.php\");
                            </script>                       
                            ";
                            }
                        }
                    
                    else //la voiture a plusieurs reservations donc on doit determiner la disponibilté de cette voiture dans ces deux dates 
                    {
                        $r2=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution>? AND date_restitution<? AND date_prise_en_charge>? AND  date_prise_en_charge<? AND numero_vehicule=?) ');//les réservations qui sont strictement inclus cet intervalle de temps voulu
                        $r2->execute(array($_POST['prise'],$_POST['restitution'],$_POST['prise'],$_POST['restitution'],$e['numero_vehicule']));
                        $h2=$r2->fetch();
                        if (empty($h2))
                         {echo"non inclus";
                            $r3=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_restitution  BETWEEN ? AND ? HAVING date_prise_en_charge <? FILTER BY numero_vehicule=?');//les réservations qui coupe  cet intervalle de temps voulu de l'extimité inférieur
                            $r3->execute(array($_POST['prise'],$_POST['restitution'],$_POST['prise'],$e['numero_vehicule']));
                            $h3=$r3->fetch();
                            if (empty($h3))
                            { echo"non inférieur";
                                $r4=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge  BETWEEN ? AND ? HAVING date_restitution >? FILTER BY numero_vehicule=?');//les réservations qui coupe  cet intervalle de temps voulu de l'extimité supérieur
                                $r4->execute(array($_POST['prise'],$_POST['restitution'],$_POST['restitution'],$e['numero_vehicule']));
                                $h4=$r4->fetch();
                                if (empty($h4))
                                { echo"non supérieur";
                                    //si la date de restitution et la date de prise en charge sont inclus dans l'intervalle ]d1,d2[ 
                                    $rep6=$db->prepare('SELECT numero_vehicule FROM reservation WHERE date_prise_en_charge>? AND date_restitution<? and numero_vehicule=?');
                                    $rep6->execute(array($_POST['prise'],$_POST['restitution'],$e['numero_vehicule']));
                                    $h6=$rep6->fetch();
                                    if (empty($h6)) { //si la date de prise et la date de restitution sont egales aux dates trouvés dans la base de donnée
                                        echo"h6";
                                        echo"<br> ";
                                        $rep5=$db->prepare('SELECT date_prise_en_charge , date_restitution FROM reservation WHERE  numero_vehicule=?');
                                        $rep5->execute(array($e['numero_vehicule']));
                                        $h5=0; 
                                        $d1=explode(" ",$_POST['prise']);
                                        $d2=explode(" ",$_POST['restitution']);
                                        $prise=date("Y-m-d" , strtotime($d1[0])); // extraire la nouvelle date de prise
                                        $restitution=date("Y-m-d" , strtotime($d2[0])); //extraire la nouvelle date de restitution
                                        echo $prise;
                                        echo"<br> ";
                                        echo $restitution;
                                        echo"<br> ";
                                        while($e5=$rep5->fetch())
                                        {
                                            $date_prise_precedent=explode(" ",$e5['date_prise_en_charge']); // extraire la date de prise 
                                            $date_restitution_precedent=explode(" ",$e5['date_restitution']); //extraire la date de restitution
                                            
                                            $prise_precedent=date("Y-m-d" , strtotime($date_prise_precedent[0]));
                                           
                                            $restitution_precedent=date("Y-m-d" , strtotime($date_restitution_precedent[0]));
                                            if(($prise==$prise_precedent) && ($restitution==$restitution_precedent))
                                            {
                                                //si la date de restitution  = a la nouvelle date de restitution et date de prise = a la nouvelle date de prise
                                                $h5++;
                                                //la voiture avait une reservation dans ses deux dates
                                            }
                                        
                                            
                                        }
                                    
                                        if ($h5==0) {//cette voiture est disponible 
                                            echo "libre";
                                            
                                            $r1=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
                                            $r1->execute(array($_POST['cin']));
                                            $e1=$r1->fetch();
                                            
                                         $r2=$db->prepare('UPDATE reservation SET numero_vehicule=?, numero_client=?, date_prise_en_charge=?, date_restitution=?,chauffeur=?, montant_paye=?, cin_conducteur2=?, nom_conducteur2=?, date_naissance_conducteur2=?, tel_conducteur2=? , permis_conducteur2=? WHERE numero_reservation=?');
                                         $r2->execute(array($e['numero_vehicule'],$e1['numero_client'],$_POST['prise'],$_POST['restitution'],$_POST['chauffeur'],$_POST['paye'],$_POST['cin2'],$_POST['nom2'],$_POST['naissance'],$_POST['tele'],$_POST['permis'],$_SESSION['modif_num_res']));
                                         
                                        echo "
                                        <script type=\"text/javascript\">

                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>
                                        ";
                                        } else {// il y a une réservation
                                            echo"dedant";
                                             echo "
                                             <script type=\"text/javascript\">
                                             alert(\" Cette voiture est déjà réservée dans cette période! \");
                                             window.location.replace(\"listeReservations_ad.php\");
                                             </script>
                                             ";
                                        }
                                    }
                                    else
                                    {
                                        echo"les réservations qui coupe  cet intervalle de temps voulu de l'extimité supérieur";
                                        echo "
                                        <script type=\"text/javascript\">
                                        alert(\" Cette voiture est déjà réservée dans cette période! \");
                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>                       
                                        "; 
                                    }
                                }
                                else// il y a une réservation
                                    { echo"les réservations qui coupe  cet intervalle de temps voulu de l'extimité supérieur";
                                        echo "
                                        <script type=\"text/javascript\">
                                        alert(\" Cette voiture est déjà réservée dans cette période! \");
                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>                       
                                        ";
                                    }
                            }
                            else// il y a une réservation
                                    {echo"les réservations qui coupe  cet intervalle de temps voulu de l'extimité inférieur";
                                        echo "
                                        <script type=\"text/javascript\">
                                        alert(\" Cette voiture est déjà réservée dans cette période! \");
                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>                       
                                        ";
                                    }
                        }
                        else// il y a une réservation
                                    { echo"les réservations qui sont strictement inclus cet intervalle de temps voulu";
                                        echo "
                                        <script type=\"text/javascript\">
                                        alert(\" Cette voiture est déjà réservée dans cette période! \");
                                        window.location.replace(\"listeReservations_ad.php\");
                                        </script>                       
                                        ";
                                    }
                    }
                }
                else//les dates sont les mémes et la voiture et la méme
                {
                    $r1=$db->prepare('SELECT numero_client FROM client WHERE cin=?');
                    $r1->execute(array($_POST['cin']));
                    $e1=$r1->fetch();
                    $r2=$db->prepare('UPDATE reservation SET numero_vehicule=?, numero_client=?, date_prise_en_charge=?, date_restitution=?,chauffeur=?, montant_paye=?, cin_conducteur2=?, nom_conducteur2=?, date_naissance_conducteur2=?, tel_conducteur2=? , permis_conducteur2=? WHERE numero_reservation=?');
                    $r2->execute(array($e['numero_vehicule'],$e1['numero_client'],$_POST['prise'],$_POST['restitution'],$_POST['chauffeur'],$_POST['paye'],$_POST['cin2'],$_POST['nom2'],$_POST['naissance'],$_POST['tele'],$_POST['permis'],$_SESSION['modif_num_res']));
                    
                    echo "
                    <script type=\"text/javascript\">
                    
                    window.location.replace(\"listeReservations_ad.php\");
                    </script>                       
                    ";
                }



              
              
                



            }
        }
        else ///la voiture n'existe pas
        {
            echo "
            <script type=\"text/javascript\">
            alert(\" Cette voiture n'existe pas  \");
            window.location.replace(\"listeReservations_ad.php\");
            </script>                       
            ";
        }   

?>