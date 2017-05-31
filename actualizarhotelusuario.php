<?php

if(!empty($_POST)){
	if(isset($_POST["hotelNom"]) &&isset($_POST["hotelDir"]) &&isset($_POST["hotelTelf"]) &&isset($_POST["hotelServ"]) &&isset($_POST["hotelHab"]) &&isset($_POST["hotelPrecioD"]) &&isset($_POST["hotelPrecioH"])){
		if($_POST["hotelNom"]!=""&& $_POST["hotelDir"]!=" "&&$_POST["hotelTelf"]!=""&&$_POST["hotelServ"]!=""&&$_POST["hotelHab"]!=""&&$_POST["hotelPrecioD"]!=""&&$_POST["hotelPrecioH"]!=""){
			include "conexion.php";
			
			$sql = "update hoteles set hotelNom=\"$_POST[hotelNom]\",hotelDir=\"$_POST[hotelDir]\",hotelTelf=\"$_POST[hotelTelf]\",hotelServ=\"$_POST[hotelServ]\",hotelHab=\"$_POST[hotelHab]\",hotelPrecioD=\"$_POST[hotelPrecioD]\",hotelPrecioH=\"$_POST[hotelPrecioH]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='./homeusuario.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='./homeusuario.php';</script>";

			}
		}
	}
}



?>