<?php
ob_start();
session_start();
require_once 'dbconnect.php';

 // it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
}

$error = false;

if( isset($_POST['btn-login']) ) { 

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Por favor, introduzca su dirección de correo electrónico.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Por favor ingrese una dirección de correo electrónico válida.";
 }

if(empty($pass)){
   $error = true;
   $passError = "Por favor ingrese su contraseña.";
 }

  // if there's no error, continue to login
 
 if (!$error) {

   $password = hash('sha256', $pass); // password hashing using SHA256
if (!$error) {
    $res=mysql_query("SELECT idusers, userName, userPass FROM users WHERE userEmail='$email' AND rol='1'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['idusers'];
    header("Location: home.php");
  } else {
    $errMSG = "Credenciales incorrectas, intente de nuevo...";
  }
}
   $res=mysql_query("SELECT idusers, userName, userPass FROM users WHERE userEmail='$email' AND rol='0'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['idusers'];
    header("Location: homeusuario.php");
  } else {
    $errMSG = "Credenciales incorrectas, intente de nuevo...";
  }

}

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="images/loja.ico"> 
  <title>HOTELOJA</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 <?php include "./nav.php"; ?>
 <div class="container">

   <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <div class="col-md-8">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/slideshow/01.jpg" alt="Iglesia Catedral">
    </div>

    <div class="item">
      <img src="images/slideshow/02.jpg" alt="Parque Eolico">
    </div>

    <div class="item">
      <img src="images/slideshow/03.jpg" alt="Iglesia de San Francisco">
    </div>

    <div class="item">
      <img src="images/slideshow/04.jpg" alt="Puerta de la Ciudad">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
<br>
<br>
    <div class="form-group">
        <p class="lead text-justify">Loja se ha convertido en uno de los destinos turísticos preferidos por miles de viajeros de todo el mundo a pesar de ser una ciudad pequeña, cuyo clima está lejos de ser un idílico paraíso. Sin embargo se ha ido apropiando de un excelente número de atractivos culturales y sociales que la han ido poniendo poco a poco en un puesto muy relevante con una gran cantidad de atracciones para el disfrute de todo aquel que se anime a visitarla.</p> 
        <p class="lead text-justify">La mejor época para disfrutar Loja, en torno a diciembre, te permitirá disfrutar de las principales festividado?a ambrosiado?a ambrosia de la ciudad y algunos atractivos de gran valor como la Feria de la ciudad. Durante este mes Loja goza de un tiempo bastante bueno para pasear y sus múltiples parques y jardines están en el mejor momento.</p>
    </div>
    </div>

  </div>
  <div class="col-md-4">

   <div class="form-group">
     <h3 class="ing">INGRESAR</h3>
   </div>

   <div class="form-group">
     <hr />
   </div>

   <?php
   if ( isset($errMSG) ) {

    ?>
    <div class="form-group">
     <div class="alert alert-danger">
      <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
    </div>
  </div>
  <?php
}
?>

<div class="form-group">
 <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
  <input type="email" name="email" class="form-control" placeholder="Su Correo" value="<?php echo $email; ?>" maxlength="40" />
</div>
<span class="text-danger"><?php echo $emailError; ?></span>
</div>

<div class="form-group">
 <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
  <input type="password" name="pass" class="form-control" placeholder="Su Contraseña" maxlength="15" />
</div>
<span class="text-danger"><?php echo $passError; ?></span>
</div>

<div class="form-group">
 <hr />
</div>

<div class="form-group">
 <button type="submit" class="btn btn-block btn-primary" name="btn-login">INGRESAR</button>
</div>

<div class="form-group">
</div>

<div class="form-group">
<a class="btn btn-block btn-warning" href="./register.php" role="button">REGISTRATE</a>
</div>

</div>

</form>
</div> 

</div>

</body>
 <?php include "./footer.php"; ?>
</html>
<?php ob_end_flush(); ?>