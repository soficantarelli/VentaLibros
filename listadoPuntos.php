<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Puntos </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>        
        <?php

            $consulta = $db->query("SELECT * FROM `puntos` ORDER BY `puntos`.`cantidad_puntos` ASC");

            echo "<table width='30%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'>Cantidad</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'>Monto</span></th>";
            echo "</tr>";

            while($fila = $consulta->fetch_row()){
                echo "<tr bgcolor='#5dae00'>";
                echo "<td><div align='center'>$fila[0]</td>";
                echo "<td><div align='center'>$fila[1]</td>";
                echo "</tr>";
            
            }

            echo "</table>";
        ?>
    </body>
</html>