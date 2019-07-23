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
$nombre = $_POST["id_editorial"];

$consulta = $db->query("INSERT INTO `editoriales` (`nombre`) VALUES ('$nombre')");

?>
</html>