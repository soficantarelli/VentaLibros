<!DOCTYPE html>
<?php
    require 'menu.php';
?>
<html>
    <head>
        <title> Agregar Autor</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class = 'agregar'>  
            <form action = 'agregarAutor.php' method= 'post' name= 'ingreso'>
            
            <label id='id_nombre'>Nombre
            <input id='id_nombre' name='id_nombre' type='text'>
            </label>
            <br>            
            <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>
            </form>
        </div>
    </body>
</html>