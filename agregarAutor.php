<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
<head>
        <title> Autor </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

$nombre = $_POST["id_nombre"];

$consulta = $db->query("INSERT INTO `autores` (`nombre`) VALUES ('$nombre')");
?>
</html>