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

$anio = $_POST["id_anio"];

$consulta = $db->query("INSERT INTO `anios` (`anio`) VALUES ('$anio')");

?>
</html>