<?php
  session_start();
  $_SESSION['numv']=$_GET['num'];//numero de la voiture
  $_SESSION['deb']=$_GET['deb'];
  $_SESSION['fin']=$_GET['fin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Carhabti-Historique des réservations</title>

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
          <li> <a href="disponible_ad.php">Nouvelle Réservation</a> </li>  
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
<!--main content-->
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Nouvelle Réservation:</h3>
        <div class="row mt">
         
          <div class="col-lg-12">
            <div class="form-panel">
              <form  action="nouvelleReservation_ad.php" method="POST" class="form-horizontal style-form" name="ajoutRes" onsubmit=" javascript: return nouvRes(document.ajoutRes.cin1,document.ajoutRes.cin2,document.ajoutRes.permis2,document.ajoutRes.tel2,document.ajoutRes.montant_payé,document.ajoutRes.numeroPaiement);">
                
                <div class="form-group">
                    <label class="control-label col-md-3">Cin du 1er conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="cin1" id="cin1" minlength="8" maxlength="8" type="text" required >
                                                              
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Cin/N° Passport du 2éme conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="cin2" id="cin2" minlength="8" maxlength="8"  type="text" >                                               
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Numéro permis du 2éme conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="permis2" id="permis2" minlength="8" maxlength="8"  type="text"  >                                               
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nom et Prénom du 2éme conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="nom2" id="nom2" minlength="3" maxlength="20" type="text"  >                                            
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3"> Tél du 2éme conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="tel2" id="tel2" minlength="8" maxlength="8" type="tel"  >
                                                              
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Date de naissance du 2éme conducteur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <input class=" form-control"  name="naissance2" id="naissance2" minlength="3" maxlength="20" type="date"  >                                            
                    </div>
                  </div>

                 
                  <div class="form-group">
                    <label class="control-label col-md-3">chauffeur</label>
                    <div class="col-md-3 col-xs-11">                    
                        <select name="chauffeur" class="btn btn-default">
                          <option>Oui</option>
                          <option>Non</option>
                        </select>
                                                             
                    </div>
                  </div>
        
                  <div class="form-group">
                    <label class="control-label col-md-3">Mode de paiement :</label>
                    <div class="col-md-3 col-xs-11">                    
                        <select name="modePaiement" class="btn btn-default" required>
                          <option>Espèces</option>
                          <option>Carte Bancaire</option>
                          <option>Chéque</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-11">                                       
                        <input class=" form-control" type="text"   name="numeroPaiement"placeholder="Numéro de chèque ou CB">                                     
                    </div>
                  </div>
 

                  <div class="form-group">
                    <label class="control-label col-md-3">Montant payé:</label>
                    <div class="col-md-3 col-xs-11">
                      <input class=" form-control" type="text" required value="0" name="montant_payé">
                      
                    </div>
                  </div>

             <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                  <input  class="btn btn-theme" type="submit">
                      <input class="btn btn-theme04" type="reset">
                      </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
      
       
        <!-- row -->
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
        <a href="accueilAdmin.php#" class="go-top">
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
 
  <script src="lib/advanced-form-components.js"></script>
  <script type="text/javascript">

function verif_pos(num)   //verifier si une entrée est un entier et positif
{
    var c= parseInt(num);
    if(c>0)
    {
       
        return true ; 
       
    }
    else
    { if(c==NAN)
        return true;
        else 
        return false;
    }
}
  function nouvRes(cin1,cin2,permis2,tel2,numeroPaiment,montant_payé)
  {
    if(!(verif_pos(cin1.value)))
    {
      alert(" Vérifier le Numéro de CIN du 1er conducteur");
      return false;
    }
    if(!(verif_pos(cin2.value))&&(cin2.value!=0))
    {
      alert(" Vérifier le Numéro de CIN du 2éme conducteur");
      return false;
    }
    if(!(verif_pos(permis2.value)))
    {
      alert(" Vérifier le Numéro de permis du 2éme conducteur");
      return false;
    }
    if(!(verif_pos(tel2.value)))
    {
      alert(" Vérifier le Numéro de téléphone du 2éme conducteur");
      return false;
    }
    if(!(verif_pos(numeroPaiement.value)))
    {
      alert(" Vérifier le Numéro de paiement ");
      return false;
    }
    if(!(verif_pos(montant_payé.value)))
    {
      alert(" Vérifier la valeur du montant payé");
      return false;
    }
    else
    {
      return true;
    }
  }
</script>

</body>

