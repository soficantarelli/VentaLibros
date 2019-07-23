<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
<head>
        <title> Actualizar </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<?php

if(isset($_POST['eliminar'])){
    $nro_document = $_POST["nro_documento"];
    $consulta = $db->query("DELETE FROM `clientes` WHERE `clientes`.`nro_documento` = '".$nro_document."'");


}else{
    $nro_document = $_POST["nro_documento"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $consulta = $db->query("UPDATE `clientes` SET `nombre`= '$nombre',`apellido`= '$apellido' WHERE `clientes`.`nro_documento` = '".$nro_document."'");
}

?>