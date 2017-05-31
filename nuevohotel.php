<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
 }
 include_once 'dbconnect.php';
if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 $ses=$_SESSION['user'];
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE idusers=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $nombre = trim($_POST['nombre']);
  $nombre = strip_tags($nombre);
  $nombre = htmlspecialchars($nombre);
  
  $direccion = trim($_POST['direccion']);
  $direccion = strip_tags($direccion);
  $direccion = htmlspecialchars($direccion);
  
  $telefono = trim($_POST['telefono']);
  $telefono = strip_tags($telefono);
  $telefono = htmlspecialchars($telefono);
  
  $habitacion = trim($_POST['habitacion']);
  $habitacion = strip_tags($habitacion);
  $habitacion = htmlspecialchars($habitacion);
  
  $precioD = trim($_POST['precioD']);
  $precioD = strip_tags($precioD);
  $precioD = htmlspecialchars($precioD);

  $precioH = trim($_POST['precioH']);
  $precioH = strip_tags($precioH);
  $precioH = htmlspecialchars($precioH);
  


  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO hoteles(hotelNom,hotelDir,hotelTelf,hotelHab,hotelPrecioD,hotelPrecioH,idusers) VALUES('$nombre','$direccion','$telefono','$habitacion','$precioD','$precioH','$ses')";
   $res = mysql_query($query);

    
   if ($res) {
    $errTyp = "éxito";
    $errMSG = "Hotel Registrado Correctamente";
   } else {
    $errTyp = "peligro";
    $errMSG = "Algo salió mal, vuelve a intentarlo más tarde ..."; 
   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/loja.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOTELOJA</title>
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
               <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;SALIR</a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
<div class="container">

 <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-6 col-md-offset-3">
        
         <div class="form-group">
             <h2 class="">Agregar Nuevo Hotel</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
             <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" maxlength="100" />
                </div>
               
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
             <input type="text" name="direccion" class="form-control" placeholder="Ingrese direccion" maxlength="100" />
                </div>
              
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
             <input type="tel" name="telefono" class="form-control" placeholder="Ingrese telefono" maxlength="100" />
                </div>
           
            </div>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
           
                  <?php $sqlx = "select * from habitacion";
                  $resx=mysql_query($sqlx, $conn) or die(mysql_error());
                  $j=0;
                  while($rowx = mysql_fetch_assoc($resx)){
                  $item[$j]=$rowx["habTipo"];
                  ?>
                  <input type="checkbox" name="habitacion" value="<?php echo $habTipo[$j];?>" />
                  <?php echo $item[$j];?><br/> 

                  <?php $i++;
                  }
             ?>
                </div>
               
            </div>


            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
             <input type="text" name="precioD" class="form-control" placeholder="Ingrese precio más bajo" maxlength="100" />
                </div>
           
            </div>

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
             <input type="text" name="precioH" class="form-control" placeholder="Ingrese precio más alto" maxlength="100" />
                </div>
           
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">REGISTRAR</button>
            </div>
            
            <div class="form-group">
            </div>
            
            <div class="form-group">
             <a class="btn btn-block btn-warning" href="./homeusuario.php" role="button">VOLVER</a>
</div>
            </div>
        
        </div>
   
    </form>
    </div> 

</div>

</body>
<?php include "./footerusuario.php"; ?>
</html>
<?php ob_end_flush(); ?>