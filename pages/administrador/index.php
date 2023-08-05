<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/css1.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
    
<link href="css/bootstrap-responsive.css" rel="stylesheet">
    

<div class="principal">

<div class="logo-login">
  <br>
  <img src="images/photo.jpg" alt="" class="logo">
</div>

<div class="login-page">
    <div class="text-center">
       <h1>Bienvenido</h1>
       <p>Iniciar sesión </p>
     </div>
     <?php echo display_msg($msg); ?>


      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Usario</label>
              <input type="name" class="form-control" name="username" placeholder="Usario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Entrar</button>
        </div>
        <br>
        
    </form>
</div>
</div> 

<?php include_once('layouts/footer.php'); ?>
