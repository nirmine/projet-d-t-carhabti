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
          <li > </li>
          <li ><a href=""> </a> </li>
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
          <li><a href="ajout_ad.php">Ajouter une v??hicule</a> </li>
          <li><a href="delete_ad.php">Supprimer une voiture </a> </li>
          <li><a href="modifier_ad.php">Modifier des donn??es</a> </li>
          <li><a href="reparation_ad.php">Gestion de r??paration et de r??change des pi??ces</a> </li>
          
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-th"></i>
          <span>listes des donn??es</span>
          </a>
        <ul class="sub">
          <li><a href="listeClient_ad.php">liste des Clients</a></li>
          <li><a href="listeFacturesImpayes_ad.php">liste factures & impay??s</a></li>
          <li><a href="listeReservations_ad.php">liste des r??servations</a></li>
          <li><a href="listeRecuperations_ad.php">liste des r??cuperations</a></li>
          <li><a href="affiche_ad.php">Pi??ces repar??s pour une voiture donn??e</a></li>
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
        <li><a href="modif_fonct.php">Modifier des donn??es</a></li><!-- mise ?? jour de l'??tat de pr??sence du fonctionnaire -->
                      
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
    <h3><i class="fa fa-angle-right"></i> Modifier des informations</h3>
       
       <div class="row mt">
       <div class="col-lg-12">
         <div class="form-panel">
           <h4 class="mb"><i class="fa fa-angle-right"></i> Modifier les donn??es d'une vehicule</h4>
           <form  action="modifier1_ad.php" method="POST"  name="form1" onsubmit="javascript : return modif_v(document.form1.serie,document.form1.enregistrement);">
             <div class="form-group">
               <div>
               <label class="control-label col-md-3">S??rie</label> 
                 <input type="number" name="serie" id="serie" class="form-control round-form" placeholder="S??rie" maxlength="3" minlength="2" required>
               </div>
               <div>
               <label class="control-label col-md-3">Enregistrement</label> 
                 <input type="number" name="enregistrement" id="enregistrement" class="form-control round-form" placeholder="Enregistrement" maxlength="4" minlength="1" required>
               </div>
                 <div>
                 <div>
                    <label class="control-label col-md-3">Mod??le de la voiture</label> 
                    <input type="text" name="model" id="model"class="form-control round-form" placeholder="Mod??le" required>
                 </div>
                 <label class="control-label col-md-3">Choisissez le crit??re que vous voulez modifier</label> 
                 <select name="modif" id="modif" class="form-control round-form">
                     <option value="marque">Marque</option>
                     <option value="carburant">carburant</option>
                     <option value="categorie">categorie</option>
                     <option value="couleur">Couleur</option>
                  
                     <option value="visite">Date de visite technique</option>
                     <option value="autorisation">autorisation</option>
                     <option value="assurance">Assurance</option>
                     <option value="vidange">Vidange</option>
                     <option value="prix_location">Prix de location</option>
                     <option value="prix_vente">Prix de vente</option>
                     <option value="kilometrage">Kilom??trage</option>
                     <option value="prix">Prix</option>
                     <option value="portes">Nombre des portes</option>
                     
                 </select>
                 </div>
                    <div>
                    <label class="control-label col-md-3">Donnez la nouvelle valeur</label> 
                    <input type="text" name="mod" id="mod"class="form-control round-form" placeholder="La nouvelle valeur" required>
                 </div>
                 <div>
                 <label class="control-label col-md-3" > <strong>NB:</strong> les dates doivent etre de la forme yyyy-mm-dd</label> 
                 <br>
                </div>
                 <div>
                 <input type="submit" value="Modifier" class="btn btn-round btn-success" >
                 </div>
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
 
    <a href="modifier_ad.php#" class="go-top">
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
function verif_pos(num)   //verifier si une entr??e est un entier et  positif
{
    var c= parseInt(num);
    if(c>0)
    {
       
        return true ; 
       
    }
   
   return false;
}
function modif_v(v1,v2)  //validation des donn??es du formulaire de mod??fication des donn??es d'une voiture
{
 
    if(!(verif_pos(v1.value)) || (v1.value<10) || (v1.value>999))
    {
        alert("verifier la s??rie de voiture saisie");
        return false;
    }
    if(!(verif_pos(v2.value)) || (v2.value<1) || (v2.value>9999))
    {
        alert("verifier l'enregistrement de la voiture saisie");
        return false;
    }

    return true;
}

</script>
</body>

</html>