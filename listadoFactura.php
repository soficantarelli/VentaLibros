<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<html>
    <head>
        <title> Factura </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
    </head>
    <body>

        <?php
            $consulta = $db->query('SELECT * FROM `facturas`');         
            
            echo "<table width='80%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'> Nro Factura </span></th>";
			echo "<th scope='col'><font color='#bababa' size='2'> Cliente</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Fecha</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Importe Total</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Puntos Ganados</span></th>";          
            echo "</tr>";                    

			if (!empty($consulta)) {
                while($fila = $consulta->fetch_row()){
                    echo "<tr bgcolor='#5dae00'>";
                    echo "<td><div align='center'><a href ='listadoDescripciones.php?id_factura=$fila[0]'>$fila[0]</td>";               
                    echo "<td><div align='center'>$fila[1]</td>";
                    echo "<td><div align='center'>$fila[2]</td>";
                    echo "<td><div align='center'>$fila[3]</td>";                   
                    echo "<td><div align='center'>$fila[4]</td>";              
                    echo "</tr>";  
                }
			}
            echo "</table>"
        ?>  
    </body>
</html>
