<?php 
	require 'conexion.php';
	require 'funcionesAuxiliares.php';
	require 'fpdf/fpdf.php';

	sleep(5);
// **********************************************************************************************
// Abro el archivo PDF
// **********************************************************************************************
    $pdf = new FPDF();
	$pdf -> SetCreator("Sofia I. Cantarelli");
	$pdf -> SetAuthor("Sofia I. Cantarelli");

// **********************************************************************************************
	$letra 	= 'C';
	$tipo_comprobante = 11;
	$c_domicilio = "domicilio";

	$nrofactura = $_GET["var"];

	while (empty($consulta_facturas)) {
		$consulta_facturas = $db->query('SELECT * FROM `facturas` WHERE id_factura = '.$nrofactura);
	}
	if (!empty($consulta_facturas)) {
		$fila_facturas = $consulta_facturas->fetch_row();
		$nrocliente = $fila_facturas[1];
		$fecha_factura = $fila_facturas[2];
		$timestamp = strtotime($fecha_factura);
		$fecha_factura = date("d-m-Y", $timestamp);

		$consulta_clientes = $db->query('SELECT * FROM `clientes` WHERE nro_documento = '.$nrocliente);
		if($consulta_clientes){
			$fila_clientes = $consulta_clientes->fetch_row();
			$c_nombre = $fila_clientes[2].', '.$fila_clientes[1];
			$nro_socio = $fila_clientes[3];
		}else{
			echo("Error");
			Header ("Location: listadoFactura.php");
		}
		
	}

	$nrofactura = llenacadena($nrofactura,8,0);
	
// **********************************************************************************************
// Le agredo una hoja por cada factura
// **********************************************************************************************

	for ($copias=0;$copias<=1;$copias++) {	    // numero de copias
		switch ($copias) {
			case  0: $copia_factura = "ORIGINAL";		break;
			case  1: $copia_factura = "DUPLICADO";		break;
		} // Cierro  switch ($tipoflete) 

    $pdf -> AddPage();

// --------------------------------------------------------------------------------------------
// Lineas formulario 
	$pdf -> Line( 10,   3, 195,   3);
	$pdf -> Line( 92,  18, 115,  18);		
	$pdf -> Line( 92,   3,  92,  18);
	$pdf -> Line(115,   3, 115,  18);
	$pdf -> Line( 10,  27, 195,  27);
	$pdf -> Line( 10,  50, 195,  50);
	
	$pdf -> Line( 10,   3,  10, 260);
	$pdf -> Line(195,   3, 195, 260);
	$pdf -> Line( 10, 260, 195, 260);
	
// ---------------------------------------------------------------------------------------------------
// Datos libreria - Datos cabecera factura
	$pdf -> setfont('Arial', 'B', 28.0); $pdf -> text(100, 12 , $letra);
	$pdf -> setfont('Arial', 'B', 14.0); $pdf -> text(135, 12, "Factura: 0001-$nrofactura");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 95, 16, "Cod.N# $tipo_comprobante");

	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(140, 20, "Factura Contado");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(140, 24, "Fecha Factura: $fecha_factura");

	$pdf -> setfont('Arial', 'B', 22.0); $pdf -> text( 28, 12, "Libreria ABC");
	$pdf -> setfont('Arial', 'B',  9.0); $pdf -> text( 32, 20, "Domicilio: Calle X N� 123");
	$pdf -> setfont('Arial', 'B',  9.0); $pdf -> text( 39, 24, "5000 - C�rdoba");	

// ---------------------------------------------------------------------------------------------------
// Datos del cliente
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 15, 32, "Se�ores:   $c_nombre");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 15, 37, "Domicilio: $c_domicilio");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(140, 32, "N� Cliente: $nrocliente");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 15, 47, "Condicion: Consumidor Final");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(140, 37, "CP 5000 - C�rdoba");	
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(140, 47, "Nro. Socio: $nro_socio");

// ---------------------------------------------------------------------------------------------------
// Detalle factura 
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 15, 60, "Cantidad");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text( 50, 60, "Descripci�n");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(120, 60, "Precio Unit.");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(147, 60, "Descuento");
	$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(178, 60, "Importe");

	$y = 13;
	$total_factura = 0;
	
	$consulta_productos = $db->query('SELECT * FROM `descripciones` WHERE id_factura = '.$nrofactura);
	if (!empty($consulta_productos)) {
		while($fila_productos = $consulta_productos->fetch_row()){
		    $pdf -> setfont('Courier', 'B', 10.0);	$pdf -> text( 20, $y * 5, llenacadena($fila_productos[3],3,' ')); 
			$pdf -> setfont('Arial', 'B', 10.0);	$pdf -> text( 50, $y * 5, $fila_productos[2]);
			$precio_unitario = formatoPrecio862($fila_productos[4]);
			$pdf -> setfont('Courier', 'B', 10.0);	$pdf -> text(122, $y * 5, llenacadena($precio_unitario,8,' ')); 
			if ($fila_productos[5] == 0) {
				$importe = $fila_productos[3] * $fila_productos[4];
				$total_factura = $total_factura + $importe;
			}
			else {
			$pdf -> setfont('Arial', 'B', 10.0); $pdf -> text(154, $y * 5, "$fila_productos[5] %");
				$importe = $fila_productos[3] * $fila_productos[4] * $fila_productos[5] / 100;
				$total_factura = $total_factura + $importe;
			}
			$importe = formatoPrecio862($importe);
			$pdf -> setfont('Courier', 'B', 10.0);	$pdf -> text(170, $y * 5, llenacadena($importe,10,' ')); 
			$y = $y + 1;
		}
	}	

// ----------------------------------------------------------------------------------------------------
// Total factura
	$total_factura = formatoPrecio862($total_factura);
    $pdf -> setfont('Arial',   'B', 14.0); $pdf -> text(136, 255, "TOTAL:");
	$pdf -> setfont('Courier', 'B', 16.0); $pdf -> text(158, 255, llenacadena($total_factura,10,' ')); 

// ---------------------------------------------------------------------------------------------------------------------------------
	$pdf -> setfont('Arial', 'B', 13.0); $pdf -> text(15, 267, $copia_factura);
}

// ******************************************************************************************************
	$pdf -> Output('factura.pdf', 'I');
// ******************************************************************************************************

?>