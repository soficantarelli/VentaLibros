<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
<head>
        <title> Principal </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
/*
echo "Post"."<BR>";
foreach ($_POST as $nombre_var => $valor_var) {
        echo $nombre_var; echo " : "; echo $valor_var; echo "<BR>";	
    }
echo "Get"."<BR>";
foreach ($_GET as $nombre_var => $valor_var) {
        echo $nombre_var; echo " : "; echo $valor_var; echo "<BR>";	
}
*/
$cant = $_POST["IdItem"];
$numero_socio = $_POST["numerosocio"];
$puntos_usados = $_POST["puntosusadosc"];

$nro_factura = $_POST["numerofactura"];
$nro_cliente = $_POST["numerocliente"];
$importe_total = $_POST["importetotalfactura"];
$puntos_ganados = $_POST["puntosganadosc"];

for($i = 1; $i <= $cant; $i++){
    $nombre_producto = $_POST["id_producto".$i];
    $cantidad = $_POST["cantidad".$i];
    $importe = $_POST["importe".$i];
    $id_descuento = $_POST["descuento".$i]; 
    $descripciones = $db->query("INSERT INTO `descripciones`(`id_factura`, `id_producto`, `cantidad`, `importe`, `id_descuento`) VALUES  ('$nro_factura', '$nombre_producto', '$cantidad', '$importe', '$id_descuento')");
    $stock = $db->query("SELECT cantidad FROM libros WHERE nombre = '".$nombre_producto."'");
    $fila = $stock->fetch_row();
    $valor = $fila[0] - $cantidad;
    $stock_nuevo = $db->query("UPDATE `libros` SET `cantidad`= '$valor' WHERE nombre = '".$nombre_producto."'");
}

if($puntos_usados > 0 ){
    $clientes = $db->query("SELECT puntos FROM `clientes` WHERE nro_documento = '".$nro_cliente."'");
    $fila = $clientes->fetch_row();
    $valor = $fila[0] - $puntos_usados*10;
    $clientes_actualizado = $db->query("UPDATE `clientes` SET `puntos`= '$valor' WHERE nro_documento = '".$nro_cliente."'");
}

if($numero_socio != 0){
    $clientes = $db->query("SELECT puntos FROM `clientes` WHERE nro_documento = '".$nro_cliente."'");
    $fila = $clientes->fetch_row();
    $valor = $fila[0] + $puntos_ganados;
    $clientes_actualizado = $db->query("UPDATE `clientes` SET `puntos`= '$valor' WHERE nro_documento = '".$nro_cliente."'");
}

$factura = $db->query("INSERT INTO `facturas`(`id_factura`, `id_cliente`, `fecha`, `importe_total`, `id_puntos`) VALUES ('$nro_factura', '$nro_cliente', '".date("Y-m-d")."' ,'$importe_total', '$puntos_ganados')");

?>
</html>