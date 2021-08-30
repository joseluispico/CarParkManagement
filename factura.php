<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");
include ("config.php");

?>

<br>
<br>
<br>

<div class="container2">
  <h3>Registro de Salida de Vehiculo</h3>
</div>

<div class="container2">
  <h3><strong>Introduzca el numero del ticket o la placa del vehiculo.</strong></h3>
</div>


<script>
function valida_fact(){
var error_factura = "";
if(document.vehiculo.numticket.value.length!=0 && document.vehiculo.placa.value.length==0){
var numero=/^(([0-9-\.]){2,3})$/
	if(!numero.test(vehiculo.numticket.value)){
	error_factura="Campo Numero de Ticket incorrecto";
	document.getElementById( "error_display" ).innerHTML = error_factura;
	return false;
	}
}
// else if(document.vehiculo.numticket.value.length==0 && document.vehiculo.placa.value.length!=0){
// var placa=/^(([a-zA-Z]{3})+(\-)+([0-9]{2,3})*([a-zA-Z]{0,1})|([0-9-\.]){6,8})$/
// //var cedula=/^(([0-9-\.]){6,8})$/
// 	    if(!placa.test(vehiculo.placa.value))
// 		{error_factura="Campo Placa incorrecto";
// 		 document.getElementById( "error_display" ).innerHTML = error_factura;
// 		 return false;
// 		}
// }
else if(document.vehiculo.placa.value.length==0 && document.vehiculo.numticket.value.length==0){
				error_factura="Tiene que introducir el numero del ticket o Placa del conductor";
				document.getElementById( "error_display" ).innerHTML = error_factura;
		 		return false;
			}
else if(document.vehiculo.placa.value.length!=0 && document.vehiculo.numticket.value.length!=0){
				error_factura="Si ya introdujo el numero del ticket no es necesario introducir la placa";
				document.getElementById( "error_display" ).innerHTML = error_vehiculo;
				return false;
				
			}
else{

	return true;
}
}
</script>
<br>
<br>
<form name="vehiculo" method="post" action="recibefactura.php" onsubmit="return valida_fact()">

<table class="mx-auto my-auto">
 <div align="center">
  <tr>
      <td width="75"><p class="Estilo2">Numero de Ticket 
      <td colspan="2"><div align="left">
      <input class="form-control" name="numticket" type="text" id="numticket" size="20" maxlength="3"></div></tr>
 <tr>
      
 <tr>
    <td><span class='Estilo2'> Placa </span>
	<td><select name='placa' id='placa' class='form-control' style="color: black !important;">
	 <?php 
	 //consulta para la extraccion de entradas
	$consultaplaca = "SELECT ti.numeroticket, vi.placa FROM ticket as ti  INNER JOIN vehiculo as vi ON vi.id = ti.numeroticket WHERE ti.monto is NULL";
	$resultadoplaca = mysqli_query($mysqli, $consultaplaca);
	if (mysqli_num_rows($resultadoplaca)==0)
	{
		$no_records="No records";
		echo "<option value=''>".$no_records."</option>";
	}else{
	$no_records="Seleccione vehiculo";
	echo "<option value=''>".$no_records."</option>";
	//Recorrido del cursor de fila en fila
	while ($fila = mysqli_fetch_array($resultadoplaca)){
	//Proceso de cada una de las filas para validar que el carro salga una vez  
    //Se extraen datos para calcular monto
				$id = ['numeroticket'];
	  			$placa = $fila['placa']; 
				echo "<option value='".$placa."'>".$placa."</option>";
	}
}
	mysqli_close($mysqli);
	 ?> 
	 </select>
      <td width="164"><div>
      <div align="center">(solo en caso de extravio del ticket)</div>
      </div>
	</tr>
</div> 
</table>
<div class="container2"><span class="help-block" id="error_display"> </span></div>

	<div class="container2">
        <input class="btn btn-primary" name="Registrar" type="submit" id="Registrar" value="Aceptar">
        
        <input class="btn btn-secondary" name="Borrar" type="reset" id="Borrar" value="Borrar">
    </div>
 </form>
 </body>
</html>


