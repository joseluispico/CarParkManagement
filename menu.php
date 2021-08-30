
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Inicio</a>
      <?php if ($_SESSION["tipousuario"] =='Administrador'){?>
      <a class="nav-item nav-link" href="administrar_usuarios.php">Administrar Usuario</a>
      <?php }?>
      <a class="nav-item nav-link" href="entrada.php">Registrar Entrada</a>
      <a class="nav-item nav-link" href="factura.php">Registrar Salida</a>
      <a class="nav-item nav-link" href="estadisticas.php">Reportes</a>
      <a class="nav-item nav-link" href="salida.php">Salir</a>
    </div>
    
  </div>
  <div>
    <span class="navbar-text  my-2 my-sm-0">
      <?php echo "Bienvenido ".$_SESSION['nombre']."!";?>
    </span>
  </div>
</nav>