<?php
 session_start();
  if ( (isset($_POST['Miembro_Staff'])) AND (isset($_POST['Password'])) ) {
    include ('datosconexion.php'); //obtenemos todos los datos necesarios
    $conn2 = mysqli_connect($servername, $username, $password, $database);
    if (!$conn2) {
      die("Fallo en la Conexion: " . mysqli_connect_error());
    }  
   $Alias=$_POST['Miembro_Staff']; //obtenemos los datos del formulario
   $Password=$_POST['Password']; //obtenemos los datos del formulario   
   if($Alias AND $Password){
   $Consulta="SELECT * from staff Where Miembro_Staff='$Alias' AND Password='$Password'";
   $result = mysqli_query($conn2, $Consulta);
    while ( $arreglo = $result->fetch_assoc() ) {
      if(($Password==$arreglo['Password']) AND ($Alias==$arreglo['Miembro_Staff'])){
       $_SESSION['Usuario']=$arreglo['Miembro_Staff']; 
       
       //header("Location: home.php");
       echo'<script type="text/javascript">window.location.href="home.php";</script>';
      }
      else {
       echo "La contraseña y/o el usuario son incorrectos";
      }
    }
  }
} 
?>
