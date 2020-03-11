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
<!--//////////////////////////////////////////// -->
<!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
<!--//////////////////////////////////////////// -->
<body>
  
 <!--//////////////////////////////////////////// -->
 <?php include ('nvar.php'); ?>
 <!--//////////////////////////////////////////// -->

  
 <!-- Header -->
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
 <!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->
 <?php  
 //link con la documentacion https://docs.royaleapi.com/#/authentication?id=key-management
 //$token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $token="AQUI VA EL TOKEN";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts);
 $json = file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q",true, $context);  
 $datos_clan=json_decode($json);
 $miembros= $datos_clan->members; 
 //////////////////////////////////////////////////////
function Imprimir_Descripcion_Del_Clan ($datos_clan) {
   $descripcion_clan=$datos_clan->description;
   echo "<strong>Descripcion del Clan: </strong>".$descripcion_clan;
   echo "<br>";
   echo "<strong>Staff del Clan: </strong>Los siguientes miembros son los encargados de la organizacion del mismo.";
}
function Imprimir_Datos_Del_Clan ($datos_clan) {
   $etiqueta_clan=$datos_clan->tag;
   $nombre_clan=$datos_clan->name;
   $descripcion_clan=$datos_clan->description;
   $puntaje_clan=$datos_clan->score;
   $miembrosdel_clan=$datos_clan->memberCount;
   $copasrequeridas_clan=$datos_clan->requiredScore;
   $donaciones_clan=$datos_clan->donations;
   $tipoinvitacion_clan=$datos_clan->type;   
   echo "<strong>Creador: </strong>Ari";
   echo "<br>";      
   echo "<strong>Nombre: </strong>".$nombre_clan;
   echo "<br>";          
   echo "<strong>Copas del Clan: </strong>".$puntaje_clan;
   echo "<br>"; 
   echo "<strong>Miembros: </strong>".$miembrosdel_clan;
   echo "<br>";
   echo "<strong>Donaciones Semanales: </strong>".$donaciones_clan;
   echo "<br>";
   echo "<strong>Etiqueta: </strong>".$etiqueta_clan;
   echo "<br>";
   echo "<strong>Tipo de Ingreso: </strong>".$tipoinvitacion_clan;
   echo "<br>";
   echo "<strong>Copas Requeridas: </strong>".$copasrequeridas_clan;
} 
 //////////////////////////////////////////////// 
function Imprimir_Miembros_Del_Clan ($miembros)  {     
 //me traigo todos los miembros del json para mostrar los miembros del clan    
 $total_de_miembros= count($miembros);  //contamos cuantos miembros tenemos (recordar que el 1er elemento es el 0)  
 echo "<div class='table-responsive'>";
 echo "<table class='table table-bordered table-hover table-sm table-dark'>";
 echo "<thead class='thead-dark'>";
 echo "<tr>";
 echo "<th scope='col'>#</th>";
 echo "<th scope='col'>Nombre</th>";
 echo "<th scope='col'>Rango</th>";
 echo "<th scope='col'>Trofeos</th>";
 echo "<th scope='col'>Torre</th>";
 echo "<th scope='col'>Donaciones</th>";
 echo "<th scope='col'>Recibidas</th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>"; 
 for ($i = 0; $i < $total_de_miembros; $i++) {
   $miembro_nombre=$miembros[$i]->name;  
   $miembro_rango=$miembros[$i]->role; 
   $miembro_trofeos=$miembros[$i]->trophies;
   $miembro_nivel_torre=$miembros[$i]->expLevel;
   $miembro_donaciones=$miembros[$i]->donations;
   $miembro_donaciones_recibidas=$miembros[$i]->donationsReceived;
   $numero=$i+1; 
   if ($miembro_rango=="leader") { 
     $miembro_rango="Lider"; 
     echo "<tr class='bg-primary'>"; 
     echo "<td>".$numero."</td>";
     echo "<td>".$miembro_nombre."</td>";
     echo "<td>".$miembro_rango."</td>";
     echo "<td>".$miembro_trofeos."</td>";
     echo "<td>".$miembro_nivel_torre."</td>";
     echo "<td>".$miembro_donaciones."</td>";
     echo "<td>".$miembro_donaciones_recibidas."</td>";
     echo "</tr>";
   }

   if ($miembro_rango=="coLeader"){
     $miembro_rango="Colider";
     echo "<tr class='bg-success'>"; 
     echo "<td>".$numero."</td>";
     echo "<td>".$miembro_nombre."</td>";
     echo "<td>".$miembro_rango."</td>";
     echo "<td>".$miembro_trofeos."</td>";
     echo "<td>".$miembro_nivel_torre."</td>";
     echo "<td>".$miembro_donaciones."</td>";
     echo "<td>".$miembro_donaciones_recibidas."</td>";
     echo "</tr>";
   } 

   if ($miembro_rango=="elder") {
     $miembro_rango="Veterano";
     echo "<tr>"; 
     echo "<td>".$numero."</td>";
     echo "<td>".$miembro_nombre."</td>";
     echo "<td>".$miembro_rango."</td>";
     echo "<td>".$miembro_trofeos."</td>";
     echo "<td>".$miembro_nivel_torre."</td>";
     echo "<td>".$miembro_donaciones."</td>";
     echo "<td>".$miembro_donaciones_recibidas."</td>";
     echo "</tr>";
   }

   if ($miembro_rango=="member") {
     $miembro_rango="Miembro";
     echo "<tr>"; 
     echo "<td>".$numero."</td>";
     echo "<td>".$miembro_nombre."</td>";
     echo "<td>".$miembro_rango."</td>";
     echo "<td>".$miembro_trofeos."</td>";
     echo "<td>".$miembro_nivel_torre."</td>";
     echo "<td>".$miembro_donaciones."</td>";
     echo "<td>".$miembro_donaciones_recibidas."</td>";
     echo "</tr>";
   }     
  } 
 echo "</tbody>";
 echo "</table>";
 echo "</div>";  
} 
//////////////////////////////////////////////// 
function Listado_Colideres_Lideres ($miembros) {
 //me traigo todos los miembros del json para mostrar los miembros del clan    
 $total_de_miembros= count($miembros);  //contamos cuantos miembros tenemos (recordar que el 1er elemento es el 0)  
 for ($i = 0; $i < $total_de_miembros; $i++) {
   $miembro_nombre=$miembros[$i]->name;  
   $miembro_rango=$miembros[$i]->role;    
   if ($miembro_rango=="leader") {$miembro_rango="Lider";} 
   if ($miembro_rango=="coLeader") {$miembro_rango="Colider";}
   if ($miembro_rango=="elder") {$miembro_rango="Veterano";}
   if ($miembro_rango=="member") {$miembro_rango="Miembro";}
   
   if ($miembro_rango=='Lider') {
     echo "<strong> Lider:  </strong>".$miembro_nombre."<br>";
   }
   if ($miembro_rango=='Colider') {
     echo "<strong> Colider: </strong>".$miembro_nombre."<br>";
   }  
  }   
}
?>
<!--//////////////////////////////////////////// -->
 <!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
 <!--//////////////////////////////////////////// -->

 <!-- Page Content -->
 <div class="container">
 <div class="row">
 <div class="col-md-8 mb-5">
 <h2>Sobre Nosotros</h2>
 <hr>
 <?php Imprimir_Descripcion_Del_Clan ($datos_clan);?>      
 <br>
 <?php Listado_Colideres_Lideres ($miembros); ?>      
 </div>
 <div class="col-md-4 mb-5">
 <h2>Datos del Clan</h2> 
 <hr>
 <?php Imprimir_Datos_Del_Clan ($datos_clan);?>
 <br>                  
 </div>
 </div>
 <!-- /.row -->
 <hr>
 <center><h2>Miembros Actuales del Clan</h2></center>
 <hr>    
 <?php Imprimir_Miembros_Del_Clan($miembros);?>     
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
