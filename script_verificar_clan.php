<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Inmaculados</title>
  <!-- Bootstrap core CSS -->
  <link href="recursos/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/estilos.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/ico" href="recursos/favicon.ico">
</head>

<body>
 <!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->

 <!--//////////////////////////////////////////// -->
 <?php include ('nvar.php'); ?>
 <!--//////////////////////////////////////////// -->

 <!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->
 <!-- Header -->
  <!--<header class="bg-primary py-5 mb-5">-->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2"><br>      </h1>
          <p class="lead mb-5 text-white-50"></p>
        </div>
      </div>
    </div>
  </header>


<!-- Page Content -->
<div class="container">
 

 
<?php  
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 echo "<h2>Script para el control interno del Clan</h2><hr>"; 
 include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos

 //Creamos la conexion con la BD 
 $conn = mysqli_connect($servername, $username, $password, $database);
 //Cheaquea como se menea esta conexion con la BD
 if (!$conn) {
   die("Fallo en la Conexion: " . mysqli_connect_error());
 } 
 echo "<strong>Conexion con la Base de Datos: </strong>Exitosa<br>";
 echo "<strong>Conexion con la API de Clash Royale: </strong>Exitosa<br>";
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 echo "<br>";
 echo "<h2>Verificar y Cargar los miembros del Clan</h2><hr>"; 
 //Me Conecto con la API para comenzar a pegarle
 $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts);
 $json = file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q",true, $context); 
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //me traigo todos los miembros del json para mostrar los miembros del clan    
 $todos_los_miembros=json_decode($json);
 $miembros= $todos_los_miembros->members; //los items en este json son la lista de miembros justamente
 $total_de_miembros= count($miembros);  //contamos cuantos miembros tenemos (recordar que el 1er elemento es el 0)
 $miembros_agregados_en_la_bd=0;  
 $miembros_repetidos=0;
 for ($i = 0; $i < $total_de_miembros; $i++) {
   $miembro_nombre=$miembros[$i]->name;
   $miembro_etiqueta=$miembros[$i]->tag; 
   $miembro_pertenece=1;
   date_default_timezone_set('America/Argentina/Buenos_Aires');
   $miembro_ingreso=date('Y-m-d'); //vamos asumir que ingreso hoy
   //echo $miembro_ingreso."<br>";
   $miembro_egreso="0000-00-000";
   //echo "Miembro: ".$miembro_nombre." --------- Etiqueta: ".$miembro_etiqueta." ----- Fecha Ingreso: ".$FechaActual."<br>"; 

   //Ahora nos conectamos a la BD para chequear si el miembro que estamos agregar ya existia en la Base de datos
   $sql="select * from miembros where (Etiqueta='$miembro_etiqueta') AND (Egreso=0000-00-000)"; 
   $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result)>0) { 
      //echo "Ya existe el registro que intenta registrar <br>";
      $miembros_repetidos=$miembros_repetidos+1;
   }
   else {  
    $sql = "INSERT INTO miembros (Miembro,Etiqueta,Pertenece,Ingreso,Egreso) VALUES ('$miembro_nombre','$miembro_etiqueta','$miembro_pertenece','$miembro_ingreso','$miembro_egreso')";
      if (mysqli_query($conn, $sql)) {        
       echo "Nuevo miembro <strong>".$miembro_nombre."</strong> agregado en la base de datos<br>";
       $miembros_agregados_en_la_bd=$miembros_agregados_en_la_bd+1;
      } 
      else {
       echo "Error: " . $sql . mysqli_error($conn)."<br>";
      }
   }  
}//fin del for   
 mysqli_close($conn); 
 echo "<br>";
 echo "<strong>Miembros que siguen en el clan:</strong> ".$miembros_repetidos."<br>"; 
 echo "<strong>Miembros Nuevos:</strong> Se agregaron a la Base de Datos ".$miembros_agregados_en_la_bd." miembros<br>";
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 //Creamos la conexion con la BD 
 $conn = mysqli_connect($servername, $username, $password, $database);
 //Cheaquea como se menea esta conexion con la BD
 if (!$conn) {
   die("Fallo en la Conexion: " . mysqli_connect_error());
 }  
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //Me Conecto con la API para comenzar a pegarle
 $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts);
 $json = file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q",true, $context); 
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //me traigo todos los miembros del json para mostrar los miembros del clan    
 $todos_los_miembros=json_decode($json);
 $miembros= $todos_los_miembros->members; //los items en este json son la lista de miembros justamente
 $total_de_miembros= count($miembros);  //contamos cuantos miembros tenemos (recordar que el 1er elemento es el 0)  
 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //Realizamos la consulta a la base de datos para traernos todos los miembros
 $ConsultarMiembros="select * from miembros"; 
 $ConsultarMiembros_Resultado = mysqli_query($conn, $ConsultarMiembros); 
 $Miembros_que_se_fueron=0;
 //vamos a comparar los miembros en nuestra base de datos miembro a miembro contra los que esten en el clan ahora mismo
  while ( $Miembro = $ConsultarMiembros_Resultado->fetch_assoc() ) { 
    $Id_del_miembro_evaluado=$Miembro['ID'];
    $Nombre_del_miembro_evaluado=$Miembro['Miembro'];
    $Etiqueta_del_miembro_evaluado=$Miembro['Etiqueta'];
    $Pertenece_del_miembro_evaluado=$Miembro['Pertenece'];
    $Fecha_ingreso_del_miembro_evaluado=$Miembro['Ingreso'];
    $Fecha_egreso_del_miembro_evaluado=$Miembro['Egreso'];
    //Vamos a comparar nuestro miembro de indice X contra todos los que esten en el clan ahora mismo
     for ($i = 0; $i < $total_de_miembros; $i++) {
       //traemos los datos del miembro del clan a analizar
       $Posible_Ex_Miembro_Nombre=$miembros[$i]->name;
       $Posible_Ex_Miembro_Etiqueta=$miembros[$i]->tag; 
       //Preguntamos si el Elemento 'X' de la BD es igual al miembro "i" del clan
         if ($Etiqueta_del_miembro_evaluado == $Posible_Ex_Miembro_Etiqueta ) {
          $Es_Miembro="SI";
          break; //si encontro que es miembro cortamos la corrida en dicho indice
         }
         else {
          $Es_Miembro="NO";
         }
      }
    //Si el miembro de indice X no estaba entre los "i" miembros del clan quiere decir que ya no forma parte
      if (($Es_Miembro=="NO") AND ($Pertenece_del_miembro_evaluado==1)) {
       $Miembros_que_se_fueron=$Miembros_que_se_fueron+1;
       date_default_timezone_set('America/Argentina/Buenos_Aires');
       $Fecha_egreso_del_miembro_evaluado=date('Y-m-d'); //establecemos que hoy fue el dia de partida de dicho miembro
       $Pertenece_del_miembro_evaluado=0;
       $Updatear_Miembro_que_se_fue ="UPDATE miembros SET 
       ID='$Id_del_miembro_evaluado',
       Miembro='$Nombre_del_miembro_evaluado',
       Etiqueta='$Etiqueta_del_miembro_evaluado',
       Pertenece='$Pertenece_del_miembro_evaluado',
       Ingreso='$Fecha_ingreso_del_miembro_evaluado',
       Egreso='$Fecha_egreso_del_miembro_evaluado' 
       WHERE ID='$Id_del_miembro_evaluado'";       
        if (mysqli_query($conn, $Updatear_Miembro_que_se_fue)) {
           echo "El miembro <strong>".$Nombre_del_miembro_evaluado."</strong> ya no pertenece al clan y fue actualizado en la base de datos<hr>";
         } 
         else {
           echo "Error al actualizar la base de datos" . mysqli_error($conn)."<br>";
         }
      }      
   }
 echo "<strong>Miembros que se fueron: </strong>Se han ido del clan ".$Miembros_que_se_fueron." miembros <br>"; 
 echo "<br>"; 
 echo "<br>"; 







 //////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////// 
 //Realizamos un Registro de cuando fue la ultima vez que se ejecuto este Script
 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $Fecha_Log=date('Y-m-d');
 $Hora_Log=date('H:i');  
 $Consulta_Log = "INSERT INTO log (Fecha_Log,Hora_Log,Tipo_Log) VALUES ('$Fecha_Log','$Hora_Log','Update Miembros')";
  if (mysqli_query($conn, $Consulta_Log)) {     
   echo "<hr>";   
   echo "<strong>Entrada agregada en el Logfile </strong>".$Fecha_Log." ".$Hora_Log;   
   echo "<br>";    
  } 
  else {
   echo "Error: " . $Consulta_Log . mysqli_error($conn)."<br>";
  }
 mysqli_close($conn);  
?>     





 
</div>
 <!-- /.container -->  
 <!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Inmaculados y todos los derechos e izquierdos reservados</p>
    </div>
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="recursos/jquery/jquery.min.js"></script>
  <script src="recursos/bootstrap/js/bootstrap.bundle.min.js"></script>
 
</body>


</html>

