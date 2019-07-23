<!DOCTYPE html>
<?php
    require 'menu.php';
?>
<html>
    <head>
        <title> Puntos</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
       
        <div class = "agregar">
            <form action = 'agregarPuntos.php' method= 'post' name= 'puntos'>
            
            <label>Cantidad Puntos
            <input id='id_cantidad_puntos' name='id_cantidad_puntos' type='number'>
            </label>
            <br> 
            <label>Monto
            <input id='id_monto' name='id_monto' type='number'>
            </label> 
            <br>           
            <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>

            </form>
        </div>
    </body>
</html>