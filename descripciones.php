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
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script language="javascript" src="capa_ajax.js"></script>

<script language="javascript">
    var IdItem = 0;
    var totalfactura = 0;

        function obtenerImporte(aux){
            var valor = aux;
            console.log(valor);
            cantidadlibros = document.libros.cantidadlibros.value;
            for (i=1; i<=cantidadlibros; i++) {
                if (aux == document.libros.elements[i].name) {
                    document.getElementById('importe').value = document.libros.elements[i].value;
                    document.getElementById('importe_total').value = document.libros.elements[i].value;
                    document.getElementById('producto').value = i;
                    document.getElementById('stock').value = document.libros.elements[i].attributes.stock.value;
                }
            }
        }

        function cambiarImporte(){
            var impor = document.getElementById('importe').value;
            var cant = document.getElementById('cantidad').value;
            var stock = document.libros.elements[document.getElementById('producto').value].attributes.stock.value;
            if (cant > 0){
                if (cant > Math.round(stock * 1000) / 1000) {
                    cant = cant - 1;
                    document.getElementById('cantidad').value = cant;
                    alert('Ha superado el stock disponible');
                }
                else {
                    total = impor*cant;            
                    document.getElementById('importe_total').value = total;
                }
            }else{
                alert('Cantidad debe ser mayor a 0');
                document.getElementById('cantidad').value = 1;
            }
            
        }

        function obtenerImporteTotal(aux){
            var valor = aux; 
            var impor = document.getElementById('importe_total').value;
            if(valor == 0){
                total = impor;
            }else{
                total = impor - impor*(valor/100);
            }
            document.getElementById('importe_total').value = total;         
        }

        function cambiarPuntos(i){
            var puntos_disponibles = document.forms.factura.puntos_disponibles.value;
            var puntos_a_usar = document.forms.factura.puntosusados.value;
            var aux = document.factura.totalfactura.value;
            if(puntos_a_usar > puntos_disponibles){
                alert("Los puntos a usar son mayores a los disponibles");
                document.forms.factura.puntosusados.value = 0;
            } else{
               total = aux - document.forms.factura.puntosusados.value;
               document.factura.totalfactura.value = total;
            }
            
        }

        function agregarOtro(){
            if(!document.getElementById('id_producto').value){
                alert("Verifique que selecciono un libro");
                return;
            }

            if (IdItem == 4) {
                alert("Solo se permite un maximo de 4 productos por factura");
                document.factura.numerofactura.focus();
                document.factura.numerofactura.select();
                return;
	        }	

            if(document.getElementById('cantidad').value <= 0 || document.getElementById('cantidad').value == 0){
                alert('Cantidad debe ser mayor a 0');
                document.factura.numerofactura.focus();
                document.factura.numerofactura.select();
                return;
            }

            IdItem = IdItem + 1;

            document.detalleFactura.IdItem.value = IdItem;		 		 
            document.detalleFactura.numerofactura.value = document.factura.numerofactura.value;
            document.detalleFactura.numerocliente.value = document.factura.nrocliente.value;
            document.detalleFactura.numerosocio.value = document.factura.numerosocio.value;

            libro = document.libros.elements[document.getElementById('producto').value].attributes.nombre.value;
            importe = document.factura.importe.value;
            cantidad = document.factura.cantidad.value;
            descuento =  document.factura.id_descuento.value;
            importe_total = document.factura.importe_total.value;

            document.getElementById('tabla').insertAdjacentHTML('beforeEnd', '<table width="70%" border="0" align="center"><tr bgcolor="#5dae00">' +
                    '<td width="20%"><div align="center">' +
                    '<input name="id_producto' + IdItem + '" type="text" size="10" value="' + libro + '" readonly></div></td>' +
                    '<td width="20%"><div align="center">' +
                    '<input name="importe' + IdItem + '" type="text" size="10" value="' + importe + '" readonly></div></td>' + 
                    '<td width="20%"><div align="center">' + 
                    '<input name="cantidad' + IdItem + '" type="text" size="0" value="' + cantidad + '" readonly></div></td>' +
                    '<td width="20%"><div align="center">' +
                    '<input name="descuento' + IdItem + '" type="text" size="10" value="' + descuento + '" readonly></div></td>' +
                    '<td width="20%"><div align="center">' +
                    '<input name="importe_total' + IdItem + '" type="text" size="10" value="' + importe_total + '" readonly></div></td>' +
                    '</tr></table>');
                    
            totalfactura = parseFloat(totalfactura) + parseFloat(importe_total) - parseFloat(document.factura.puntosusados.value);
            
            document.detalleFactura.puntosusadosc.value = parseFloat(document.factura.puntosusados.value);

            document.factura.puntosganados.value = totalfactura/10;
            document.detalleFactura.puntosganadosc.value = totalfactura/10;

            document.factura.totalfactura.value = totalfactura;
            document.detalleFactura.importetotalfactura.value = totalfactura;           
         
            document.getElementById('id_producto').value = '';
            document.getElementById('importe').value = '';	
            document.getElementById('cantidad').value = '1';	
            document.getElementById('id_descuento').value = '0';	
            document.getElementById('importe_total').value = '';
            document.getElementById('stock').value = '';
        }

        function validarformulario() {
            if (IdItem == 0){
                alert("No tiene ningun producto que facturar en esta factura");
                document.factura.elements.producto.focus();
                document.factura.elements.producto.select();
                return;
            }
			window.open("pdf_factura.php?var=" + document.detalleFactura.elements.numerofactura.value);
            document.forms.detalleFactura.submit();
        }

</script>

	<?php
		echo "<form name= 'libros' action = '#' method= 'get'>";
		$producto = $db->query('SELECT * FROM `libros`');
		echo "<input type='hidden' name='cantidadlibros' value='".$producto->num_rows."' >";
		for ($i=0; $i<$producto->num_rows; $i++) {
			$fila = $producto->fetch_row();
			echo "<input type='hidden' name='".$fila[0]."' value ='".$fila[6]."'nombre='".$fila[1]."' stock='".$fila[7]."' >";
		}
		echo '</form>';
	?>
		<div align="center">        
        <form name='factura'>

        <table width="80%" border="0" cellpadding="3" cellspacing="3">
        <tr bgcolor="#225602">			
			<th scope="col"><font color="#bababa" size="2">Nro. Cliente</span></th>		
			<th scope="col"><font color="#bababa" size="2">Nombre</span></th>
            <th scope="col"><font color="#bababa" size="2">Nro. Socio</span></th>			
            <th scope="col"><font color="#bababa" size="2">Nro. Factura</span></th>
        </tr>
        <tr bgcolor="#5dae00">
			<td><div align="center"> 
	        <input name="nrocliente" type="text" size='10%' onchange="buscarNombreCliente()">
            </div></td>
         	<td><div align="center" id="area_dinamica_buscarNombreCliente">
				<input name="nombrecliente" type="text" size='50%' disabled>
			</div></td>	
            <td><div align="center" id="numerosocio">
				<input name="numerosocio" type="text" size='20%' disabled>
			</div></td>		
         	<td> <div align="center" id="numerofactura">
				<input name="numerofactura" type="text" size='20%' disabled>
			</div></td>
        </tr> 
        <tr bgcolor="#225602">
            <th scope="col"><font color="#bababa" size="2">Puntos Disponibles</span></th>	
            <th scope="col"><font color="#bababa" size="2">Puntos</span></th>	
            <th scope="col"><font color="#bababa" size="2">Puntos Ganados</span></th>	
            <th scope="col"><font color="#bababa" size="2">Total</span></th>		
        </tr>
        <tr bgcolor="#5dae00">   
            <td> <div align="center" id="puntossocio">
				<input name="puntos_disponibles" type="text" size='20%' disabled>
			</div></td>
            <td> <div align="center">
				<select id="puntosusados" name="puntosusados" required onchange="cambiarPuntos(this.value)">
                <?php
                        $puntos = $db->query('SELECT * FROM `puntos`ORDER BY `puntos`.`cantidad_puntos` ASC');
                        while($fila = $puntos->fetch_row()){
                            echo "<option value =$fila[1]>$fila[0]</option>";             
                        }
                    ?>  
			</div></td>
            <td> <div align="center">
				<input id="puntosganados" name="puntosganados" type="text" size='20%' value="0" disabled>
			</div></td>
            <td> <div align="center">
				<input id="totalfactura" name="totalfactura" type="text" size='20%' disabled>
			</div></td>
	   </tr>
      </table>
     <br>   
     <br> 

    <input id='producto' name='producto' type='hidden'>  <!-- guardamos el id de producto para ser utilizado en la busqueda del stock  -->

    <table width="80%" border="0" cellpadding="3" cellspacing="3">
        <tr bgcolor="#225602">
          <th scope="col"><font color="#bababa" size="2">Libro</span></th>
          <th scope="col"><font color="#bababa" size="2">Precio</span></th>
          <th scope="col"><font color="#bababa" size="2">Cantidad</span></th>
          <th scope="col"><font color="#bababa" size="2">Descuento</span></th>
          <th scope="col"><font color="#bababa" size="2">Importe Total</span></th>
          <th scope="col"><font color="#bababa" size="2">Stock</span></th>
        </tr>
        <tr bgcolor="#5dae00">
          <td><div align="center">
            <select id='id_producto' required onchange="obtenerImporte(this.value)">";
                <option value= ""></option>
                    <?php
                        $producto->data_seek(0);
                        while($fila = $producto->fetch_row()){
                            echo "<option value =$fila[0]>$fila[1]</option>";
                        }
                    ?>       
            </select>
          </div></td>          
          <td><div align="center">
            <input id="importe" name="importe" type="texto" size="6" disabled>
          </div></td>
          <td><div align="center">
            <input id='cantidad' name='cantidad' type='number' value="1" onchange="cambiarImporte()">
          </div></td>
          <td><div align="center">
            <select id="id_descuento" name = 'id_descuento' required onchange="obtenerImporteTotal(this.value)">";
                    <?php
                        $descuento = $db->query('SELECT * FROM `descuentos`');
                        while($fila = $descuento->fetch_row()){
                            echo "<option value =$fila[0]>$fila[0]</option>";             
                        }
                    ?>       
            </select>
          </div></tIdItemd>
          <td><div align="center">
            <input name="importe_total" id="importe_total" type="texto" size="6" disabled>
          </div></td>
          <td><div align="center">
            <input name="stock" id="stock" type="texto" size="6" disabled>
          </div></td>
        </tr>
	</table>
    <br>
	<div align="center">
	    <input type="button" name="cmdactualiza" value="Mas productos" onClick="agregarOtro();">
    	<input type="button" name="cmdactualiza" value="Facturar" onclick="validarformulario()">
	</div>
    </form>
	</div>

    <form name="detalleFactura"  method="post" action="agregarDescripcion.php">
        <div id="tabla"></div>
        <input type="hidden" name="IdItem">
        <input type="hidden" name="numerofactura">
        <input type="hidden" name="numerocliente">
        <input type="hidden" name="numerosocio">
        <input type="hidden" name="importetotalfactura">
        <input type="hidden" name="puntosusadosc">
        <input type="hidden" name="puntosganadosc">
    </form>

    </body>
</html>