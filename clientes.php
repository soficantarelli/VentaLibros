<!DOCTYPE html>
<?php
    require 'menu.php';
?>
<html>
    <head>
        <title> Agregar Cliente</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class="agregar"> 
        
            <form action = 'agregarCliente.php' method= 'post' name= 'ingreso'>
            
                <label id='nro_documento'>Nro Documento
                <input id='nro_documento' name='nro_documento' type='text'>
                </label>
                <br>
                <label id='nombre'>Nombre
                <input id='nombre' name='nombre' type='text'>
                </label>
                <br>  
                <label id='apellido'>Apellido
                <input id='apellido' name='apellido' type='text'>
                </label>
                <br>        
                <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>

            </form>
        </div>
    </body>
</html>