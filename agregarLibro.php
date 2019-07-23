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

$nombre = $_POST["id_nombre"];
$id_genero = $_POST["id_genero"];
$id_autor = $_POST["id_autor"];
$id_anio = $_POST["id_anio"];
$id_editorial = $_POST["id_editorial"];
$precio = $_POST["id_precio"];
$cantidad = $_POST["id_cantidad"];

$consulta = $db->query("INSERT INTO `libros` (`nombre`, `id_genero`, `id_autor`, `id_anio`, `id_editorial`, `precio`, `cantidad`) VALUES ('$nombre', '$id_genero', '$id_autor', '$id_anio', '$id_editorial', '$precio', '$cantidad')");

?>
</html>