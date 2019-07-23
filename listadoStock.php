<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
    <head>
        <title> Stock </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />			
    </head>
    <body>
        <?php
	        $consulta = $db->query('SELECT * FROM `libros`');       

            if (!$consulta) {
                echo 'No se pudo ejecutar la consulta: '.mysql_error();
                exit;
            }

            echo "<table width='30%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'> Nombre</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Cantidad</span></th>";
            echo "</tr>";

            while($fila = $consulta->fetch_row()){
                echo "<tr bgcolor='#5dae00'>";
                echo "<td><div align='center'><a href ='stock.php?id_libro=$fila[0]'>$fila[1]</td>";
                echo "<td><div align='center'>$fila[7]</td>";
                echo "</tr>";  
            }
            echo"</table>";
        ?>  
    </body>
</html>
