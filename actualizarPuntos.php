<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
<head>
        <title> Puntos </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

$id_puntos = $_POST["id_puntos"];
$cantidad_puntos = $_POST["cantidad_puntos"];
$monto = $_POST["monto"];

$consulta = $db->query("UPDATE `puntos` SET `cantidad_puntos` = '$cantidad_puntos', `monto` = '$monto' WHERE `puntos`.`id_puntos` = '".$id_puntos."'");

?>
</html>