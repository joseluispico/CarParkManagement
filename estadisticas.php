<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");

?>

<br>
<br>
<br>

<div class="container2">
  <h3>Reportes </h3>
</div>

<div>
<tr> 
<td><div class ="container2">
  <p><strong class="Estilo2">Seleccione una Opcion</strong></p>
  <p>
    <select name="estadistica" id="estadistica" size="1" onChange="document.location=this.options[this.selectedIndex].value">
      <option value="0"></option>
      <option value="diaria.php">Reporte Diario</option>
	  <option value="semanal.php">Reporte Semanal</option>
      <option value="mensual.php">Reporte Mensual</option>
	  <option value="periodo.php">Reporte Periodo</option>
    </select>
  </p>
</div></td>

</div>

</body>
</html>