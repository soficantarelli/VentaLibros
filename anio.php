<!DOCTYPE html>
<?php
    require 'menu.php';
?>
<html>
    <head>
        <title> Agregar Año</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class = 'agregar'>  
            <form action = 'agregarAnio.php' method= 'post' name= 'ingreso'>
            
            <label id='id_anio'>Año
            <input id='id_anio' name='id_anio' type='year'>
            </label>
            <br>            
            <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>
            </form>
        </div>
    </body>
</html>