<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM users WHERE idusers=".$_GET["idusers"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='./home.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='./home.php';</script>";

			}
}

?>