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

<?php 
$fecha = date("Y-m-d");
$hora = date("H:i:s");
?>
<div align="center">
  <h3>C.C. GALERIAS SOLPRESS   </h3>
  <h3>REPORTE DIARIO RESULTADO </h3>
 <?php //echo "<tr align='justify'>"; 
    echo "<td>Fecha Consulta: <b>". $fecha ."</td>";
		echo "<td>..............</td>";
		echo "<td>Hora Consulta: <b>". $hora ."</td>";
	  ?>
</div>

<?php

$fecha2 = $_POST['Anual'].$_POST['Mes'].$_POST['Dia'];

// var_dump($fecha2);
// die();

//Seleccion de la base de datos
//mysqli_select_db("usuarios") or die("No se encontro la base de datos");
  ?>

<div class="container2">
<center><h3>Informe correspondiente al dia: <?php echo ($_POST['Anual']."-".$_POST['Mes']."-".$_POST['Dia']);?></h3> 
</div>  

<br>
<div align="center">
  <table width="774" height="31" border="0" id="myreport" cellpadding="3" cellspacing="1"> 
      <tr>
  <td width="94" height="25" class="cellcolor"><center>
    <span class="Estilo9">Ticket</span>
  </center>
  </td> 
  <td width="90" height="25" class="cellcolor"><center>
    <span class="Estilo9">Auto</span>
  </center>
  </td> 
  <td width="94" class="cellcolor"><center>
    <span class="Estilo9">Placa</span>
  </center></td>
  <td width="93" class="cellcolor"><center>
    <span class="Estilo9">Tipo</span>
  </center>
  </td>
  <td width="116" class="cellcolor"><center>
    <span class="Estilo9">Hora Entrada</span>
  </center></td>
  <td width="102" class="cellcolor"><center>
    <span class="Estilo9">Hora Salida</span>
  </center></td>
  <td width="135" class="cellcolor"><center>
    <span class="Estilo9">Dinero Cancelado</span>
  </center></td>
    </tr> 


<?PHP
//Preparaci�n y ejecuci�n de la consulta
  $consulta = "SELECT * FROM ticket WHERE fechaentrada= $fecha2";
  $resultado = mysqli_query($mysqli, $consulta);
  $consulta2 = "SELECT * FROM vehiculo";
  $resultado2 = mysqli_query($mysqli, $consulta2); 
  $monto_total=0;
   //Recorrido del cursor de fila en fila

  if (mysqli_num_rows($resultado)==0)
   {
     echo "<h3>No se encontraron vehiculos para el periodo seleccionado</h3>";
   }
  else{
  while ($fila = mysqli_fetch_array($resultado)){
     //Proceso de cada una de las filas
     
	 echo "<tr align='center'>"; 
	 echo "<td class='tablestyle'>",$id=$fila['numeroticket'], "</td>";
	 $consulta2 = "SELECT * FROM vehiculo WHERE id=$id";
   $resultado2 = mysqli_query($mysqli, $consulta2); 
	 while ($fila2 = mysqli_fetch_array($resultado2)){
 	    echo "<td class='tablestyle'>", $fila2['modelo'], "</td>";
			echo "<td class='tablestyle'>", $fila2['placa'], "</td>";
  		echo "<td class='tablestyle'>", $fila2['tipovehiculo'], "</td>";}
			echo "<td class='tablestyle'>", $fila['horaentrada'], "</td>";
      echo "<td class='tablestyle'>", $fila['horasalida'], "</td>";
      echo "<td class='tablestyle'>", $m=$fila['monto'], "</td>";
	 $monto_total= $m+$monto_total;
     } 
    } 
?>	  
 </table>
</div>

 <div>
  <div align="center">
  <table width="774" height="31" border="0" cellpadding="3" cellspacing="1" class="cellcolor">
   
          <td >
          <span class="Estilo9">Total Ingreso Dinero....................................................................................................................................Bs. <?php echo $monto_total?></span>
  </table>
  </p></td>

<div class="container2">
  <p>&nbsp;</p>
  <p><strong>
  <input class="btn btn-primary" name="Imprimir" type="submit" class="Estilo2" id="Imprimir" value="Imprimir Reporte to CSV" onClick="download_table_as_csv('myreport');">
    <br>
    <br>
    <a href="estadisticas.php" target="marco central">volver</a></strong></p>
</div>
</div>
</body>
<script type="text/javascript" src="js/csv_report.js"></script>

</html>
<?php

  // Liberamos los recursos de las consultas	
  mysqli_free_result($resultado);
   // Se cierra la mysqli
  mysqli_close($mysqli);
?>