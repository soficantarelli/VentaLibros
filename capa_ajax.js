function CrearObjetoAjax() {
	try {
		ajaxobj = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			ajaxobj = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			ajaxobj = false;
		}
	}
   
	if (!ajaxobj && typeof XMLHttpRequest!='undefined') {
		ajaxobj = new XMLHttpRequest();
	}	
	return ajaxobj;
}
var obj_ajax = CrearObjetoAjax(); 

function buscarNombreCliente(){
	nrocliente	= document.forms.factura.nrocliente.value;
	obj_ajax.open('get', 'capa_dinamica.php?action=buscarNombreCliente&nrocliente=' + nrocliente);
	obj_ajax.onreadystatechange = GestorProceso_buscarNombreCliente; 
	obj_ajax.send(null);	
}

function GestorProceso_buscarNombreCliente(){
	var respuesta;
	var resp = new Array(4);
	if(obj_ajax.readyState == 4){ 
		var respuesta = obj_ajax.responseText;
		resp = respuesta.split(';');
		document.getElementById('area_dinamica_buscarNombreCliente').innerHTML = resp[0];	
		document.getElementById('numerosocio').innerHTML = resp[1];
		document.getElementById('numerofactura').innerHTML = resp[2];
		document.getElementById('puntossocio').innerHTML = resp[3];	
	
	}
}