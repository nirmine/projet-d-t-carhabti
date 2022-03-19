<?php
    session_start();
    $_SESSION['modif_num_res']=$_GET['numRes'];
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CarHabti</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css3/style.css" rel="stylesheet">
  <link href="css3/style-responsive.css" rel="stylesheet">



 
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="accueilAdmin.php" class="logo"><b>Car<span>Habti</span></b></a>

    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="accueilAdmin.php">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme"></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
             
              <li>
                <a href="recherche_multi_critere_v_ad.php">
                  <div class="task-info">
                    <div class="desc"> Recherche Voiture </div>
                    <div class="percent"></div>
                  </div>

                </a>
              </li>
              <li>
                <a href="recherche_client_ad.php">
                  <div class="task-info">
                    <div class="desc">Recherche Client</div>
                    <div class="percent"></div>
                  </div>
                </a>
              </li>   
              <li>
                <a href="rech_fonct.php">
                  <div class="task-info">
                    <div class="desc">Recherche Fonctionnaire</div>
                    <div class="percent"></div>
                  </div>
                </a>
              </li> 
            </ul>
    
            </li>
       
          </ul>
          <!-- settings end -->
          <!-- inbox dropdown start-->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu" style="position: relative;">
        
          <li><a class="logout" href="lock_screen.php">Lock Screen</a></li>
          <li><a class="logout" href="login.php">Logout</a></li>
         
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"> <?php echo " <img src=\"photoFonct/". $_SESSION['image'] ."\" class=\"img-circle\" style=\" width:100px;height:100px; \">" ;?></p>
          <h5 class="centered"> <?php echo $_SESSION['nom'] . ' '. $_SESSION['prenom'] ; ?> </h5>
          <li class="mt">
         
            <a href="accueilAdmin.php">
              <i class="fa fa-dashboard"></i>
              <span>Acceuil</span>
              </a>
          </li>
         
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Components</span>
              </a>
            <ul class="sub">
             
          
              <li><a href="gallery_ad.php">Gallery voiture</a></li>

           
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
              <ul class="sub">
              <li><a href="ajouterClient_ad.php">Nouveau client </a></li>
              <li> <a href="disponible_ad.php">Nouvelle Reservation</a> </li>  
              <li><a href="ajout_ad.php">Ajouter une véhicule</a> </li>
              <li><a href="delete_ad.php">Supprimer une voiture </a> </li>
              <li><a href="modifier_ad.php">Modifier des données</a> </li>
              <li><a href="reparation_ad.php">Gestion de réparation et de réchange des piéces</a> </li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>listes des données</span>
              </a>
            <ul class="sub">
              <li><a href="listeClient_ad.php">liste des Clients</a></li>
              <li><a href="listeFacturesImpayes_ad.php">liste factures & impayés</a></li>
              <li><a href="listeReservations_ad.php">liste des réservations</a></li>
              <li><a href="listeRecuperations_ad.php">liste des récuperations</a></li>
              <li><a href="affiche_ad.php">Pièces reparés pour une voiture donnée</a></li>
              <li><a href="aff_panne_ad.php">Les voitures en panne</a></li>
              
            </ul>
          <li class="sub-menu">
            <a  href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Fonctionnaires</span>
              </a>
            <ul class="sub">
                                   
            <li> <a  href="ajout_fonct.php">Ajouter un fonctionnaire</a> </li> 
           <li><a   href="sup_fonct.php">Supprimer un fonctionnaire</a> </li> 
           <li><a   href="affiche_fonct.php">Affiche fonctionnaire</a> </li> <!-- Afficher la fiche d'un fonctionnaire -->
            <li><a  href="absence.php">Gestion des abscences</a> </li>
            <li><a href="modif_fonct.php">Modifier des données</a></li><!-- mise à jour de l'état de présence du fonctionnaire -->
                          
            </ul>
          </li>
          <li class="sub-menu">
            <a href="planning_ad.php">
              <i class="fa fa-tasks"></i>
              <span>Planning</span>
              </a>
          
          </li>        
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
    <section class="wrapper">

    <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Modifier les données du réservation </h4>
                    <form action="modifTraitPhp_ad.php" method="POST" name="form5" onsubmit="javascript : return modifRes(document.form5.serie,document.form5.enregistrement,document.form5.cin,document.form5.prise,document.form5.restitution,document.form5.cin2,document.form5.permis,document.form5.tele,document.form5.naissance,document.form5.paye);">
                    
              <?php
                include('modifierReservationSup.php');

              ?>
              </form>
            </div>
          </div>
    </div>

    </section>

<!-- /MAIN CONTENT -->
<!--main content end-->
<!--footer start-->
<footer class="site-footer">
  <div class="text-center">
    <p>
      &copy; Copyrights <strong>Carhabti Info Team</strong>. All Rights Reserved
    </p>
 
    <a href="blank.html#" class="go-top">
      <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
<script src="lib/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->

<script type="text/javascript">
 function verif_pos(num)   //verifier si une entrée est un entier et positif
{
    var c= parseInt(num);
    if(c==NAN)
    {
        return true;
     
    }
    if(c>0)
    {
       
        return true ; 
       
    }
    else
    { 
        
        return false;
    }
}
function compare_d(d1,d2) //comparer 2 dates
{
   
    date1= new Date(d1.value);
    date2=new Date(d2.value);
    sd1=date1.getTime();
    sd2=date2.getTime();
//si la date d'arrviée et superieur a la date de depart en afficher un message d'erreur
if(sd1>sd2)
{  
   
    return false;
}
else
{
    return true;
}

}
function modifRes(serie,enregistrement,cin,prise,restitution,cin2,permis,tele,dateNaissance,paye)
{
  
  if((!(verif_pos(serie.value))) || (serie.value<10) ||(serie.value>999))
  {
    alert("Vérifier le numéro de série de la voiture");
    return false;
  }
  if((!(verif_pos(enregistrement.value))) || (enregistrement.value<1) ||(enregistrement.value>9999))
  {
    alert("Vérifier le numéro d'enregistrement de la voiture");
    return false;
  }
  if(!(verif_pos(cin.value)))
  {
    alert("Vérifier le numéro de CIN du premier conducteur");
    return false;
  }
  
  if(!(verif_pos(cin2.value)))
  {
    alert("Vérifier le numéro de CIN du deusième conducteur");
    return false;
  }
  if(!(verif_pos(tele.value)))
  {
    alert("Vérifier le numéro de téléphone du deusième conducteur");
    return false;
  }
  if(!(verif_pos(permis.value)))
  {
    alert("Vérifier le numéro de permis du 2éme conducteur");
    return false;
  }
  if(!(verif_pos(paye.value)))
  {
    alert("Vérifier la valeur du montant payé");
    return false;
  }
  if(!(compare_d(prise,restitution)))
  {
    alert("la date de prise de la voiture selectionné est supérieur à la date de restitution ");
    return false;
  }
  if((cin2.value!=NAN) || (permis.value!=NAN)|| (tele.value!=NAN)  || (dateNaissance.value!=""))
{
  if((cin2.value!=NAN) &&  (permis.value!=NAN)&& (tele.value!=NAN)  && (dateNaissance.value!=""))
  {
    return true;
  }
  else
  {
    alert("Dans le cas du présence de 2éme conducteur, vous devez saisir toute les coordonnées de ce conducteur ");
  return false;
  }
}
  
    return true;
  




}

</script>

</body>

</html>