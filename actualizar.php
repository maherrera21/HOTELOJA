<?php

if(!empty($_POST)){
	if(isset($_POST["userName"]) &&isset($_POST["userPass"]) &&isset($_POST["userEmail"])){
		if($_POST["userName"]!=""&& $_POST["userPass"]!=" "&&$_POST["userEmail"]!=""){
			include "conexion.php";
			
			$sql = "update users set userName=\"$_POST[userName]\",userPass=\"$_POST[userPass]\",userEmail=\"$_POST[userEmail]\" where idusers=".$_POST["idusers"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='./home.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='./home.php';</script>";

			}
		}
	}
}



?>