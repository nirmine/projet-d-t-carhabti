<?php 
           session_start();
               //Ces variables superglobaux représentent les prix fixes de l'agences
               $_SESSION['caution']=250;
               $_SESSION['penaliteProlongementInattendu']=50;
               $_SESSION['prixChauffeur']=50;
               $_SESSION['droitTimbre']=0.3;
               $_SESSION['tauxTVA']=0.18;
               $_SESSION['seuilkilometrage']=350;
               $_SESSION['penalitekilometrage']=0.2;
               $_SESSION['adresse']='Technopole,Manouba';
               $_SESSION['telephone']='11111111';
               $_SESSION['fax']='+2161111111';
               $_SESSION['prixCarburant']=50;
          
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Carhabti-Facture d'une réservation</title>

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

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
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
      <a href="accueilFonct.php" class="logo"><b>Car<span>Habti</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="accueil_fonct.php">
              <i class="fa fa-tasks"></i>
              
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li > </li>
              <li ><a href=""> </a> </li>
              <li>
                <a href="recherche_multi_critere_v.php">
                  <div class="task-info">
                    <div class="desc"> Recherche Voiture </div>
                    <div class="percent"></div>
                  </div>

                </a>
              </li>
              <li>
                <a href="recherche_client.php">
                  <div class="task-info">
                    <div class="desc">Recherche Client</div>
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
        <p class="centered"><?php echo " <img src=\"photoFonct/". $_SESSION['image'] ." \" class=\"img-circle\" width=\"80\">" ;?></p>
          <h5 class="centered"> <?php echo $_SESSION['nom'] . ' '. $_SESSION['prenom'] ; ?> </h5>
          <li class="mt">
            <a href="accueilFonct.php">
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

              <li><a href="gallery.php">Gallery voiture</a></li>

            </ul>
          </li>

 
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
            <ul class="sub">
              <li><a href="ajouterClient.php">Nouveau client </a></li>
              <li> <a href="disponible.php">Nouvelle Réservation</a> </li>  
              <li><a href="ajout.php">Ajouter une véhicule</a> </li>
              
              <li><a href="modifier.php">Modifier des données</a> </li>
              <li><a href="reparation.php">Gestion de réparation et de réchange des piéces</a> </li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>listes des données</span>
              </a>
            <ul class="sub">
              <li><a href="listeClient.php">liste des Clients</a></li>
              <li><a href="listeFacturesImpayes.php">liste factures & impayés</a></li>
              <li><a href="listeReservations.php">liste des réservations</a></li>
              <li><a href="listeRecuperations.php">liste des récuperations</a></li>
              <li><a href="affiche.php">Pièces reparés pour une voiture donnée</a></li>
              <li><a href="aff_panne.php">Les voitures en panne</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="planning.php">
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
      <section class="wrapper site-min-height">
       
  

   
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
              <div class="pull-right">
                  <h2 ><b>Facture</b></h2>
                </div>
                
                <div class="pull-left">
                <a href="index.html" class="logo"><b><span style="color:grey"> Car</span><span>habti</span></b></a>
                  <address>
                <strong>Technopole,Manouba</strong><br>            
                Tunisie<br>
                <abbr title="Phone">Tel:</abbr> +216 11111111
              </address>
                </div>
           
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                  <br>
                <div class="row">
                  <div class="col-md-9">
                  <?php include('factureSup.inc.php');
                  if(isset($_GET['numRes']))
                  afficheCoordonneesClient($_GET['numRes']);
                  else
                     afficheCoordonneesClient($_GET['num']);?> 
                    
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                   
                  </div>
                  <!--contenu-facture -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">nbr</th>
                      <th class="text-left">DESCRIPTION</th>
                      <th style="width:140px" class="text-right">Prix Unitaire (dt)</th>
                      <th style="width:90px" class="text-right">Totale (dt)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  if(isset($_GET['numRes']))
                  ContenuFacturePrimaire($_GET['numRes']);
                  else
                  contenuFacture($_GET['num']);
                  
                   ?>
                   
                  
                    
                   
                      
               
                <br>
                <br>
              </div>
             
        
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Carhabti InfoTeam</strong>. All Rights Reserved
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

</body>

</html>
