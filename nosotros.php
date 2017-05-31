
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
        <p class="lead text-justify">El propósito general del proyecto será desarrollar un sitio web para la gestión de hoteles y sus lugares turísticos más cercanos de la ciudad de Loja.

        </p>
        <li class="lead text-justify">Ofrecer información sobre ubicación, precios, servicios y otros productos característicos de un hotel.</li>
        <li class="lead text-justify">Facilitar la búsqueda de hoteles para los usuarios en cualquier parte del mundo.</li>
      </div>

    </form>
  </div> 

</div>

</body>
<?php include "./footer.php"; ?>
</html>
<?php ob_end_flush(); ?>