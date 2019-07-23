<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
    <head>
        <title> Agregar Libros</title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div class = 'agregar'>  
            <form action = 'agregarLibro.php' method= 'post' name= 'ingreso'>
            	<table>
					<tr>
						<td><label id='id_nombre'>Nombre</td>
						<td><div align='center'><input id='id_nombre' name='id_nombre' type='text' size="60"></div></label></td>
					</tr>
					<tr>
						<td><label id='id_genero'>Genero</td>
						<td><div align='center'><select name = 'id_genero' required>"; 
	                    <?php
    	                    $genero = $db->query('SELECT * FROM generos');
        	                while($fila = $genero->fetch_row()){
            	                echo "<option value =$fila[0]>$fila[1]</option>";             
                	        }
	                    ?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_autor'>Autor</td>
						<td><div align='center'><select name = 'id_autor' required>";   
						<?php
                        	$autor = $db->query('SELECT * FROM autores');
                        	while($fila = $autor->fetch_row()){
                            	echo "<option value =$fila[0]>$fila[1]</option>";             
                        	}
	                    ?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_anio'>Año</td>
						<td><div align='center'><select name = 'id_anio' required>";   
		                <?php
        	                $anio = $db->query('SELECT * FROM anios');
            	            while($fila = $anio->fetch_row()){
                	            echo "<option value =$fila[0]>$fila[1]</option>";             
                    	    }
	                    ?>       
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_editorial'>Editorial</td>
						<td><div align='center'><select name = 'id_editorial' required>";   
		                <?php
        	                $editorial = $db->query('SELECT * FROM editoriales');
            	            while($fila = $editorial->fetch_row()){
                	            echo "<option value =$fila[0]>$fila[1]</option>";             
                    	    }
	                    ?>       
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_precio'>Precio</td>
						<td><div align='center'><input id='id_precio' name='id_precio' type='number' required></div></label></td>
					</tr>
					<tr>
						<td><label id='id_cantidad'>Cantidad</td>
						<td><div align='center'><input id='id_cantidad' name='id_cantidad' type='number' required></div></label></td>
					</tr>
					</table>
				<div align='center'><input id='id_enviar' name='Enviar' type='submit' value='Agregar'></div>
            </form>
        </div>
    </body>
</html>