<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CarHabti-Ajouter une voiture</title>

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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />

 
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
    <section class="wrapper site-min-height">
        
       
          <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Ajouter une vehicule</h4>
              <form  action="ajout1.php" method="POST"  name="form1" enctype="multipart/form-data" onsubmit="javascript:return ajout_v(document.form1.sr,document.form1.enregistrement,document.form1.visit,document.form1.kilo,document.form1.prix,document.form1.assurance,document.form1.auto,document.form1.porte,document.form1.prix_v);">
                <div class="form-group">
                  
                 
                        <label class="control-label col-md-3">Marque</label> 
                       
                          <input class=" form-control" size="16" type="text" name="mar" id="mar" required>                         
                         
                       
                          <label class="control-label col-md-3">Couleur</label>
                          
                            
                                <input class=" form-control" size="16" type="text" name="color" id="color" required>                         
                   
                          <label class="control-label col-md-3">Modèle</label>
                        
                          <input class=" form-control" size="16" type="text" name="model" id="model" required>                         
                         
                          <label class="control-label col-md-3">Carburant</label>
                         
                        <select name="carb" id="carb" class="form-control">
                            <option value="diesel">Diesel</option>
                            <option value="essence">Essence</option>
                            <option value="gazole">Gazole</option>
                            <option value="GPL">GPL</option>
                            <option value="GNV">GNV</option>
                    </select>           
                     
                                  <label class="control-label col-md-3">Categorie</label>
                             
                        <select name="catego" id="catego" class="form-control">
                            <option value="citadine">citadine</option> 
                            <option value="economique">économique</option> 
                            <option value="compacte">compacte</option>
                            <option value="break_compacte">Break compacte</option>
                            <option value="intermediaire">Intérmediaire</option>
                            <option value="break_intermediaire">Break Intérmediaire</option>
                            <option value="standard">Standard</option>
                            <option value="break_standard">Break Standard</option>
                            <option value="familiale">Familiaile</option>
                            <option value="break_grand_modele">Break Grand Modèle</option>
                            <option value="luxe">LUXE</option>
                            <option value="decapotable">Décapotable</option>
                            <option value="SUV">SUV</option>
                            <option value="monospace">Monospace</option>
                      </select>
                       
                              <label class="control-label col-md-3">Série</label>
                             
                          <input class=" form-control" size="16" type="text" name="sr" id="sr" required>                         
                      
                            <label class="control-label col-md-3">Enregistrement</label>
                            
                          <input class=" form-control" size="16" type="text" name="enregistrement" id="enregistrement" required>                         
                        
                            <label class="control-label col-md-3">Date de visite technique</label>
                            
                                <input class=" form-control" size="16" type="date" name="visit" id="visit" required>                         
                  
                            <label class="control-label col-md-3">Kilomètrage</label>
                           
                          <input class=" form-control" size="16" type="number" name="kilo" id="kilo" required>                         
                           
                            <label class="control-label col-md-3">Prix de location par jour</label>
                           
                                 <input class=" form-control" size="16" type="number" name="prix" id="prix" required>                         
                               
                       
                     
                        <label class="control-label col-md-3">Date de mise à jour de l'assurance</label>
                      
                          <input class=" form-control" size="16" type="date" name="assurance" id="assurance" required>                         
                       
                        <label class="control-label col-md-3">Date de renouvellement des autorisations</label>
                       
                          <input class=" form-control" size="16" type="date" name="auto" id="auto" required> 
                                                
                   
                        <label class="control-label col-md-3">Nombre des portes</label>
                        
                          <input class=" form-control" size="16" type="number" name="porte" id="porte" required  maxlength="1">                         
                       
                        <label class="control-label col-md-3">Prix de vente (dt) </label>
                        
                          <input class=" form-control" size="16" type="number" name="prix_v" id="prix_v" required>                         
               
                          <label class="control-label col-md-3">Image Voiture </label>
                         
                        <input type="file" name="image1" class="default" />
                      
                    <input type="submit" value="ajouter" class="btn btn-round btn-success" >
                
                </div>
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
 
    <a href="ajout.php#" class="go-top">
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
<script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->
<script type="text/javascript">
      function verif_pos(num)   //verifier si une entrée est un entier et et positif
      {
           var c= parseInt(num);
          if(c>0)
         {
       
           return true ; 
       
         }

   return false;
    }
      function ajout_v(serie,enregistrement,visite,kilometrage,prix_location,assurance,autorisation,porte,prix_vente)
      {
        if((!(verif_pos(serie.value)))||(serie.value<10)||(serie.value>999))
        {
          alert("Vueillez vérifier la série de votre voiture");
          return false;
        }
        if((!(verif_pos(enregistrement.value)))||(enregistrement.value<1)||(enregistrement.value>9999))
        {
          alert("Vueillez vérifier la série de votre voiture");
          return false;
        }
        if(!(verif_pos(kilometrage.value)))
        {
          alert("Vueillez vérifier le kilométrage");
          return false;
        }
        if(!(verif_pos(prix_location.value)))
        {
          alert("Vueillez vérifier le prix de location de votre voiture");
          return false;
        }
        if((!(verif_pos(porte.value))) || (porte>4))
        {
            alert("Vueillez vérifier le nombre de porte de votre voiture");
            return false;
        }
        if(!(verif_pos(prix_vente.value)))
        {
            alert("Vueillez vérifier le prix de vente de votre voiture");
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
