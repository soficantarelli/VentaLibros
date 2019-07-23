<!DOCTYPE html>
<?php
    require 'menu.php';
?>
<html>
    <head>
        <title> Agregar Editorial</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class = "agregar"> 
        
            <form action = 'agregarEditorial.php' method= 'post' name= 'ingreso'>
            
                <label id='id_editorial'>Editorial
                <input id='id_editorial' name='id_editorial' type='text'>
                </label>
                <br>            
                <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>
                
            </form>
        </div>
    </body>
</html>