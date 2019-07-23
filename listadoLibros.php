<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Libros </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
    </head>
    <body>
        <?php

            $consulta = $db->query('SELECT * FROM `libros`');
            $genero = $db->query('SELECT * FROM generos g JOIN libros l WHERE l.id_genero = g.id_genero');
            $autor = $db->query('SELECT * FROM autores a JOIN libros l WHERE l.id_autor = a.id_autor');
            $anio = $db->query('SELECT * FROM anios a JOIN libros l WHERE l.id_anio = a.id_anio');
            $editorial = $db->query('SELECT * FROM editoriales e JOIN libros l WHERE l.id_editorial = e.id_editorial');           

            if (!$consulta) {
                echo 'No se pudo ejecutar la consulta: '.mysql_error();
                exit;
            }

            echo "<table width='80%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'>Nombre</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Genero</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Autor</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Año</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Editorial</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Precio</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Cantidad</span></th>";
            echo "</tr>";

            while($fila = $consulta->fetch_row()){
                
                echo "<tr bgcolor='#5dae00'>";
                echo "<td><div align='center'><a href='editarLibros.php?id_libro=$fila[0]'>$fila[1]</a></td>";               
                $filagenero = $genero->fetch_row();
                echo "<td><div align='center'>$filagenero[1]</td>";
                $filaautor = $autor->fetch_row();
                echo "<td><div align='center'>$filaautor[1]</td>";
                $filaanio = $anio->fetch_row();
                echo "<td><div align='center'>$filaanio[1]</td>";
                $filaeditorial = $editorial->fetch_row();
                echo "<td><div align='center'>$filaeditorial[1]</td>";
                echo "<td><div align='center'>$fila[6]</td>";
                echo "<td><div align='center'>$fila[7]</td>";
                echo "</tr>";  

            }
            echo "</table>";
        ?> 
    </body>
</html>