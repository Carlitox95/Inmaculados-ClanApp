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
 <script type="text/javascript">
 function muestra_oculta(id){
    if (document.getElementById) { //se obtiene el id
     var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
     el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
     //damos un atributo display:none que oculta el div
    }  
  }
 window.onload = function(){
  /*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
 muestra_oculta('miembrosclan');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
 muestra_oculta('ausenciasclan');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
 }
</script>
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

<?php 
header('Content-Type: text/html; charset=utf-8');
ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "UTF-8");
 //////////////////////////////////////////////////////////////////////////////////////////////
 function Imprimir_Consulta_De_Miembros () {
   include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
   //Creamos la conexion con la BD 
   $conn = mysqli_connect($servername, $username, $password, $database);
   //Cheaquea como se menea esta conexion con la BD
   if (!$conn) {
     die("Fallo en la Conexion: " . mysqli_connect_error());
   }
   echo "<div class='table-responsive'>";
   echo "<table class='table table-bordered table-hover table-sm table-dark'>";
   echo "<thead class='thead-dark'>";
   echo "<tr>";
   echo "<th scope='col'><center>Nombre</center></th>";
   echo "<th scope='col'><center>Etiqueta</center></th>";
   echo "<th scope='col'><center>Estado</center></th>"; 
   echo "<th scope='col'><center>Ingreso</center></th>"; 
   echo "<th scope='col'><center>Egreso</center></th>";    
   echo "</tr>";
   echo "</thead>";
   echo "<tbody>";     
   //realizamos la consulta con la BD
   $Consultar_Miembros="select * from miembros";
   $result = mysqli_query($conn, $Consultar_Miembros);
   while ( $Todos_los_miembros = $result->fetch_assoc() ) {
     $nombre=$Todos_los_miembros["Miembro"];
     $etiqueta=$Todos_los_miembros["Etiqueta"];
     $estadomiembro=$Todos_los_miembros["Pertenece"];
     $fechaingreso=$Todos_los_miembros["Ingreso"];
     $fechaegreso=$Todos_los_miembros["Egreso"];
     if ($fechaegreso=="0000-00-00") {
       $fechaegreso=" ";
     }
     if ($estadomiembro==1) {
       $estadomiembro="Miembro";
       echo "<tr class='bg-primary'>";
       echo "<td><center>".$nombre."</center></td>";
       echo "<td><center>".$etiqueta."</center></td>";
       echo "<td><center>".$estadomiembro."</center></td>";
       echo "<td><center>".$fechaingreso."</center></td>";
       echo "<td><center>".$fechaegreso."</center></td>";       
       echo "</tr>";  
     }
     else {
       $estadomiembro="No Pertenece";
       echo "<tr class='bg-danger'>";
       echo "<td><center>".$nombre."</center></td>";
       echo "<td><center>".$etiqueta."</center></td>";
       echo "<td><center>".$estadomiembro."</center></td>";
       echo "<td><center>".$fechaingreso."</center></td>";
       echo "<td><center>".$fechaegreso."</center></td>";       
       echo "</tr>";
     }          
    }
   echo "</tbody>";
   echo "</table>";
   echo "</div>";
   mysqli_close($conn);  
}
//////////////////////////////////////////////////////////////////////////////////////////////
function Imprimir_Ausencias_En_Guerras () {
 include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
   //Creamos la conexion con la BD 
   $conn = mysqli_connect($servername, $username, $password, $database);
   //Cheaquea como se menea esta conexion con la BD
   if (!$conn) {
     die("Fallo en la Conexion: " . mysqli_connect_error());
   }
   echo "<div class='table-responsive'>";
   echo "<table class='table table-bordered table-hover table-sm table-dark'>";
   echo "<thead class='thead-dark'>";
   echo "<tr>";
   echo "<th scope='col'><center>Nombre</center></th>";
   echo "<th scope='col'><center>Etiqueta</center></th>";
   echo "<th scope='col'><center>Fecha</center></th>";    
   echo "</tr>";
   echo "</thead>";
   echo "<tbody>";     
   //realizamos la consulta con la BD
   $Consultar_Ausencias="select * from ausencias order by Nombre_Miembro";
   $result = mysqli_query($conn, $Consultar_Ausencias);
   while ( $Todos_los_miembros = $result->fetch_assoc() ) {   
     $nombre=$Todos_los_miembros["Nombre_Miembro"];
     $etiqueta=$Todos_los_miembros["Etiqueta_Miembro"];    
     $fechaausencia=$Todos_los_miembros["Fecha_Ausencia"];  
     $ES_MIEMBRO_AHORA= Verificar_Si_Miembro_Esta_Clan_Base_Datos ($etiqueta);
     if ($ES_MIEMBRO_AHORA=="SI") {
       echo "<tr class='bg-info'>";      
       echo "<td><center>".$nombre."</center></td>";
       echo "<td><center>".$etiqueta."</center></td>";
       echo "<td><center>".$fechaausencia."</center></td>";        
       echo "</tr>";  
      }    
    }
   echo "</tbody>";
   echo "</table>";
   echo "</div>";
   mysqli_close($conn);
}
//////////////////////////////////////////////////////////////////////////////////////////////
function Verificar_Si_Miembro_Esta_Clan_Base_Datos ($etiquetamiembro) {
 include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
 //Creamos la conexion con la BD 
 $conn = mysqli_connect($servername, $username, $password, $database);
 //Cheaquea como se menea esta conexion con la BD
 if (!$conn) {
   die("Fallo en la Conexion: " . mysqli_connect_error());
  }
  $sql="select * from miembros where (Etiqueta='$etiquetamiembro') AND (Pertenece=1)"; 
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
//////////////////////////////////////////////////////////////////////////////////////////////
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
function Verificar_Ultimo_Log () {
//Verifico y muestro el ultimo Log de verificacion de la base de datos
 include("datosconexion.php"); //me traigo los datos para conectarme con la base de datos
   //Creamos la conexion con la BD 
   $conn = mysqli_connect($servername, $username, $password, $database);
   //Cheaquea como se menea esta conexion con la BD
   if (!$conn) {
     die("Fallo en la Conexion: " . mysqli_connect_error());
   }      
   //realizamos la consulta con la BD
   $Consultar_Log="select * from log ORDER BY ID_Log DESC LIMIT 1";
   $result = mysqli_query($conn, $Consultar_Log);
   while ( $Log_Result = $result->fetch_assoc() ) {   
     $Log_Fecha=$Log_Result["Fecha_Log"];  
     $Log_Hora=$Log_Result["Hora_Log"]; 
     $Log_Tipo=$Log_Result["Tipo_Log"]; 
    }  
   $Imprimir_Log="<center><strong>Ultima Modificacion Automatica:</strong> ".$Log_Fecha." ".$Log_Hora." ".$Log_Tipo."</center>";
   echo $Imprimir_Log;
   mysqli_close($conn);
}
//////////////////////////////////////////////////////////////////////////////////////////////
?>   
 <!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->
 <!-- Page Content -->
 <div class="container">
 <center><h2>Mostrar Contenido</h2></center>
 <hr>
 <button onclick="muestra_oculta('miembrosclan')" type="button" class="btn btn-primary btn-lg btn-block">Mostrar/Ocultar Historial Miembros</button>
 <button onclick="muestra_oculta('ausenciasclan')" type="button" class="btn btn-primary btn-lg btn-block">Mostrar/Ocultar Historial de Ausencias</button>
 <hr> 
 <div id="miembrosclan">
 <center><h2>Historial de Miembros en el Clan</h2></center>
 <hr>
 <?php Imprimir_Consulta_De_Miembros () ?> 
 </div>
 
 <br>
 <div id="ausenciasclan">
 <center><h2>Historial de Ausencias en Guerras</h2></center>
 <hr>
 <?php Imprimir_Ausencias_En_Guerras () ?>
 <br>   
 </div>
 <center><h2>Opciones de Administracion</h2></center>
 <hr>
 <a href="script_verificar_clan.php"> 
 <button type="button" class="btn btn-primary btn-lg btn-block">Actualizar miembros manualmente</button>
 </a>
 <br>
 <?php Verificar_Ultimo_Log () ?> 
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
