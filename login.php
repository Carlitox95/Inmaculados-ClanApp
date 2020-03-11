<?php
include ('datosconexion.php'); //obtenemos todos los datos necesarios
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
     die("Fallo en la Conexion: " . mysqli_connect_error());
   }
session_start();
$Alias=$_POST['Miembro_Staff']; //obtenemos los datos del formulario
$Password=$_POST['Password']; //obtenemos los datos del formulario
if($Alias AND $Password){
 $Consulta="SELECT * from staff Where Miembro_Staff='$Alias' AND Password='$Password'";
 $result = mysqli_query($conn, $Consulta);
  while ( $arreglo = $result->fetch_assoc() ) {
    if(($Password==$arreglo['Password']) AND ($Alias==$arreglo['Miembro_Staff'])){
     $_SESSION['Usuario']=$arreglo['Miembro_Staff']; 
     echo "INGRESO CORRECTAMENTE";
    }
    else {
     echo "La contraseña y/o el usuario son incorrectos";
    }
  }
}


?>

