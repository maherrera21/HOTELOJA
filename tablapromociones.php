
<?php

include "conexion.php";

$user_id=null;

$sql1= "select * from promociones";
$query = $con->query($sql1);
?>

<table class="table table-bordered table-hover">

<thead>
	<th>Hotel</th>
	<th>Descripción de Promoción</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id"]; ?></td>
	<td><?php echo $r["promoDes"]; ?></td>
</tr>
<?php endwhile;?>
</table>


