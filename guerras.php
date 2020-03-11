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
<!--//////////////////////////////////////////// -->
<!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
<!--//////////////////////////////////////////// -->
<?php  
 //link con la documentacion https://docs.royaleapi.com/#/authentication?id=key-management
 $token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Mjc3NCwiaWRlbiI6IjMwNDAyOTI5MjcyNjE5MDA4MiIsIm1kIjp7fSwidHMiOjE1NjQwMDMxMzMyNDR9.9j1xQEZK-BXO9zi_J_q3AFGbUOQLp3UcnDIQBlp33Ps";
 $opts = ["http" => ["header" => "auth:" . $token]];
 $context = stream_context_create($opts);
 $json = file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q",true, $context);
 $jsonguerras=file_get_contents("https://api.royaleapi.com/clan/PVC2PU8Q/war",true, $context);   
 //Me traigo todos los datos del clan para mostrarlos en pantalla
 $datos_clan=json_decode($json);     
 $etiqueta_clan=$datos_clan->tag;
 $nombre_clan=$datos_clan->name;
 $descripcion_clan=$datos_clan->description;
 $puntaje_clan=$datos_clan->score;
 $Cantidad_miembros_del_clan=$datos_clan->memberCount;
 $copasrequeridas_clan=$datos_clan->requiredScore;
 $donaciones_clan=$datos_clan->donations;
 $tipoinvitacion_clan=$datos_clan->type;   
 ////////////////////////////////////////////////////////////////////////////////////////
 //Me traigo todos los datos de la guerra actual del clan para mostrarlos en pantalla
 $datos_clan_guerra=json_decode($jsonguerras);
 $guerra_estado=$datos_clan_guerra->state;
 $guerra_etiqueta=$datos_clan_guerra->clan->tag;
 $guerra_name=$datos_clan_guerra->clan->name;  
 $guerra_participantes=$datos_clan_guerra->clan->participants;
 $guerra_batallas=$datos_clan_guerra->clan->battlesPlayed; 
 $guerra_victorias=$datos_clan_guerra->clan->wins;  
 $guerra_torres_caidas=$datos_clan_guerra->clan->crowns; 
 $guerra_trofeos=$datos_clan_guerra->clan->warTrophies;
 $guerra_ausentes=$Cantidad_miembros_del_clan-$guerra_participantes;
 //Debemos chequear si estamos en guerra , y en caso de estar , si es dia de recoleccion o no
  if ($guerra_estado=="collectionDay") {
   $guerra_tiempo_restante=$datos_clan_guerra->collectionEndTime;
   $guerra_estado="Dia de Recoleccion"; 
  }
  if ($guerra_estado=="warDay") {
   $guerra_tiempo_restante=$datos_clan_guerra->warEndTime;
   $guerra_estado="Dia de Guerra";
  }
  if ($guerra_estado=="notInWar") {
   $guerra_tiempo_restante="No hay guerras en marchas";
   $guerra_estado="No hay guerras iniciadas por el momento";
  } 
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //Ahora vamos a darle formato a las fechas y calcular el tiempo restante para que termine la coleccion o la guerra
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $formato_fecha = date_create(); 
 date_timestamp_set($formato_fecha, $guerra_tiempo_restante);
 //$fechafin=date_format($fecha, 'U = d-m-Y H:i:s') . "\n";
 $Finalizacion_Evento=date_format($formato_fecha,'d-m-Y H:i'). "\n";
 $HoraActual_Evento=date_format(date_create(),'d-m-Y H:i'). "\n";    
 $HoraActual_Evento_Aux= new DateTime($HoraActual_Evento); 
 $Finalizacion_Evento_Aux= new DateTime($Finalizacion_Evento); 
 $TiempoRestante= $HoraActual_Evento_Aux->diff($Finalizacion_Evento_Aux);  
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
function Imprimir_Participantes_Guerra ($datos_clan_guerra) {
  //Le pasamos el array con todos los datos de la guerra actual y me imprime los participantes  
  $participantes=$datos_clan_guerra->participants;
  $guerra_participantes=$datos_clan_guerra->clan->participants;
  $guerra_estado=$datos_clan_guerra->state;
  if ($guerra_estado=="collectionDay") {
   $guerra_tiempo_restante=$datos_clan_guerra->collectionEndTime;
   $guerra_estado="Dia de Recoleccion"; 
  }
  if ($guerra_estado=="warDay") {
   $guerra_tiempo_restante=$datos_clan_guerra->warEndTime;
   $guerra_estado="Dia de Guerra";
  }
  if ($guerra_estado=="notInWar") {
   $guerra_tiempo_restante="No hay guerras en marchas";
   $guerra_estado="No hay guerras iniciadas por el momento";
  } 
 echo "<div class='table-responsive'>";
 echo "<table class='table table-bordered table-hover table-sm table-dark'>";
 echo "<thead class='thead-dark'>";
 echo "<tr>";
 echo "<th scope='col'>#</th>";
 echo "<th scope='col'>Nombre</th>";
 echo "<th scope='col'>Etiqueta</th>";
 echo "<th scope='col'>Recolectadas</th>";
 echo "<th scope='col'>Batallas</th>";
 echo "<th scope='col'>Victorias</th>";
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>"; 
  for ($i = 0; $i < $guerra_participantes; $i++) {
   $participantes_guerra_nombre=$datos_clan_guerra->participants[$i]->name;
   $participantes_guerra_etiqueta=$datos_clan_guerra->participants[$i]->tag;
   $participantes_guerra_recolectadas=$datos_clan_guerra->participants[$i]->cardsEarned;
   $participantes_guerra_jugadas=$datos_clan_guerra->participants[$i]->battlesPlayed;
   $participantes_guerra_victorias=$datos_clan_guerra->participants[$i]->wins;   
   $numero=$i+1;

   if (($guerra_estado=="Dia de Guerra") AND ($participantes_guerra_jugadas==0)) {
     //si entro aca es el dia de guerra y aun no jugo la/las batallas
     echo "<tr class='bg-light'>"; 
     echo "<td class='text-dark'>".$numero."</td>";    
     echo "<td class='text-dark'>".$participantes_guerra_nombre."</td>";
     echo "<td class='text-dark'>".$participantes_guerra_etiqueta."</td>";
     echo "<td class='text-dark'>".$participantes_guerra_recolectadas."</td>";
     echo "<td class='text-dark'>".$participantes_guerra_jugadas."</td>";
     echo "<td class='text-dark'>".$participantes_guerra_victorias."</td>";
     echo "</tr>"; 
    }
   else { //bg-dark

      if ($participantes_guerra_jugadas>0) {
       echo "<tr class='bg-success'>";      
       echo "<td>".$numero."</td>";    
       echo "<td>".$participantes_guerra_nombre."</td>";
       echo "<td>".$participantes_guerra_etiqueta."</td>";
       echo "<td>".$participantes_guerra_recolectadas."</td>";
       echo "<td>".$participantes_guerra_jugadas."</td>";
       echo "<td>".$participantes_guerra_victorias."</td>";
       echo "</tr>"; 
      }
      else {
       echo "<tr class='bg-danger'>";      
       echo "<td>".$numero."</td>";    
       echo "<td>".$participantes_guerra_nombre."</td>";
       echo "<td>".$participantes_guerra_etiqueta."</td>";
       echo "<td>".$participantes_guerra_recolectadas."</td>";
       echo "<td>".$participantes_guerra_jugadas."</td>";
       echo "<td>".$participantes_guerra_victorias."</td>";
       echo "</tr>"; 
      }  
    }
  }
 echo "</tbody>";
 echo "</table>";
 echo "</div>";
}  
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
function Imprimir_Ausentes_Guerra ($datos_clan,$datos_clan_guerra) { 
 $miembros_del_clan= $datos_clan->members; 
 $participantes=$datos_clan_guerra->participants;
 $Cantidad_miembros_del_clan=$datos_clan->memberCount; 
 $guerra_participantes=$datos_clan_guerra->clan->participants;  
 $contador_no_jugaron=0; 
 echo "<div class='table-responsive'>";
 echo "<table class='table table-bordered table-hover table-sm table-dark'>";
 echo "<thead class='thead-dark'>";
 echo "<tr>";
 echo "<th scope='col'>#</th>";
 echo "<th scope='col'>Nombre</th>";
 echo "<th scope='col'>Etiqueta</th>"; 
 echo "</tr>";
 echo "</thead>";
 echo "<tbody>"; 
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
       echo "<tr class='bg-danger'>"; 
       echo "<td>".$contador_no_jugaron."</td>";
       echo "<td>".$miembroanalizado."</td>";
       echo "<td>".$No_Jugo_Etiqueta."</td>";
       echo "</tr> "; 
    }
  }
 echo "</tbody>";
 echo "</table>";
 echo "</div>";
}
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
function Batallas_Pendientes_Recoleccion ($datos_clan,$datos_clan_guerra) { 
 $miembros_del_clan= $datos_clan->members; 
 $participantes=$datos_clan_guerra->participants;
 $Cantidad_miembros_del_clan=$datos_clan->memberCount; 
 $guerra_participantes=$datos_clan_guerra->clan->participants;  
 for ($aux1 = 0; $aux1 < $Cantidad_miembros_del_clan; $aux1++) {
   $miembroanalizado=$miembros_del_clan[$aux1]->name;
    for ($aux2=0; $aux2 < $guerra_participantes; $aux2++) {      
      $participanteanalizado=$participantes[$aux2]->name;
      //Inicia el IF que verifica la participacion del integrante
      if ($miembroanalizado == $participanteanalizado) {
       $participa="SI"; //si esta en 1 se encontro el miembro en la guerra  
       break;         
      }
      else {
       $participa="NO";
      }      
       
     }
     
     if ($participa=="NO") {      
      $No_Jugo=$miembros_del_clan[$aux1]->name;
      echo "<li class='list-group-item list-group-item-warning'>".$No_Jugo."</li>";  
      //echo "<strong>".$No_Jugo."</strong>";          
    }
  }
}
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
 function Batallas_Pendientes_Guerra ($datos_clan_guerra) {
 $guerra_participantes=$datos_clan_guerra->clan->participants;  
  for ($i = 0; $i < $guerra_participantes; $i++) {  
   $participantes_guerra_nombre=$datos_clan_guerra->participants[$i]->name;
   $participantes_guerra_jugadas=$datos_clan_guerra->participants[$i]->battlesPlayed;
    if ($participantes_guerra_jugadas==0) {
     echo "<li class='list-group-item list-group-item-danger'>".$participantes_guerra_nombre."</li>";
    }
  }
}  
 //////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////
 function Verificar_Si_Es_Dia_De_Guerra ($datos_clan_guerra) {
 $guerra_estado=$datos_clan_guerra->state;   
  if ($guerra_estado=="warDay") {   
   return "SI";
  }
  else {
   return "NO";
  }
}

?> 
<!--////////////////////////////////////////////////-->
<!--SOY UNA BARRAA ESPACEADORA EN PLENA MACRISIS -->
<!--////////////////////////////////////////////////-->

  <!-- Page Content -->
  <div class="container">
  

  <div class="row">
  <div class="col-md-8 mb-5">
   <h2>Guerra Actual en el <?php echo $guerra_estado; ?></h2>
   <hr>
   <strong>Estado de la Guerra Actual: </strong><?php echo $guerra_estado; ?>
   <br>              
   <strong>Finalizacion del <?php echo $guerra_estado; ?>: </strong><?php echo $Finalizacion_Evento; ?> hs 
   <br>  
   <strong>Tiempo Restante para finalizar el <?php echo $guerra_estado; ?>: </strong> <?php  echo $TiempoRestante->format("%H:%I")." hs";?>     
   <br> 
   <strong>Trofeos del Clan: </strong><?php echo $guerra_trofeos; ?> Trofeos 
   <br>        
   <strong>Batallas: </strong><?php echo $guerra_batallas; ?> Batallas completadas del <?php echo $guerra_estado; ?>        
   <br>
   <strong>Victorias: </strong><?php echo $guerra_victorias; ?> Victorias durante el <?php echo $guerra_estado; ?> 
   <br>
   <strong>Participantes: </strong><?php echo $guerra_participantes; ?> miembros estan participando actualmente
   <br>  
   <strong>Ausentes: </strong><?php echo $guerra_ausentes; ?> miembros no estan participando actualmente 
   <br> 
  </div>
  <div class="col-md-4 mb-5">
   <h2>Batallas Pendientes</h2> 
   <hr>    
   <?php
    if ($guerra_estado=="No hay guerras iniciadas por el momento") {
     echo "<strong>No hay faltantes porque no hay una guerra iniciada</strong>"; 
    }
    if ($guerra_estado=="Dia de Recoleccion") {
     echo "<ul class='list-group'>";    
     Batallas_Pendientes_Recoleccion ($datos_clan,$datos_clan_guerra);
     echo "</ul>";          
    }
    if ($guerra_estado=="Dia de Guerra") {
     echo "<ul class='list-group'>";     
     Batallas_Pendientes_Guerra ($datos_clan_guerra);
     echo "</ul>";  
    }
   ?>       
   <br> 
  </div>
  </div>
 <!-- /.row -->
 
<br>
<center><h2>Participantes Actuales del <?php echo $guerra_estado; ?> </h2></center>
<hr>
<!-- Vamos a obtener los miembros que participan de la guerra actual --> 
<?php  Imprimir_Participantes_Guerra($datos_clan_guerra); ?>      
<br>

<center><h2>Lista de Ausentes del <?php echo $guerra_estado; ?> </h2></center>
<hr>
<!-- Vamos a obtener los ausentes en las guerras --> 
<?php Imprimir_Ausentes_Guerra($datos_clan,$datos_clan_guerra); ?> 
<br>
<center><h2>Opciones de Administracion <small>(solo disponible durante dia de guerra)</small></h2></center>
<hr>
<?php 
 $condicionguerra=Verificar_Si_Es_Dia_De_Guerra ($datos_clan_guerra);
 if ($condicionguerra=="SI") {
  echo "<a href='script_cargar_ausentes_guerra.php'>"; 
  echo "<button type='button' class='btn btn-primary btn-lg btn-block'>Registrar Ausencias de la guerra</button>";
  echo "</a>";
 }
 else {
  echo "<a href='script_cargar_ausentes_guerra.php'>"; 
  echo "<button type='button' class='btn btn-primary btn-lg btn-block' disabled>Registrar Ausencias de la guerra</button>";
  echo "</a>";
 }
?> 
</div>
<br>
<br>
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