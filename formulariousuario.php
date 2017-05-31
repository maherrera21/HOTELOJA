<?php
include "conexion.php";

$ses=$_SESSION['user'];

$user_id=null;
$sql1= "select * from users where idusers = ".$ses;
$query = $con->query($sql1);
$users = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $users=$r;
  break;
}

  }
?>

<?php if($users!=null):?>

<form role="form" method="post" action="./actualizarusuario2.php">
  <div class="form-group">
    <label for="userName">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $users->userName; ?>" name="userName" required>
  </div>
  <div class="form-group">
    <label for="userEmail">Email</label>
    <input type="email" class="form-control" value="<?php echo $users->userEmail; ?>" name="userEmail" >
  </div>
   <div class="form-group">
    <label for="userPass">Contraseña</label>
    <input type="text" class="form-control" value="<?php echo $users->userPass; ?>" name="userPass" >
  </div>
<input type="hidden" name="idusers" value="<?php echo $users->idusers; ?>">
  <button type="submit" class="btn btn-success glyphicon glyphicon-upload"> ACTUALIZAR</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>