<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
<head>
        <title> Libros </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
    $id_libro = $_POST["id_libro"];
    $nombre = $_POST["id_nombre"];
    $id_genero = $_POST["id_genero"];
    $id_autor = $_POST["id_autor"];
    $id_anio = $_POST["id_anio"];
    $id_editorial = $_POST["id_editorial"];
    $precio = $_POST["id_precio"];

	$consulta = $db->query("UPDATE `libros` SET `nombre` = '$nombre', `id_genero` = '$id_genero', `id_autor` = '$id_autor', `id_anio` = '$id_anio', `id_editorial` = '$id_editorial', `precio` = '$precio' WHERE `libros`.`id_libro` = '".$id_libro."'");
?>
</html>