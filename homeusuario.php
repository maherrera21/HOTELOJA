<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE idusers=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/loja.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOTELOJA <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <?php include "./navusuario.php"; ?>
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
       
        <div id="navbar" class="navbar-collapse collapse">
        
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hola  <?php echo $userRow['userEmail']; ?>&nbsp;<span ></span></a>
              <ul class="dropdown-menu">
               
              </ul>
               <li><a class="jo" href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;SALIR</a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

<div class="container">

   <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  <div class="col-md-12">

   <div class="form-group">
     <h3 class="ing"> <strong>BIENVENIDO AL SISTEMA DE GESTIÓN HOTELES DE LOJA | USUARIO</strong></h3>
   </div>
<div class="form-group">
        <p class="lead text-justify">Loja se ha convertido en uno de los destinos turísticos preferidos por miles de viajeros de todo el mundo a pesar de ser una ciudad pequeña, cuyo clima está lejos de ser un idílico paraíso. Sin embargo se ha ido apropiando de un excelente número de atractivos culturales y sociales que la han ido poniendo poco a poco en un puesto muy relevante con una gran cantidad de atracciones para el disfrute de todo aquel que se anime a visitarla.</p> 
        <p class="lead text-justify">La mejor época para disfrutar Loja, en torno a diciembre, te permitirá disfrutar de las principales festividades de la ciudad y algunos atractivos de gran valor como la Feria de la ciudad. Durante este mes Loja goza de un tiempo bastante bueno para pasear y sus múltiples parques y jardines están en el mejor momento.</p>
    </div>
   
</div>

</form>
</div> 

</div>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
<?php include "./footerusuario.php"; ?>
</html>
<?php ob_end_flush(); ?>