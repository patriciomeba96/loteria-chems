<?php 
	$con=mysqli_connect('localhost','Loteria-admon','qwerty','loteria');

	if (!$con) {
		echo 'Error en la conexion '.mysqli_connect_error();
	}
?>