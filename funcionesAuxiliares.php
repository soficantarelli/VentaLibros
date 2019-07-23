<?php 
function llenaCadena($cadena, $n, $comodin) {
	settype($cadena, 'string');
	$largoCadena = strlen($cadena);
	if ($largoCadena > $n) {
  		$cadena = substr($cadena, 0, $n);
	}
	else {
		$aCompletar = ($n-$largoCadena);
		$espacioComodin = ""; // cadena vacia.
		for ($i=1; $i<=$aCompletar; $i++){
			$espacioComodin = $espacioComodin.$comodin;
		}
		$cadena = $espacioComodin.$cadena;
	}
	return $cadena;
} // cierre llenacadena.

function formatoPrecio862($precio){
	$precio = round($precio,2); 
	$largoCadena = strlen($precio); 

	$posPunto = strpos($precio,'.'); 
	$decimalesActuales = $largoCadena-($posPunto+1);
	if ($posPunto == '' ) { $decimalesActuales = 0; }
	switch ($decimalesActuales) {
		case "1": 
			$antes = substr($precio,0,$posPunto);
			$despues = substr($precio,$posPunto+1,$largoCadena);
			$precio = $antes.','.$despues.'0';
		break;
		case "2":
			$antes = substr($precio,0,$posPunto);
			$despues = substr($precio,$posPunto+1,$largoCadena);
			$precio = $antes.','.$despues;
 		break;
		case "0":
			$antes = substr($precio,0,$largoCadena);
			$precio = $antes.',00';
		break;
	}
	return $precio;			
}

?>