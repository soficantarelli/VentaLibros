<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Socio </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
         <h4>Se agrego al cliente un número de socio</h4>

    <?php

    $id_cliente = $_GET["id_cliente"];
    $puntos = 0;

    $consulta = $db->query("SELECT MAX(nro_socio) FROM clientes");
    $fila = $consulta->fetch_row();
    if(!$fila){
        $nro_socio = 1;
    }else{
        $nro_socio = $fila[0] + 1;
    }
    
    $update = $db->query("UPDATE `clientes` SET `nro_socio` = '$nro_socio' WHERE `nro_documento` = '".$id_cliente."'");

    ?>
    </body>
</html>
