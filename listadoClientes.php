<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Clientes </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    </head>
    <body>

        <?php

            $consulta = $db->query('SELECT * FROM `clientes`');

            echo "<table width='90%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'>Nro Documento</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Apellido</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Nombre</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Socio</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Puntos Total</span></th>";
            echo "</tr>";

            while($fila = $consulta->fetch_row()){
                echo "<tr bgcolor='#5dae00'>";
                echo "<td><div align='center'><a href = 'editarClientes.php?id_cliente=$fila[0]'>$fila[0]</td>";  
                echo "<td><div align='center'>$fila[2]</td>";
                echo "<td><div align='center'>$fila[1]</td>";
                if($fila[3] == 0){
                    echo "<td><div align='center'><a href = 'agregarSocio.php?id_cliente=$fila[0]'>$fila[3]</a></td>";
                }else{
                    echo "<td><div align='center'>$fila[3]</td>";
                } 
                echo "<td><div align='center'>$fila[4]</td>";
                echo "</tr>";  
            }

            echo "</table>";
        ?>
        
    </body>
</html>