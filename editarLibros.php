<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
    <head>
        <title> Editar </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>

    <div class="agregar">
	<?php
		$id_libro = $_GET["id_libro"];
		$consulta = $db->query("SELECT * FROM `libros` WHERE `id_libro` = '".$id_libro."'");

		$genero = $db->query('SELECT * FROM generos g');
		$autor = $db->query('SELECT * FROM autores a');
		$anio = $db->query('SELECT * FROM anios a');
		$editorial = $db->query('SELECT * FROM editoriales e');

		if(!$consulta){
			die("Error");
		}
		else {
			$fila = $consulta->fetch_row();
		}
	?>
		<form action = 'actualizarLibros.php' method= 'post' name= 'ingreso'>
			<input  id= 'id_libro' name= 'id_libro' type='hidden' value= '<?php echo $id_libro; ?>'>
				<table>
					<tr>
						<td><label id='id_nombre'>Nombre</td>
						<td><div align='center'><input id='id_nombre' name='id_nombre' type='text' value= '<?php echo $fila[1] ?>' size='60' required></div></label></td>
					</tr>
					<tr>
						<td><label id='id_genero'>Genero</td>
						<td><div align='center'><select name = 'id_genero' required>
	                    <?php
			                while($filagenero = $genero->fetch_row()){
            			        if($filagenero[0] == $fila[2]){
                        			echo "<option value =".$filagenero[0]." selected> ".$filagenero[1]." </option>"; 
			                    }
            			        echo "<option value =".$filagenero[0].">".$filagenero[1]."</option>";           
			                }
						?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_autor'>Autor</td>
						<td><div align='center'><select name = 'id_autor' required>
	                    <?php
			                while($filaautor = $autor->fetch_row()){
            			        if($filaautor[0] == $fila[3]){
                        			echo "<option value =".$filaautor[0]." selected> ".$filaautor[1]." </option>"; 
			                    }
			                    echo "<option value =$filaautor[0]>$filaautor[1]</option>";           
            			    }
						?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_anio'>Año</td>
						<td><div align='center'><select name = 'id_anio' required>
	                    <?php
			                while($filaanio = $anio->fetch_row()){
            			        if($filaanio[0] == $fila[4]){
                        			echo "<option value =$filaanio[0] selected>$filaanio[1]</option>"; 
			                    }
            			        echo "<option value =$filaanio[0]>$filaanio[1]</option>";           
			                }
						?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_editorial'>Editorial</td>
						<td><div align='center'><select name = 'id_editorial' required>
	                    <?php
			                while($filaeditorial = $editorial->fetch_row()){
            			        if($filaeditorial[0] == $fila[5]){
			                        echo "<option value =$filaeditorial[0] selected>$filaeditorial[1]</option>"; 
			                    }
			                    echo "<option value =$filaeditorial[0]>$filaeditorial[1]</option>";
            			    }
						?>
						</select></div></label></td>
					</tr>
					<tr>
						<td><label id='id_precio'>Precio</td>
						<td><div align='center'><input id='id_precio' name='id_precio' type='text' value= '<?php echo $fila[6] ?>' required></div></label></td>
					</tr>
				</table>
				<div align='center'><input id='id_enviar' name='Enviar' type='submit' value='Actualizar'></div>
                </form>
        </div>
    </body>
</html>