<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");
require_once "config.php";
?>

<br>
<br>
<br>

<div class="container2">
  <h3>Registro de Entrada de Vehiculos</h3>
</div>

<script>
function valida_vehiculo(){
var error_vehiculo ="";
var placa=/^(([a-zA-Z]{3})+(\-)+([0-9]{2,3})*([a-zA-Z]{0,1})|([0-9-\.]){6,8})$/
var modelo=/^(([a-zA-Z-\.\s]){2,15})$/

if(!placa.test(vehiculo.placa.value))
		{error_vehiculo="Campo Placa Incorrecto";
    document.getElementById( "error_display" ).innerHTML = error_vehiculo;
		 return false;
		}
		 else if(!modelo.test(vehiculo.modelo.value))
        {error_vehiculo="Campo Modelo incorrecto";
        document.getElementById( "error_display" ).innerHTML = error_vehiculo;
        return false;
		}
	  else if(document.vehiculo.tipovehiculo.value==0){
	    error_vehiculo="Tiene que seleccionar un tipo de vehiculo";
	    document.getElementById( "error_display" ).innerHTML = error_vehiculo;
	    return false;
	    }
    else{
//el formulario se envia
// document.vehiculo.submit();
return true;
    }

}
</script>

<?php
       
  //Preparaci�n y ejecuci�n de la consulta
  $consulta= "SELECT * FROM ticket";
  $resultado = mysqli_query($mysqli, $consulta);
 
//codigo que calcula el total de puestos disponibles
$cont=0;
  while ($fila = mysqli_fetch_array($resultado)){
     //Proceso de cada una de las filas  
     
	 if(($fila['horasalida'])==0)
	 $cont=$cont+1;
	 }
	$puestos=100-$cont;
	
  // Liberamos los recursos de las consultas	
  mysqli_free_result($resultado); 
  // Se cierra la conexi�n
  mysqli_close($mysqli);
?>
<div class="containeralert" id="dateformat">
           <?php 
	       echo "<div class = 'scroll_text'><------->Alerta: El estacionamiento dispone de ", $puestos, " puestos.<-------></div>";   
     		?>
</div>

<div class="container2">
  &nbsp; 
<h3>DATOS DEL VEHICULO </h3><br>
<form name="vehiculo" method="POST" action="recibevehiculo.php" onsubmit="return valida_vehiculo()"> 
<table class="mx-auto my-auto">

  <tr>
      <td><span class="Estilo2"> Placa </span>
      <td width="123"><input class="form-control" name="placa" type="text" id="placa" size="20" maxlength="8">
      <td width="239">
      <div>
      <div>(Si el vehiculo no posee placa, ingrese CI del conductor)</div><br>
      </div>
  </tr>
 
 <tr>
      <td><span class="Estilo2"> Modelo </span>
      <td colspan="2">
      <input class="form-control" name="modelo" type="text" id="modelo" size="20" maxlength="15"></><br>
 </tr>

 <tr>
      <td><strong class="Estilo2">Tipo </strong></td>
      <td colspan="2">
      
      <select class="form-control" style="color:black!important;" name="tipovehiculo" id="tipovehiculo">
      <option value="0"></option>
      <option value="Liviano">Liviano</option>
      <option value="Pesado">Pesado</option>
      </select>
      </td>
</tr>

 </table>
  <div class="container2"><span class="help-block" id="error_display"> </span></div>

 <br>
    <div class="container2"> 
        <input class="btn btn-primary" name="Registrar" type="submit" class="Estilo2" id="Registrar" value="Registrar">
        
        <input class="btn btn-secondary" name="Borrar" type="reset"  class="Estilo2" id="Borrar" value="Borrar">
    </div>
 </form>
</div>     
</body>
</html>