<!DOCTYPE html>
<?php
    require 'menu.php';
    require 'conexion.php';
?>
<html>
    <head>
        <title> Agregar Stock </title>        
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>      
            <?php
            $id_libro = $_GET["id_libro"];
            $consulta = $db->query("SELECT * FROM `libros` WHERE `id_libro` = '".$id_libro."'");
            if(!$consulta){
                echo '<a href = "http://localhost/FinalLab2/">Menu Principal</a>';
            }else{

                $fila = $consulta->fetch_row();
                $fila[7] = 0;
                echo "<div class = 'agregar'>  
                <form action = 'agregarStock.php' method= 'post' name= 'ingreso'>        
                <input  id= 'id_libro' name= 'id_libro' type='hidden' value= '$id_libro'>
                <br>            
                <label id='id_cantidad'>Cantidad
                <input id='id_cantidad' name='id_cantidad' type='number' value= '$fila[7]'>
                </label>
                <br>           
                <input id='id_enviar' name='Enviar' type='submit' value='Agregar'>
                </form>
                </div>";
            }
            ?>
        </div>
    </body>
</html>

