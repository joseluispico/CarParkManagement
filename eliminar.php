<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");
// Include config file
require_once "config.php";


  // Selecci�n de la base de datos
  //mysql_select_db("usuarios") or die("Error en la seleccion de la Base d Datos");
  if (isset($_GET['id'])){
  $userID = $_GET['id'];
  //Preparaci�n y ejecuci�n de la consulta
  $consultaSQL ="DELETE FROM usuarios WHERE id = $userID";
  $resultado = mysqli_query($mysqli, $consultaSQL);
  if ($resultado){
    echo "<b>Usuario eliminado satisfactoriamente</b><br/><br/>\n";
    header("Location: administrar_usuarios.php");
    
  } 
  else{
    die("Error en la eliminacion");  
  }
}
   // Liberamos los recursos de las consultas	
   mysqli_free_result($resultado); 
   // Se cierra la conexi�n
   mysqli_close($mysqli);  	 
// Se solicita la ejecuci�n de la nueva instrucci�n (Insert) 
?>