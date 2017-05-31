
<?php

include "conexion.php";

$user_id=null;

$sql1= "select * from hoteles";
$query = $con->query($sql1);
?>

<table class="table table-bordered table-hover">

<thead>
	<th>Nombre</th>
	<th>Dirección</th>
	<th>Teléfono</th>
	<th>Servicios</th>
	<th>Habitaciones Disponibles</th>
	<th>Precio Desde</th>
	<th>Precio Hasta</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["hotelNom"]; ?></td>
	<td><?php echo $r["hotelDir"]; ?></td>
	<td><?php echo $r["hotelTelf"]; ?></td>
	<td><?php echo $r["hotelServ"]; ?></td>
	<td><?php echo $r["hotelHab"]; ?></td>
	<td><?php echo $r["hotelPrecioD"]; ?></td>
	<td><?php echo $r["hotelPrecioH"]; ?></td>

</tr>
<?php endwhile;?>
</table>


