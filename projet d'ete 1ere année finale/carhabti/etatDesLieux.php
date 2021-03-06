<?php
session_start();
$_SESSION['num']=$_GET['num'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CARHABTI-Etat des lieux</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
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
            <li>


            <a data-toggle="dropdown" class="dropdown-toggle" href="mail.php">
            <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme"></span>
              </a>

           
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
              <li> <a href="disponible.php">Disponibilit??s & Reservations</a> </li>  
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
        <h3><i class="fa fa-angle-right"></i>Etat Des Lieux ?? la remise du voiture</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <form class="form-horizontal style-form" method="post" name="form1" action="intermediaire.php"onsubmit="javascript: return etat(document.form1.kilometrageRetour,document.form1.nbrEraflure,document.form1.prixEraflure,document.form1.nbrBosse,document.form1.prixBosse,document.form1.nbrManque,document.form1.prixManque);">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Consommation</h4>
             
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kilom??trage Retour :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="kilometrageRetour">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Niveau Carburant Retour</label>
                  <div class="col-sm-10">
                    <select name="niveauCarburant"class="form-control" required >
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        </select>
                    
                  </div>
                </div>

            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Etat V??hicule </h4>
             
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Eraflure:</label>
                <div class="col-sm-10">
                  <label >Nombre:</label>
                <input type="text"  required name="nbrEraflure">
                <br> <label >Emplacement:</label>
                  <input type="text" name="placeEraflure" ><br>
                  <p>(Sous forme:place1/place2/...)</p>
                  <label >Charges ?? payer:</label>
                  <input type="text" name="prixEraflure">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Bosse:</label>
                <div class="col-sm-10">
                  <label >Nombre:</label>
                <input type="text"  required name="nbrBosse">
                <br> <label >Emplacement:</label>
                  <input type="text" name="placeBosse" ><br>
                  <p>(Sous forme:place1/place2/...)</p>
                  <label >Charges ?? payer:</label>
                  <input type="text" name="prixBosse">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Manque :</label>
                <div class="col-sm-10">
                  <label >Nombre:</label>
                <input type="text"  required name="nbrManque">
                <br> <label >Emplacement:</label>
                  <input type="text" name="placeManque" ><br>
                  <p>(Sous forme:place1/place2/...)</p>
                  <label >Charges ?? payer:</label>
                  <input type="text" name="prixManque">
                </div>
              </div>
              
          </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Cas D'accident</h4>
             
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Fautif(ve)? :</label>
                  <div class="col-sm-10">
                 
              <label class="checkbox-inline">
                <input type="radio" name="fautif" value="oui" >oui
                </label>
              <label class="checkbox-inline">
                <input type="radio" name="fautif" value="non" >Non
                </label>
              
              
                  </div>
                </div>
               

            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Papiers et documents :</h4>
             
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Manque des papiers ?? la remise ? :</label>
                  <div class="col-sm-10">
                 
              <label class="checkbox-inline">
                <input type="radio" name="manquePapiers" value="oui" required >oui
                </label>
              <label class="checkbox-inline">
                <input type="radio" name="manquePapiers" value="non" required >Non
                </label>
              
              
                  </div>
                </div>
                
                <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
  
              <input type="submit" name="validation" value="Save" class="btn btn-theme">
            </div> 
            </div>

            </div>
          </div>
          <!-- col-lg-12-->
        </div>
    </form>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="form_component.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>
 <!-- <script type="text/javascript" src="validforms.js"></script>-->
 <script type="text/javascript">
  function verif_pos(num)   //verifier si une entr??e est un entier et et positif
{
    var c= parseInt(num);
    if(c>0)
    {
       
        return true ; 
       
    }

   return false;
}
  function etat(kilometrage,nEraflure,prixEraflure,nBosse,prixBosse,nManque,prixManque)
  {
    if(!(verif_pos(kilometrage.value)))
    {
      alert("V??rifier le kilom??trage de Retour saisie");
      return false;
    }
    if(nEraflure.value<0)
    {
      alert("V??rifier le nombre de pi??ce qui ont une panne de type Eraflures saisies");
      return false;
    }
    if(nBosse.value<0)
    {
      alert("V??rifier le nombre de pi??ce qui ont une panne de type Bosse saisies");
      return false;
    }
    if(verif_pos(nManque.value)<0)
    {
      alert("V??rifier le nombre de pi??ce qui ont une panne de type Manque saisie");
      return false;
    }
    if((prixManque.value!=NAN)&&(!(verif_pos(prixManque.value))))
    {
      alert("V??rifier le prix de r??paration des pi??ce qui ont une panne de type Manque saisie");
      return false;
    }
    if((prixBosse.value!=NAN)&&(!(verif_pos(prixBosse.value))))
    {
      alert("V??rifier le prix de r??paration des pi??ce qui ont une panne de type Bosse saisie");
      return false;
    }
    if((prixEraflure.value!=NAN)&&(!(verif_pos(prixEraflure.value))))
    {
      alert("V??rifier le prix de r??paration des pi??ce qui ont une panne de type Eraflure saisie");
      return false;
    }
    else
    {
      return false;
    }
  }
</script>
</body>

</html>
