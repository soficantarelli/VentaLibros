<?php
require "conexion.php";

if($_GET["action"] == "buscarNombreCliente"){
	$nrocliente = $_GET['nrocliente'];
	$cliente = $db->query("SELECT * FROM `clientes` WHERE `clientes`.`nro_documento` = '".$nrocliente."'");

	$datos = $cliente->fetch_row();
	$nombre = $datos[1]." ".$datos[2];
	$socio = $datos[3];
	$puntos= $datos[4];

	$factura = $db->query("SELECT MAX(id_factura) FROM `facturas`");
	if(!$factura){
		$nrofactura = 1;
	}
	else {
		$fila = $factura->fetch_row();
		$nrofactura = $fila[0] + 1;
	}

	if ($datos[1] == '') {
		$nombre = "Cliente inexistente - Verifique";
		$socio = "";
		$puntos = "";
		$nrofactura = "";
	}

	echo	'<input name="nombrecliente" type="text" value="'.$nombre.'" size="50%" disabled>;
			<input name="numerosocio" type="text" value="'.$socio.'"   size="20%" disabled>;
			<input name="numerofactura" type="text" value="'.$nrofactura.'"   size="20%" disabled>;
			<input name="puntos_disponibles" type="text" value="'.$puntos.'"   size="20%" disabled>';
}

?>
