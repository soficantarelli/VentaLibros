<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
<head>
        <title> Agregar </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

$nro_documento = $_POST["nro_documento"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$nro_socio = 0;
$puntos = 0;

$consulta = $db->query("INSERT INTO `clientes` (`nro_documento`, `nombre`, `apellido`, `nro_socio`, `puntos`) VALUES ('$nro_documento',  '$nombre', '$apellido','$nro_socio', '$puntos')");

?>
</html>