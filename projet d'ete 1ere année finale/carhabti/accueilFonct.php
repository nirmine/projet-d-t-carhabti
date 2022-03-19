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
     //Ces variables superglobaux représentent les prix fixes de l'agences
     $_SESSION['caution']=250;
     $_SESSION['penaliteProlongementInattendu']=50;
     $_SESSION['prixChauffeur']=50;
     $_SESSION['droitTimbre']=0.3;
     $_SESSION['tauxTVA']=0.8;
     $_SESSION['seuilkilometrage']=350;
     $_SESSION['adresse']='Technopole,Manouba';
     $_SESSION['telephone']='11111111';
     $_SESSION['fax']='+2161111111';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CarHabti-Accueil</title>

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
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">
    
	
	<!-- Bootstrap itself -->
	

	

	

 
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
              <li> <a href="disponible.php">Nouvelle Reservation</a> </li>  
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
    <section class="wrapper">
    
    
    <h3><i class="fa fa-angle-right"></i> Accueil</h3>


  <!--  <div class="col-md-12 mt">
       
    <div class="row" id="vidange">
   
      <h4><i class="fa fa-angle-right"></i> Vidange </h4>
                <hr> -->
                <h4><i class="fa fa-angle-right"></i> Vidange </h4>
                <hr>
                <section class="wrapper" id="themes" style="margin-top:2px;margin-bottom:10px;">
	                  <div class="container">
                   
                    <div class="row">
            <?php
      
         
            include('accueilVidange.php');
          
            afficheVidange("fonctionnaire");


                ?>   
         		</div>

</div>
</section>
    
  
                <h4><i class="fa fa-angle-right"></i> Visite Technique  </h4>
                <hr>
                        <section class="wrapper" id="themes" style="margin-top:2px;margin-bottom:10px;">
	                  <div class="container">
                    <div class="row">
                    <?php
                  include('accueilVisite.php');
                  afficheVisite("fonctionnaire");
              ?>
                     		</div>

</div>
</section>
        

      <!-- /col-md-12 -->
    


    <div class="col-md-12 mt">
       
    <div class="row" id="auto">

  
        
                <h4><i class="fa fa-angle-right"></i> Autorisation </h4>
                <hr>
                      
           <section class="wrapper" id="themes"style="margin-top:2px;margin-bottom:10px;">
	                  <div class="container">
                    <div class="row">

                    <?php
                include('accueilAutorisation.php');
                afficheAutorisation("fonctionnaire");
              ?>
               </div>
          </div>
          <!-- /col-md-12 --> </section>
        </div>
          </div>
          <!-- /col-md-12 -->
        </div>
        <div class="col-md-12 mt">
       
       <div class="row" >
   
     
           
                   <h4><i class="fa fa-angle-right"></i> Assurance </h4>
                   <hr>
                         
              <section class="wrapper" id="themes" style="margin-top:2px;margin-bottom:10px;">
                       <div class="container">
                       <div class="row">
                
                    <?php
                  include('accueilAssurance.php');
                  afficheAssurance("fonctionnaire");
              ?>
                             </div>
          </div>
          <!-- /col-md-12 --> </section>
        </div>
          </div>
          <!-- /col-md-12 -->
        </div>
      <!-- /col-md-12 -->
   
    <!--  Liste des voitures tombés en panne -->
    <div class="col-md-12 mt">
       
       <div class="row" >
   
     
           
                   <h4><i class="fa fa-angle-right"></i> Voitures en panne </h4>
                   <hr>
                         
              <section class="wrapper" id="themes" style="margin-top:2px;margin-bottom:10px;">
                       <div class="container">
                       <div class="row">
                    <?php
                include('accueilPanne.php');
                affichePanne("fonctionnaire");
              ?>
                             </div>
          </div>
          <!-- /col-md-12 --> </section>
        </div>
          </div>
          <!-- /col-md-12 -->
        </div>
    <h4><i class="fa fa-angle-right"></i> Les Reservations </h4>
    <hr>
    <section class="wrapper" id="themes" style="margin-top:2px;margin-bottom:10px;">
	                  <div class="container">
                    <div class="row">
      <?php
           include('acceuilSup.php');
           afficherReservationsAujourdhui('fonctionnaire');
            ?>


      </div>
    </div>
    </section>
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



</body>

</html>
