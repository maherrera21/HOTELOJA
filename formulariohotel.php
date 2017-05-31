<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from hoteles where id = ".$_GET["id"];
$query = $con->query($sql1);
$hoteles = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $hoteles=$r;
  break;
}

  }
?>

<?php if($hoteles!=null):?>

<form role="form" method="post" action="./actualizarhotel.php">
  <div class="form-group">
    <label for="hotelNom">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelNom; ?>" name="hotelNom">
  </div>
  <div class="form-group">
    <label for="hotelDir">Dirección</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelDir; ?>" name="hotelDir" >
  </div>
   <div class="form-group">
    <label for="hotelTelf">Teléfono</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelTelf; ?>" name="hotelTelf" >
  </div>
  <div class="form-group">
    <label for="hotelServ">Servicios</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelServ; ?>" name="hotelServ" >
  </div>
  <div class="form-group">
    <label for="hotelHab">Habitaciones</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelHab; ?>" name="hotelHab" >
  </div>
  <div class="form-group">
    <label for="hotelPrecioD">Precio Desde</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelPrecioD; ?>" name="hotelPrecioD" >
  </div>
  <div class="form-group">
    <label for="hotelPrecioH">Precio Hasta</label>
    <input type="text" class="form-control" value="<?php echo $hoteles->hotelPrecioH; ?>" name="hotelPrecioH" >
  </div>
<input type="hidden" name="id" value="<?php echo $hoteles->id; ?>">
  <button type="submit" class="btn btn-success glyphicon glyphicon-upload"> ACTUALIZAR</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>