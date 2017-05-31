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

<html>
  <head>
  <link rel="shortcut icon" href="images/loja.ico"> 
    <title>HOTELOJA</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
  </head>
  <body>
    <?php include "./navadmin.php"; ?>
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
<div class="row">
<div class="col-md-12">
  
  


<?php include "./tablahotel.php"; ?>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  <?php include "./footeradmin.php"; ?>
</html>