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
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
       <a class="navbar-brand" href="index.php"><img src="recursos/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
          <li class="nav-item"><a class="nav-link" href="guerras.php">War</a></li> 
          <li class="nav-item"><a class="nav-link" href="historial.php">History</a></li>                 
        </ul>
      </div>
    </div>
  </nav>
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
function Verificar_Si_Miembro_Esta_Clan_Base_Datos ($nombremiembro) {
 include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
 //Creamos la conexion con la BD 
 $conn = mysqli_connect($servername, $username, $password, $database);
 //Cheaquea como se menea esta conexion con la BD
 if (!$conn) {
   die("Fallo en la Conexion: " . mysqli_connect_error());
  }
  $sql="select * from miembros where (Miembro='$nombremiembro') AND (Pertenece=1)"; 
  $result = mysqli_query($conn, $sql);
   if(mysqli_num_rows($result)>0) { 
      $miembro_pertenece="SI";
      return $miembro_pertenece; 
    }
    else {
     $miembro_pertenece="NO";
     return $miembro_pertenece; 
    }
}
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
function Verificar_Si_Miembro_Participo_Guerra ($nombremiembro) {
 //link con la documentacion https://docs.royaleapi.com/#/authentication?id=key-management
 $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts); 
 $jsonguerras=file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q/war",true, $context); 
 $datos_clan_guerra=json_decode($jsonguerras); 
 $participantes=$datos_clan_guerra->participants;
 $guerra_participantes=$datos_clan_guerra->clan->participants;
 $guerra_estado=$datos_clan_guerra->state;  
  for ($i = 0; $i < $guerra_participantes; $i++) {
   $participantes_guerra_nombre=$datos_clan_guerra->participants[$i]->name;
    if ($nombremiembro==$participantes_guerra_nombre) {
      $miembro_guerra="PARTICIPA";
      return $miembro_guerra;
    }

  }
}
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
function Cargar_Miembros_Que_No_Participaron () {   
 $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts);
 $json = file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q",true, $context);
 $jsonguerras=file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q/war",true, $context);   
 $datos_clan=json_decode($json);  
 $datos_clan_guerra=json_decode($jsonguerras);
 $miembros_del_clan= $datos_clan->members; 
 $participantes=$datos_clan_guerra->participants;
 $Cantidad_miembros_del_clan=$datos_clan->memberCount; 
 $guerra_participantes=$datos_clan_guerra->clan->participants;  
 $guerra_tiempo_restante=$datos_clan_guerra->warEndTime;
 $contador_no_jugaron=0;  
 $ausencias_agregadas_en_la_bd=0;
  for ($aux1 = 0; $aux1 < $Cantidad_miembros_del_clan; $aux1++) {
   $miembroanalizado=$miembros_del_clan[$aux1]->name;
   for ($aux2=0; $aux2 < $guerra_participantes; $aux2++) {      
     $participanteanalizado=$participantes[$aux2]->name;
     //Inicia el IF que verifica la participacion del integrante
      if ($miembroanalizado == $participanteanalizado) {
       $participa="SI";  
        break;         
      }
      else {
       $participa="NO";
      }              
    }     
    if ($participa=="NO") {

     $contador_no_jugaron=$contador_no_jugaron+1;
     $No_Jugo_Etiqueta=$miembros_del_clan[$aux1]->tag; 
     $No_Jugo_Nombre=$miembroanalizado; 
     date_default_timezone_set('America/Argentina/Buenos_Aires');
     $Dia_Guerra=date('Y-m-d'); //vamos asumir que el dia de guerra es hoy            
     //echo "Miembro: ".$No_Jugo_Nombre." Etiqueta: ".$No_Jugo_Etiqueta."<br>";       
     //Ahora nos conectamos a la BD para chequear si el miembro que estamos agregar ya existia en la tabla
     include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
     $conn = mysqli_connect($servername, $username, $password, $database);
     //Cheaquea como se menea esta conexion con la BD
     if (!$conn) {
       die("Fallo en la Conexion: " . mysqli_connect_error());
     } 
     $sql="select * from ausencias where (Etiqueta_Miembro='$No_Jugo_Etiqueta') AND (Fecha_Ausencia='$Dia_Guerra')"; 
     $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result)>0) { //si existe la misma ausencia no lo cargo (para no pisar datos)
       echo "<strong>".$No_Jugo_Nombre."</strong> del <strong>".$Dia_Guerra."</strong> - Ya estaba cargado!<br>";
      }
     else {  
        $sql = "INSERT INTO ausencias (Nombre_Miembro,Etiqueta_Miembro,Fecha_Ausencia) VALUES ('$No_Jugo_Nombre','$No_Jugo_Etiqueta','$Dia_Guerra')";
        if (mysqli_query($conn, $sql)) {        
          echo "Ausencia de <strong>".$No_Jugo_Nombre."</strong> registrada en la base de datos<br>";
         $ausencias_agregadas_en_la_bd=$ausencias_agregadas_en_la_bd+1;
        } 
        else {
         echo "Error: " . $sql . mysqli_error($conn)."<br>";
        }
      }  
     ///
    }
  } 
 echo "<hr><strong>Ausencias Cargadas: </strong>".$ausencias_agregadas_en_la_bd;
}
 //////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////
 echo "<h2>Script para la carga de ausentes de una guerra</h2><hr>"; 
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
 echo "<h2>Carga de Ausentes de la guerra Actual</h2><hr>"; 
 Cargar_Miembros_Que_No_Participaron (); 
?>     





 <br>
 <br>
 <br>
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

