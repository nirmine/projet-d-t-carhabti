<?php session_start(); ?>
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
              <li> <a href="disponible.php">Nouvelle R??servation</a> </li>  
              <li><a href="ajout.php">Ajouter une v??hicule</a> </li>
              
              <li><a href="modifier.php">Modifier des donn??es</a> </li>
              <li><a href="reparation.php">Gestion de r??paration et de r??change des pi??ces</a> </li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>listes des donn??es</span>
              </a>
            <ul class="sub">
              <li><a href="listeClient.php">liste des Clients</a></li>
              <li><a href="listeFacturesImpayes.php">liste factures & impay??s</a></li>
              <li><a href="listeReservations.php">liste des r??servations</a></li>
              <li><a href="listeRecuperations.php">liste des r??cuperations</a></li>
              <li><a href="affiche.php">Pi??ces repar??s pour une voiture donn??e</a></li>
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
    <h3><i class="fa fa-angle-right"></i> Disponibilit?? </h3>
       
  

         <div class="row mt">
       <div class="col-lg-12">
         <div class="form-panel">
           <h4 class="mb"><i class="fa fa-angle-right"></i> Disponibilit?? dans un intervalle de date </h4>
           <form  action="disponible2.php" method="POST"  id="form2" name="form2" onsubmit="javascript : return compare_d(document.form2.date3,document.form2.date4);" >
              <div class="form-group">
               <div>
                    <label for="date1" class="sr-only" >Choisissez une date de prise en charge</label> <br>
                    <input type="datetime-local" name="date3" id="date3" class="form-control round-form" > 

                </div>
                <div>
                    <label for="date2" class="sr-only" >Choisissez une date de r??stitution</label> <br>
                    <input type="datetime-local" name="date4" id="date4" class="form-control round-form" > 

                </div>
               
                <div>
                    <input type="submit" value="recherche" class="btn btn-round btn-success" > 
                </div>
                <span id="error1"></span>
              </div>
           </form>
         </div>
       </div>
       <div class="row mt">
       <div class="col-lg-12">
         <div class="form-panel">
           <h4 class="mb"><i class="fa fa-angle-right"></i> Disponibilit?? d'une voiture dans un intervalle de date </h4>
           <form  action="disponible3.php" method="POST"  id="form3" name="form3" onsubmit=" javascript : return compare_d(document.form3.date1,document.form3.date2);" >
              <div class="form-group">
               <div>
                    <label for="date1" class="sr-only" ></label> <br>
                    <input type="datetime-local" name="date1" id="date1"class="form-control round-form" placeholder="Choisissez une date de prise en charge"> 

                </div>
                <div>
                    <label for="date2" class="sr-only" ></label> <br>
                    <input type="datetime-local" name="date2" id="date2" class="form-control round-form" placeholder="Choisissez une date de r??stitution" > 

                </div>
                <div>
                    <br>
                <input type="text" name="model" id="model" class="form-control round-form" placeholder="Mod??le de la voiture" required> 
                </div>
                <div>
                    <br>
                <input type="text" name="marque" id="marque" class="form-control round-form" placeholder="Marque de la voiture" required> 
                </div>
                <div>
                    <input type="submit" value="recherche" class="btn btn-round btn-success"> 
                </div>
                <span id="error1"></span>
              </div>
           </form>
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
 
    <a href="disponible.php#" class="go-top">
      <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>
<!--footer end-->
</section>
<script src="lib/jquery/jquery.min.js"></script> 
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>


<script type="text/javascript" >
  function compare_d(d1,d2)
{
   
    date1= new Date(d1.value);
    date2=new Date(d2.value);
    
//si la date d'arrvi??e et superieur a la date de depart en afficher un message d'erreur
if(date1>date2)
{  
    alert("Veuillez v??rifier que la deuxi??me date est sup??rieur ?? la premi??re!!");
    return false;
}
else
{  
   
    return true;
}

}
</script>
</body>

</html>
