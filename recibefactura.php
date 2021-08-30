<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");
// Include config file
require_once "config.php";
?>

<br>
<br>
<br>

<div class ="factura mx-auto my-auto">
<table class ="mx-auto my-auto">
<h3>RECEIPT</h3> 
	<div class="image-container">
	<img src="LogTicket.jpg" width="88" height="78">
	</div>
	<br>
	<p>C.C. GALERIAS SOLPRESS</p>
    <br>
	<br>
<?php


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Captura de datos
	$fechasa = date("Y-m-d");
	$horasa = date("H:i:s");
	$combinedDTS = date("Y-m-d H:i:s");
  
	$numT = test_input($_POST['numticket']);
	$placa = test_input($_POST['placa']);

	}
	
	function test_input($data) {
	$placa = trim($data);
	$numT = trim($data);
	return $data;
	}

  // Selecci�n de la base de datos
//mysql_select_db("usuarios") or die("Error en la selecci�n de la Base de Datos");
//Si entra con el n�mero de ticket
if($numT!=0){
	//Se hace consulta para la actualizacion de las salidas
	$consultaSQL1 ="UPDATE ticket SET fechasalida='$fechasa', horasalida='$horasa' WHERE numeroticket='$numT'"; 
	$result1 = mysqli_query($mysqli, $consultaSQL1);
	//consulta para la extraccion de entradas
	$consultati = "SELECT * FROM ticket WHERE numeroticket = '$numT';";
	$resultadoti = mysqli_query($mysqli, $consultati);
	//Recorrido del cursor de fila en fila
	$cont=0;
	$aux=0;
	while ($fila = mysqli_fetch_array($resultadoti)){
	//Proceso de cada una de las filas para validar que el carro salga una vez  
     		if($fila['monto']!=NULL)
        		{$aux=1;}
	 		else
	 			{//Se extraen datos para calcular monto
				 $fechaentra=$fila['fechaentrada'];	
	  			 $horaentra=$fila['horaentrada']; 
				 $combinedDTE = date('Y-m-d H:i:s', strtotime("$fechaentra $horaentra"));
      			 $cont=1;}
	  }
	if($aux==1)
	{echo "<p class='factura_alert'>El numero de ticket introducido le pertenece a otro vehiculo que ya salio del 	estacionamiento</p> <br />";}	  
	else if($cont==0)
	{echo "<p class='factura_alert'>No se encontro ningun cliente con el numero de ticket introducido</p> <br />";
	}
	else
	{//calculo de monto
	//var_dump($combinedDTE);die();
	 //$totalhora= abs(intval($horasa) - intval($horaentra)) / 3600);
     $diff_in_sec = abs(strtotime($combinedDTS) - strtotime($combinedDTE));
	 $diff_in_hrs = round($diff_in_sec / 3600);
	 //var_dump($diff_in_hrs);
	//	die();
	 //echo $horasa;
	 //echo gettype($totalhora);
	// die();
	 //se captura minutos para calcular tiempo
	 $minutos1=date("i",strtotime($horasa));
	 $minutos2=date("i",strtotime($horaentra));
	 	if($minutos1<$minutos2)
			{$mintotal=$minutos2-$minutos1;}
		else
		{$mintotal=$minutos1-$minutos2;}
	  //Se calcula monto
	  $monto=$diff_in_hrs*1090 + $mintotal*80;
	  //Se verifica monto m�nimo
	  if($monto<1090)
		{$monto=1090;}	 
      //salida de datos  
	    echo "Factura No 000<b>",$numT, "</b><br />";
      	echo "<br><p class='resultado'>Fecha de Entrada:      <b>",$fechaentra, "</b></p>";
        echo "<p class='resultado'>Hora de Entrada:       <b>",$horaentra, "</b></p>";
		echo "<p class='resultado'>Tiempo de permanencia: <b>",$diff_in_hrs,":",$mintotal,"</b></p>";
		echo "<p class='resultado'>Fecha de Salida:       <b>",$fechasa, "</b></p>";
		echo "<p class='resultado'>Hora de Salida:        <b>",$horasa, "</b></p>";
		echo "<p class='resultado'>Monto a Pagar Bs.......<b>",$monto, "</b></p>";
	  	
		//inserto el total cancelado en la tabla
		$consultamonto ="UPDATE ticket SET monto='$monto' WHERE numeroticket='$numT'"; 		
		$resultadomo = mysqli_query($mysqli, $consultamonto);
		//Elimino de tabla validar
		$consul ="DELETE FROM tempo WHERE id = '$numT'";
		$resul= mysqli_query($mysqli, $consul);
  		if ($result1 and $resultadoti and $resultadomo) 
     		echo "<b></b><br /><br />\n";
  		else
    		 die("Error en la insercion de los datos");
	  }
}
//si perdio el ticket
else
{//Se busca id de la tabla vehiculo
	 $consulta = "SELECT * FROM vehiculo WHERE placa = '$placa'";
	 $resultado = mysqli_query($mysqli, $consulta);
 	 //Recorrido del cursor de fila en fila
 	 $cont=0;
	  $id=0;
  		while ($fila = mysqli_fetch_array($resultado)){
        //Proceso de cada una de las filas
     	$id=$fila['id'];
	 	$cont=1;}
		if($cont==0)
			{echo "<p class='factura_alert'>No se encontro ningun cliente con el numero de placa introducido</p> <br />";}	 
 		else
		{//Se hace consulta para la actualizacion de las salidas
		 $consultaSQL1 ="UPDATE ticket SET fechasalida='$fechasa', horasalida='$horasa' WHERE 	numeroticket='$id'";
		$result1 = mysqli_query($mysqli, $consultaSQL1);
		//consulta para la extraccion de entradas
		$consultati = "SELECT * FROM ticket WHERE numeroticket = '$id'";
		$resultadoti = mysqli_query($mysqli, $consultati);
		//Recorrido del cursor de fila en fila
		$aux=0;
		//Ciclo que da el total de puestos disponibles
		while ($fila = mysqli_fetch_array($resultadoti)){
		//Proceso de cada una de las filas para validar que el carro salga una vez
     	if($fila['monto']!=NULL)
        	{$aux=1;}
	 	else	
	 		{$fechaentra=$fila['fechaentrada'];	
	 		$horaentra=$fila['horaentrada']; 
	    	$combinedDTE = date('Y-m-d H:i:s', strtotime("$fechaentra $horaentra"));
			}
        }
		if($aux==1)
			{echo  "<p class='factura_alert'>El numero de placa introducido le pertenece a otro vehiculo que ya salio del estacionamiento</p> <br />";}	  
		else
		{//calculo de monto
			$diff_in_sec = abs(strtotime($combinedDTS) - strtotime($combinedDTE));
			$diff_in_hrs = round(($diff_in_sec / 3600),PHP_ROUND_HALF_DOWN);

			//se captura minutos para calcular tiempo
			$minutos1=date("i",strtotime($horasa));
			$minutos2=date("i",strtotime($horaentra));
			if($minutos1<$minutos2)
				{$mintotal=$minutos2-$minutos1;}
			else
				{$mintotal=$minutos1-$minutos2;}
		//Monto con recargo de Bs 20000 por ticket perdido
		$monto=$diff_in_hrs*1090 + $mintotal*80;
		//Verifica monto m�nimo
		if($monto<1090)
		{$monto=1090;}
		 //recargo por p�rdida de ticket
		 $mrecargo=20000;
		 //Calcula monto total
		 $total=$monto+$mrecargo;
	     //Salida de datos
		 echo "Factura No 000<b>",$id, "</b><br />";
         echo "Fecha de Entrada: <b>",$fechaentra,"</b><br />";
         echo "Hora de Entrada:  <b>",$horaentra,"</b><br />";
		 echo "Tiempo de permanencia:   <b>",$diff_in_hrs,":",$mintotal,"</b><br />";
	 	 echo "Fecha de Salida:  <b>",$fechasa,"</b><br />";
		 echo "Hora de Salida:   <b>",$horasa,"</b><br />";
		 echo "Monto: Bs.        <b>",$monto,"</b><br />";
         echo "Recargo Ticket Perdido Bs.:<b>",$mrecargo, "</b><br />";
		 echo "Total a Pagar Bs...............<b>",$total,"</b><br />";
         //Inserta campo monto en la tabla 
		 $consultamonto ="UPDATE ticket SET monto='$total' WHERE numeroticket='$id'"; 		
		 $resultadomo = mysqli_query($mysqli, $consultamonto);
		 //Elimina placa de vehiculo que sale
		 $consul ="DELETE FROM tempo WHERE placa = '$placa'";
		 $resulta= mysqli_query($mysqli, $consul); 
  		 if ($result1 and $resultadoti and $resultadomo) 
     		echo "<b></b><br /><br />\n";
  		 else
     		die("Error en la insercion de los datos");
		}//Cierre de ultimo else
	}//Cierre del while
}//Cierra else de ticket perdido
// Se cierra la conexi�n
  mysqli_close($mysqli);
?>


<br>
<p class="Estilo4 Estilo5"><strong>HORARIO</strong></p>
<p class="Estilo4 Estilo5">Lunes a Sabado de 8:00 am a 9:00 pm</p>
<p class="Estilo4 Estilo5">Domingos de 9:00 am a 8:00pm </p>
<p class="Estilo1 Estilo4">Gracias por su Visita</p>
</table>
</div>
<td>
<div class="container2">
		<div class="container2">
		<input class="btn btn-primary" name="Imprimir" type="submit" class="Estilo2" id="Imprimir" value="Imprimir" onClick="window.print()">
		<br><br><p><strong><a href="factura.php" target="marco central">volver</a></strong></p>	
		</div>
</div>
</td>
</html>