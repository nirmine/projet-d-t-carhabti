<?php session_start(); ?>
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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i> Modifier Coordonnées d'un client</h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="col-lg-12">
               
                <div class="form-panel">
                  <div class=" form">
                    <form class="cmxform form-horizontal style-form" action="<?php echo"modifierClientSup.php?numCli=".$_GET['numCli']."&stat=admn";?>" id="commentForm" name="form4" method="POST" onsubmit="javascript: return ajout_client(document.form4.cin,document.form4.numPermis,document.form4.tel,document.form4.mail);" >
                      <div class="form-group">

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
                $numeroClient=$_GET['numCli'];
                 $reponse=$db->prepare('SELECT * FROM client WHERE numero_client=?');
                 $reponse->execute(array($numeroClient));
                   while($client=$reponse->fetch())

                    {

                        echo"
                        <label class=\"control-label col-md-3\">Cin client</label>
                        <div class=\"col-md-3 col-xs-11\">                    
                            <input class=\" form-control\"  name=\"cin\" id=\"cin\" minlength=\"8\" maxlength=\"8\" type=\"text\" required value=\"".$client['cin']."\" disabled=\"disabled\"  >
                                                                  
                        </div>
                      </div>
                      <div class=\"form-group\">
                        <label class=\"control-label col-md-3\">Numéro du Permis:</label>
                        <div class=\"col-md-3 col-xs-11\">                    
                            <input class=\" form-control\"  name=\"numPermis\" id=\"numPermis\"  minlength=\"8\" maxlength=\"8\" type=\"text\" required value=\"".$client['numero_permis']."\"disabled=\"disabled\">                                                                
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Nom:</label>
                      <div class=\"col-md-3 col-xs-11\">       
                        <input class=\" form-control\" size=\"16\" type=\"text\" name=\"nom\" id=\"nom\" required value=\"".$client['nom']."\">                
                      </div>
                    </div>
                    
                    <div class=\"form-group\">
                    <label class=\"control-label col-md-3\">Prenom:</label>
                    <div class=\"col-md-3 col-xs-11\">     
                          <input class=\" form-control\" size=\"16\" type=\"text\" name=\"prenom\" id=\"prenom\" required value=\"".$client['prenom']."\">
                          
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Sexe:</label>
                        <div class=\"col-md-3 col-xs-11\">   
                          <select class=\" form-control\"  name=\"sexe\" id=\"sexe\" required value=\"".$client['sexe']."\">
                            <option>Femme</option>
                            <option>Homme</option>
                          </select>                                                                                
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Date De naissance:</label>
                      <div class=\"col-md-3 col-xs-11\">   
                          <input class=\" form-control\" size=\"16\" type=\"date\" name=\"naissance\" id=\"naissance\" required value=\"".$client['date_naissance']."\">                         
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Adresse:</label>
                      <div class=\"col-md-3 col-xs-11\">   
                          <input class=\" form-control\" size=\"16\" type=\"text\" name=\"adresse\" id=\"adresse\" required value=\"".$client['adresse']."\">
                          
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Télèphone:</label>
                        <div class=\"col-md-3 col-xs-11\">   
                          <input class=\" form-control\" size=\"16\" type=\"tel\" name=\"tel\" id=\"tel\" required value=\"".$client['tel']."\">
                          
                        </div>
                      </div>
                      <div class=\"form-group\">
                      <label class=\"control-label col-md-3\">Mail:</label>
                        <div class=\"col-md-3 col-xs-11\">   
                          <input class=\" form-control\" size=\"16\" type=\"email\" name=\"mail\" id=\"mail\" required value=\"".$client['mail']."\">                    
                        </div>
                      </div>
     
                      <div class=\"form-group\">
                          <div class=\"col-lg-offset-2 col-lg-10\">
                           <button class=\"btn btn-theme\" type=\"submit\" >save</button>";
                           
                    }?>
                          </div>
                       </div>
                    </form>
                  </div>
                </div>
            </div>
            </div>
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
        <a href="ajouterClient_ad.php#" class="go-top">
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
  <script src="lib/form-validation-script.js"></script>
  <script type="text/javascript" >
  function validation_champMail (ChampMail)
		{
		    if(ChampMail.value=="")
		    {
                       alert("Vous devez saisir une adresse mail valide, ce champ est obligatoire !");
                       return false;
                    }
					
                    aux1=ChampMail.value.lastIndexOf("@");
                    Login=ChampMail.value.substring(0,aux1);
                    aux2=ChampMail.value.lastIndexOf(".");
                    Extension=ChampMail.value.substring(aux2+1,ChampMail.length);
                    Domaine=ChampMail.value.substring(aux1+1,aux2);
                    
                    /* un login doit toujours avoir plus de 2 caractères */
                    if(Login.length<=2)
                    {
		       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }
                
                    /* un domaine doit toujours avoir plus de 1 caractère */
                    if(Domaine.length<=1)
                    {
                       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }

		    /* une extension doit toujours avoir 2 ou 3 caractères */
                    if((Extension.length<2)||(Extension.length>3))
                    {
                       alert("Ceci n'est pas une adresse mail valide !");
                       return false;
                    }
		    
                    return true;                    	    
    }
    function verif_pos(num)   //verifier si une entrée est un entier et et positif
{
    var c= parseInt(num);
    if(c>0)
    {
       
        return true ; 
       
    }
   
   return false;
}

function ajout_client(v1,v2,v6,v7)
{
    if(!(verif_pos(v1.value)))
    {
        alert("le cin doit étre un nombre de 8 chiffres positif");
        return false;
    }
    if(!(verif_pos(v2.value)))
    {
        alert("le numéro de permis doit étre un nombre de 8 chiffres positif");
        return false;
    }
    
    if(!(verif_pos(v6.value)))
    {
        alert("le numéro de télèphone doit étre un nombre de 8 chiffres positif");
        return false;
    }
    if(!(validation_champMail(v7)))
    {
        alert("veuillez saisir un mail sous la forme ....@domaine.extension ");
        return false;
    }
    return true;
}
</script>
</body>

</html>
