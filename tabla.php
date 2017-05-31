<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from users";
$query = $con->query($sql1);
?>

<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Email</th>
	<th>Contraseña</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["userName"]; ?></td>
	<td><?php echo $r["userEmail"]; ?></td>
	<td><?php echo $r["userPass"]; ?></td>
	<td style="width:400px;">
		<a href="./editar.php?idusers=<?php echo $r["idusers"];?>" class="btn btn-sm btn-success glyphicon glyphicon-pencil"> EDITAR</a>
		<a href="#" id="del-<?php echo $r["idusers"];?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove"> ELIMINAR</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./eliminar.php?iduers="+<?php echo $r["idusers"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>


