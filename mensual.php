<?php 
include ("seguridad.php");
include ("banner.php");
include ("menu.php");

?>

<br>
<br>
<br>

<div class="container2">
  <h3>Reporte Mensual</h3>
</div>

<div class="container2">
  <h3><strong>Seleccione el mes en que desea ver los movimientos del estacionamiento.</strong></h3>
</div>

<div class="container2">
<br>

<form name='consultacuenta' action='recibemensual.php' method='POST'>
<table class="mx-auto my-auto">
<tr> 
<td><b>Fecha: <b></td>
<td>
<div class="form-group">
				<select name="Mes">                   			
          <option selected>01</option>
				<?php
				for ($i=2; $i<=12; $i++)
				{
					echo sprintf("<option>%'02d</option>\n",$i);
        }
				?>
        </select>
				<select name="Anual">                   			
        <option selected>2021</option>
				<?php
				for ($i=2015; $i<=2030; $i++)
				{
				echo "<option>".$i."</option>\n";
        }
				?>
        </select>
</div>      
</td>
</tr>

</table>
      <div class="container2">
        <input class="btn btn-primary" name="Registrar" type="submit" id="Registrar"> 
        <input class="btn btn-secondary" name="Borrar" type="reset" id="Borrar" value="Borrar">
      </div>


</form>
</div>
   
<div class="container2"><strong>
    <a href="estadisticas.php">volver</a></strong>
</div>

</body>
</html>