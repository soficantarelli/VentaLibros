<?php
require 'conexion.php';

$id = $_POST["id_libro"];
$cantidad = $_POST["id_cantidad"];

$consulta = $db->query("SELECT cantidad FROM `libros` WHERE `id_libro` = '$id'");

$fila = $consulta->fetch_row();

$valor = $fila[0] + $cantidad;

$cantidad = $db->query("UPDATE `libros` SET `cantidad`= '$valor' WHERE `id_libro` = '$id'");

Header ("Location: listadoStock.php");
?>
