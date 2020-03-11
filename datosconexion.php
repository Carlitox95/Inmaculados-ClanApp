<?php   
$VerificarHost=$_SERVER['HTTP_HOST']; //Guardo el valor del Host local 127.0.0.1
$LocalHost='127.0.0.1'; //Reemplazar por la IP local que se ese utilizando en el LocalHost

//Datos para el Servidor mysql de Prueba Local
IF ($VerificarHost==$LocalHost) { //Si detectamos que estamos en el LocalHost del Servidor de prueba brindamos los datos locales
//Datos necesarios para la conexion a la base de datos LOCAL del Sistema
 $servername = "127.0.0.1";
 $database = "inmaculados";
 $username = "inmaculado_admin";
 $password = "carlitox100%";
}

//Datos para el Servidor MYSQL Online
IF ($VerificarHost!=$LocalHost) { //Si detectamos que no estamos en el localhost del servidor de prueba brindamos los datos online
//Datos necesarios para la conexion a la base de datos ONLINE del Sistema
 $servername = "localhost";
 $database = "id10273412_inmaculados";
 $username = "id10273412_inmaculado_admin";
 $password = "carlitox100%";
}
?>     
  
