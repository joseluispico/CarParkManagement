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
   <p>CIERRE BIEN SU AUTOMOVIL</p>
<br>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Captura de datos
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$placa = test_input($_POST['placa']);
$modelo = test_input($_POST['modelo']);
$tipove = test_input($_POST['tipovehiculo']);
}

function test_input($data) {
$placa = trim($data);
$modelo = trim($data);
$tipove = trim($data);
return $data;
}

  // Selecci�n de la base de datos
//mysql_select_db("usuarios") or die("Error en la seleccion de la Base de Datos");
$consultaplaca = "SELECT * FROM Tempo WHERE Placa ='$placa'";
$resultado = mysqli_query($mysqli, $consultaplaca);
$aux = mysqli_num_rows($resultado);  
$id = 0;
if($aux > 0)
{echo "<p class='factura_alert'>El vehiculo con la placa ".$placa." que intenta ingresar ya se encuentra en el estacionamiento, Rectifique.</p><br />";}
else
{
$consultave = "SELECT * FROM vehiculo";
$resultadove = mysqli_query($mysqli, $consultave);
//Recorrido del cursor de fila en fila
while ($fila = mysqli_fetch_array($resultadove)){
//Proceso de cada una de las filas  
     $id=$fila['id'];	 }
	  $ticket=$id+1;    	  
        echo "<b>Ticket: A-000", $ticket, "</b><br>";
		    echo "<br><p class='resultado'>Placa: <b>", $placa, "</b></p>";
		    echo "<p class='resultado'>Modelo: <b>", $modelo, "</b></p>";
		    echo "<p class='resultado'>Tipo de Vehiculo: <b>", $tipove, "</b></p>";
        echo "<p class='resultado'>Fecha: <b>", $fecha, "</b></p>";
        echo "<p class='resultado'>Hora: <b>", $hora, "</b></p>";
		  
//La siguiente instrucci�n ser� la inserci�n de un dato
  $consultaSQL1 ="INSERT INTO vehiculo(id, placa, modelo, tipovehiculo)
         VALUES ('$ticket', '$placa','$modelo','$tipove')"; 
  $consultaSQL2 ="INSERT INTO ticket(numeroticket, fechaentrada, horaentrada)
         VALUES ('$ticket','$fecha','$hora')";   
  $consultaSQL3 ="INSERT INTO tempo(id, placa) VALUES ('$ticket','$placa')";   		       
// Se solicita la ejecuci�n de la nueva instrucci�n (Insert) 
  $resultado1 = mysqli_query($mysqli, $consultaSQL1);
  $resultado2 = mysqli_query($mysqli, $consultaSQL2);
  $resultado3 = mysqli_query($mysqli, $consultaSQL3);
 
  if ($resultado1 and $resultado2 and $resultado3) 
  echo "<b></b><br />\n";
  else
     die("Error en la insercion de los datos");
}

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
		<input class="btn btn-primary" name="Imprimir" type="submit" class="Estilo2" id="Imprimir" value="Imprimir" onClick="window.print()">
		<br><br><strong><a href="entrada.php">volver</a></strong>
		</div>
</div>
</td>
</html>