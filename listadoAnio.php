<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
    <head>
		<title> Listado Año </title>
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
        <body>
            <?php
                $consulta = $db->query('SELECT * FROM anios ORDER BY `anios`.`anio` DESC');
                if($consulta){
                    echo "<table width='30%' border='0' cellpadding='3' cellspacing='3' align='center'>";
                    echo "<tr bgcolor='#225602'>";
                    echo "<th scope='col'><font color='#bababa' size='2'>Nombre</span></th>";
                    echo "</tr>";
                    while($fila = $consulta->fetch_row()){
                        echo "<tr bgcolor='#5dae00'>";
                        echo "<td><div align='center'>$fila[1]</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
    </body>
</html>