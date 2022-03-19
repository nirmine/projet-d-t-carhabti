<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Acceuil G Client</title>

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
              <li> <a href="disponible.php">nouvelle reservation</a> </li>  
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
        <h3><i class="fa fa-tasks"></i> Liste Des Clients :</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row">
          
                <!-- /col-md-12 -->
                <div class="col-md-12 mt">
                  <div class="content-panel">
                    <table class="table table-hover">
                     
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><i class="fa fa-bookmark"></i> Nom & Prénom</th>
                          
                          <th><i class="fa fa-bullhorn"></i> Télèphone</th>
                          
                          <th><i class="fa fa-question-circle"></i> Plus D'infos </th>
                        </tr>
                      </thead>
                      <tbody>
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
//Recherche multi-critères des clients:a le droit à 3 critéres au mème temps
    switch($_POST['critere'])
    {    

          case 'nom':
            {   if ($_POST['choix']=='')
                echo "<script>alert(\"Veuillez saisir la valeur du critére recherchée  \")</script>";
                else
                {
                $requete = $db->prepare('SELECT * FROM client  WHERE nom =?');
                $requete->execute(array($_POST['choix']));
                }
            break;

            }  
          case 'prénom':
            {  

                $requete = $db->prepare('SELECT * FROM client  WHERE prenom=? ');
                $requete->execute(array($_POST['choix']));
                break;
            }
            case 'Numéro du Permis':
                {  
    
                    $requete = $db->prepare('SELECT * FROM client  WHERE numero_permis=? ');
                    $requete->execute(array($_POST['choix']));
                    break;
                }
         case 'cin':
                {   if (strlen($_POST['choix'])!= 8)
                    echo "<script>alert(\"Veuillez vérifier le numéro de la cin saisie :il doit contenir 8 chiffres  \")</script>";
                    else
                   { 
                    $requete = $db->prepare('SELECT * FROM client  WHERE cin=? ');
                    $requete->execute(array($_POST['choix']));
                    break;
                  }
                }
         case 'date de naissance':
                    {
                        $requete = $db->prepare('SELECT * FROM client  WHERE date_naissance=?');
                        $requete->execute(array($_POST['choix']));
                        break;
                    }
         case 'adresse':
                        {
                            $requete = $db->prepare('SELECT * FROM client  WHERE adresse= :adresse ');
                            $requete->execute(array('adresse'=>$_POST['choix']));
                            break;
                        }
         case 'téléphone':
                         {
                                $requete = $db->prepare('SELECT * FROM client  WHERE tel= :tel ');
                                $requete->execute(array('tel'=>$_POST['choix']));
                                break;
                        }  
        case 'mail':
                            {
                                $requete = $db->prepare('SELECT * FROM client  WHERE mail= :mail ');
                                $requete->execute(array('mail'=>$_POST['choix']));
                                break;
                            }
        case 'sexe':
                {
                     $requete = $db->prepare('SELECT * FROM client  WHERE sexe= :sexe ');
                     $requete->execute(array('sexe'=>$_POST['choix']));
                     break;
                 }
            
    }
     //affichage de la liste des clients
  

    
    $i=0 ;
while ($entree = $requete->fetch())
{
$i++ ;
echo ' <tr><td>'.$i .'</td>
<td>'.$entree['prenom'].' '.$entree['nom'].'</td> <td>'.$entree['tel']."</td><td><a href=\"ficheClient.php?c=".$entree['numero_client']."\"class=\"btn btn-theme02\">Fiche client</button>
<a href=\"historiqueReservations.php?c=".$entree['numero_client']."\"class=\"btn btn-theme03\"> Historique réservations</a></td></tr>";
 }
 
if($i==0)
{
  echo " <p> Pas de Client </p>";
}
$requete->closeCursor();  
   
    ?>
            </tbody>
                    </table>
                  </div>
                </div>
                <!-- /col-md-12 -->
              </div>
          </div>
        </div>
      </section
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
