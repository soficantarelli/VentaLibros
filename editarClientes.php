<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Cliente </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class="agregar">
            <?php

                $id_cliente = $_GET["id_cliente"];
                $consulta = $db->query('SELECT * FROM `clientes` WHERE nro_documento = "'.$id_cliente.'"');
                $fila = $consulta->fetch_row();

                echo "<form action = 'actualizarCliente.php' method= 'post' name= 'ingreso'>
                    <input id='nro_documento' name='nro_documento' type='hidden' value= '$fila[0]'>
                    <br>
                    <label id='nombre'>Nombre
                    <input id='nombre' name='nombre' type='text' value= '$fila[1]'>
                    </label>
                    <br>  
                    <label id='apellido'>Apellido
                    <input id='apellido' name='apellido' type='text' value= '$fila[2]'>
                    </label>
                    <br> 
                    <input id='actualizar' name='actualizar' type='submit' value='Actualizar'>
                    <input id='eliminar' name='eliminar' type='submit' value='Eliminar'>
                    </form>";
            ?>
        </div>
    </body>
</html>
