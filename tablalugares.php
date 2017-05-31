
<?php

include "conexion.php";

$user_id=null;

$sql1= "select * from lugares";
$query = $con->query($sql1);
?>

<table class="table table-bordered table-hover">

<thead>
	<th>Hotel</th>
	<th>Nombre del Lugar</th>
	<th>Descripción del Lugar</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id"]; ?></td>
	<td><?php echo $r["lugNom"]; ?></td>
	<td><?php echo $r["lugDes"]; ?></td>
</tr>
<?php endwhile;?>
</table>


