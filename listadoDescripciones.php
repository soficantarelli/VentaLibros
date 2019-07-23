<!DOCTYPE html>
<?php
    require 'menu.php';
	require 'conexion.php';
?>
<script language="javascript">
function imprimir(nrofactura) {
	window.open("pdf_factura.php?var=" + nrofactura);
}
</script>

<html>
    <head>
        <title> Descripcion </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
    </head>
    <body>
        <?php
            $nro_factura = $_GET["id_factura"];
            $consulta = $db->query('SELECT * FROM descripciones WHERE id_factura = "'.$nro_factura.'"');      

            echo "<table width='80%' border='0' cellpadding='3' cellspacing='3' align='center'>";
            echo "<tr bgcolor='#225602'>";
            echo "<th scope='col'><font color='#bababa' size='2'> Nro Factura </span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Producto</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Importe</span></th>";
            echo "<th scope='col'><font color='#bababa' size='2'> Cantidad</span></th>";            
            echo "<th scope='col'><font color='#bababa' size='2'> Descuento</span></th>";   
            echo "<th scope='col'><font color='#bababa' size='2'> Importe Total</span></th>";       
            echo "</tr>";                    

                while($fila = $consulta->fetch_row()){

                    echo "<tr bgcolor='#5dae00'>";
                    echo "<td><div align='center'>$fila[1]</td>";
                    echo "<td><div align='center'>$fila[2]</td>";
                    echo "<td><div align='center'>$fila[4]</td>";
                    echo "<td><div align='center'>$fila[3]</td>";
                    echo "<td><div align='center'>$fila[5]</td>";
                    if($fila[5] == 0){
                        $total = $fila[4] * $fila[3];
                    }else{
                        $total = ($fila[4] * $fila[3] *  $fila[5]) / 100;
                    }
                    echo "<td><div align='center'>$total</td>";              
                    echo "</tr>";  
                }
            echo "</table>";
			echo "<BR>";
			echo "<div align='center'><input type='button' name='cmdimprime' value='Imprimir' onclick='imprimir(".$nro_factura.")'></div>";
        ?>  
    </body>
</html>
