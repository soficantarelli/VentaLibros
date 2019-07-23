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

$cantidad_puntos = $_POST["id_cantidad_puntos"];
$monto = $_POST["id_monto"];

$consulta = $db->query("INSERT INTO `puntos` (`cantidad_puntos`, `monto`) VALUES ('$cantidad_puntos', '$monto')");

?>
</html>