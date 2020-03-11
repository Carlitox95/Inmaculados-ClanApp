<?php 
//me traigo la direccion donde estoy en el sitio para saber si mostrar el nvar como activo o no despues
$direccionactual=explode('/', $_SERVER["REQUEST_URI"]);
$ruta=array_pop($direccionactual);

if(isset($_SESSION['Usuario'])) {
?> 
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
       <a class="navbar-brand" href="index.php"><img src="recursos/logo.png"></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            //vamos a detectar donde estamos para establecer el elemento active :)
            if ($ruta=="index.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='index.php'>Home</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
            }
            if ($ruta=="guerras.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='guerras.php'>War</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='guerras.php'>War</a></li>";
            }
            if ($ruta=="historial.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='historial.php'>History</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='historial.php'>History</a></li>";
            }
          ?>          
          <li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['Usuario']; ?></a></li>
          <li class="nav-item"><a class="nav-link" href="cerrarsession.php">Salir</a></li>                
        </ul>
      </div>
    </div>
  </nav>

<?php 
} 
else 
{   
?>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
       <a class="navbar-brand" href="index.php"><img src="recursos/logo.png"></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php 
            //vamos a detectar donde estamos para establecer el elemento active :)
            if ($ruta=="index.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='index.php'>Home</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
            }
            if ($ruta=="guerras.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='guerras.php'>War</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='guerras.php'>War</a></li>";
            }
            if ($ruta=="historial.php") {
             echo "<li class='nav-item active'><a class='nav-link' href='historial.php'>History</a></li>";
            }
            else {
             echo "<li class='nav-item'><a class='nav-link' href='historial.php'>History</a></li>";
            }
          ?>                        
        </ul>
      </div>
    </div>
  </nav>

<?php 
}  
?>
