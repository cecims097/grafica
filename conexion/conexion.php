<?php

//Se inicia la conexión a la base de datos
function conexion(){
	return mysqli_connect('localhost', 'root', '', 'graficas');
}
?>