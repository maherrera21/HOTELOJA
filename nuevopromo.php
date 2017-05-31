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
  $descripcion = trim($_POST['descripcion']);
  $descripcion = strip_tags($descripcion);
  $descripcion = htmlspecialchars($descripcion);

  $hotel = trim($_POST['hotel']);
  $hotel = strip_tags($hotel);
  $hotel = htmlspecialchars($hotel);
  

  


  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO promociones(promoDes,id) VALUES('$descripcion','$hotel')";
   $res = mysql_query($query);

    
   if ($res) {
    $errTyp = "éxito";
    $errMSG = "Promoción Registrada Correctamente";
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
             <h2 class="">Agregar Nueva Promoción</h2>
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
             <input type="text" name="descripcion" class="form-control" placeholder="Ingrese descripción de la promoción" maxlength="100" />
                </div>
               
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
           
                <select class="form-control" name="hotel" > 
                <?php
                $hotel = mysql_query("SELECT * FROM hoteles WHERE idusers=".$_SESSION['user']); 
                while($depto = mysql_fetch_array($hotel)) { 
                ?> 
                <option value = " <?php echo $depto['id']; ?> "><?php echo $depto['hotelNom']; ?></option> 
                <?php 
                }
                ?> 
                </select> 
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