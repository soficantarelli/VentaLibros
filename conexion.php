<?php
$host = 'g01.develweb.com.ar';
$nombreBD = 'g01devel_finalCantarelli';
$user = 'g01develweb';
$password = 'G01D3v3lW3b';

$db = mysqli_connect($host, $user, $password, $nombreBD) 
    or die('No se pudo conectar: ' . mysqli_error());
//echo 'Connected successfully';
?>