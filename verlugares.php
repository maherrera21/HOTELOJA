<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
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
    <?php include "./nav.php"; ?>
     <div class="container">
<div class="row">
<div class="col-md-12">
  
  


 <img src="images/turi.jpg" alt="promo">
</div>
</div>
<br>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-12">
  
  


<?php include "./tablalugares.php"; ?>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  <?php include "./footer.php"; ?>
</html>