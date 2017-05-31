
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/loja.ico"> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
      
<div class="col-md-12">
<p class="lead text-justify"><h2><strong>CONTACTO</strong></h2></p>
<br>
<ul class="lead text-justify"><strong>Dirección:</strong>
<ul><h4>Jose A. Eguiguren 16-50 entre 18 de Noviembre y Av. Universitaria</h4> </ul>
 <ul><h4>Loja</h4></ul>
 <ul><h4>Loja</h4></ul>
 <ul><h4>Ecuador</h4></ul></ul>
<ul class="lead text-justify"><strong>Teléfono:</strong>
<ul><h4>J(593) 7 2584912 y 7 2581428</h4> </ul>
</ul>
<ul class="lead text-justify"><strong>Móvil:</strong>
<ul><h4>098 392 0905</h4> </ul>
</div>

</form>
</div> 

</div>

</body>
<?php include "./footer.php"; ?>
</html>
<?php ob_end_flush(); ?>