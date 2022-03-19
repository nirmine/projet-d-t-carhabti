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
  <title>CARHABTI - login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">


  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
 
  <!-- Custom styles for this template -->
  <link href="css1/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
      <!-- Font Icon -->
      <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
</head>

<body>
  <div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Log-In</h2>
                    <form method="POST" class="register-form" id="register-form" action="login1.php" >
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="number" name="cin" id="cin" placeholder="Numéro de CIN" required maxlength="8"/>
                        </div>
                       
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="wd" id="wd" placeholder="Mot de passe" required />
                        </div>
                       
                        <button   type="submit" class="btn btn-round btn-info"> Se Connecter</button>
                        
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                   
                </div>
            </div>
        </div>
    </section>

</body>

</html>
