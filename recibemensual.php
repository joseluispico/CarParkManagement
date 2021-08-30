<?php
 //ob_start();
include ("seguridad.php");
include ("banner.php");
include ("menu.php");
require_once "config.php";
?>

<br>
<br>
<br>

<div class="container2" style="overflow-x:auto;">
  <h3>C.C. GALERIAS SOLPRESS   </h3>
  <h3>REPORTE MENSUAL RESULTADOS </h3>
  <?php //echo "<tr align='justify'>"; 
 
  $fecha = date("Y-m-d");
  $hora = date("H:i:s");
    echo "<td>Fecha Consulta: <b>",$fecha, "</td>";
		echo "<td>..............</td>";
		echo "<td>Hora Consulta: <b>",$hora, "</td>";
    $_SESSION['dates'] = $_POST;
    // var_dump($_SESSION['dates']);
    // die();
    $Anual = $_SESSION['dates']['Anual'];
    $Mes = $_SESSION['dates']['Mes'];
	  ?>

   
    <h3>Informe correspondiente al Mes: <?php echo ($_POST['Anual']."-".$_POST['Mes']);?></h3> 
    

    <br>

      <?php
      function fetch_data($Anual, $Mes){
        global $Anual;
        global $Mes;
      //$Anual = $_POST['Anual'];
      //$Mes = $_POST['Mes'];
      // var_dump($Anual);
      // die();
      //Preparaci�n y ejecuci�n de la consulta
      global $mysqli;
      global $monto_total;
        $output = '';
        $consulta = "SELECT ti.numeroticket, ve.modelo, ve.placa, ve.tipovehiculo, ti.horaentrada, ti.horasalida, ti.monto FROM ticket as ti INNER JOIN vehiculo as ve ON ti.numeroticket = ve.id WHERE month(ti.fechaentrada)='$Mes' AND date_format(ti.fechaentrada, '%Y')='$Anual';";
        $resultado = mysqli_query($mysqli, $consulta);
        //$consulta2 = "SELECT * FROM vehiculo";
        //$resultado2 = mysqli_query($mysqli, $consulta2); 
      
        
        //Recorrido del cursor de fila en fila
        if (mysqli_num_rows($resultado)==0)
        {
          echo "<h3>No se encontraron vehiculos para el periodo seleccionado</h3>";
        }
        else{
        while ($fila = mysqli_fetch_array($resultado)){
          //Proceso de cada una de las filas
          
        $output .= '<tr> 
                    <td class="tablestyle">'. $id=$fila["numeroticket"].'</td>
                    <td class="tablestyle">'. $fila["modelo"].'</td>
                    <td class="tablestyle">'. $fila["placa"].'</td>
                    <td class="tablestyle">'. $fila["tipovehiculo"].'</td>
                    <td class="tablestyle">'. $fila['horaentrada'].'</td>
                    <td class="tablestyle">'. $fila['horasalida'].'</td>
                    <td class="tablestyle">'. $m=$fila['monto'].'</td>
                    </tr>';
                    $monto_total= (int)$m + (int)$monto_total; 
                    }

          }
        return $output; 
      // Liberamos los recursos de las consultas	
      mysqli_free_result($resultado);
      // Se cierra la mysqliion
      mysqli_close($mysqli);
        }

        // if (isset($_POST["generate_pdf"])){
         

        //   require_once('tcpdf/tcpdf.php');
        //   $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        //   $obj_pdf->SetCreator(PDF_CREATOR);  
        //   $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
        //   $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        //   $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        //   $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        //   $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        //   $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        //   $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
        //   $obj_pdf->setPrintHeader(false);  
        //   $obj_pdf->setPrintFooter(false);  
        //   $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        //   $obj_pdf->SetFont('helvetica', '', 11);  
        //   $obj_pdf->AddPage();  
        //   $content = '';  
        //   $content .= '  
        //   <table id="myreport" width="774" height="31" border="0" cellpadding="3" cellspacing="1"> 
        //   <tr>
        //   <td width="50" height="25" class="cellcolor">
        //     <span class="Estilo9">Ticket</span>
        //   </td> 
        //   <td width="70" height="25" class="cellcolor">
        //     <span class="Estilo9">Auto</span>
        //   </td> 
        //   <td width="70" class="cellcolor">
        //     <span class="Estilo9">Placa</span>
        //   </td>
        //   <td width="50" class="cellcolor">
        //     <span class="Estilo9">Tipo</span>
        //   </td>
        //   <td width="50" class="cellcolor">
        //     <span class="Estilo9">Hora Entrada</span>
        //   </td>
        //   <td width="50" class="cellcolor">
        //     <span class="Estilo9">Hora Salida</span>
        //   </td>
        //   <td width="80" class="cellcolor">
        //     <span class="Estilo9">Dinero Cancelado</span>
        //   </td>
        //   </tr> 
        //   ';  
        //   $content .= fetch_data($Anual, $Mes);  
       
        //   $content .= '</table>';  
        //   $obj_pdf->writeHTML($content);  
        //   ob_end_clean();
        //   $obj_pdf->Output('file.pdf', 'D'); 
        //   ob_end_flush(); 
        //   }
          
      ?> 
      <table align="center" width="774" height="31" id="myreport" border="0" cellpadding="3" cellspacing="1"> 
      <tr>
      <td width="94" height="25" class="cellcolor">
        <span class="Estilo9">Ticket</span>
      </td> 
      <td width="90" height="25" class="cellcolor">
        <span class="Estilo9">Auto</span>
      </td> 
      <td width="94" class="cellcolor">
        <span class="Estilo9">Placa</span>
      </td>
      <td width="93" class="cellcolor">
        <span class="Estilo9">Tipo</span>
      </td>
      <td width="116" class="cellcolor">
        <span class="Estilo9">Hora Entrada</span>
      </td>
      <td width="102" class="cellcolor">
        <span class="Estilo9">Hora Salida</span>
      </td>
      <td width="135" class="cellcolor">
        <span class="Estilo9">Dinero Cancelado</span>
      </td>
      </tr>
      <?php  
      echo fetch_data($Anual, $Mes);  
      ?> 
    </table>
  <table align="center" width="774" height="31" border="0" cellpadding="3" cellspacing="1" class="cellcolor">
   
          <td>
          <span class="Estilo9">Total Ingreso Dinero....................................................................................................................................Bs. <?php echo $monto_total;?></span>
        </td>
        </table>
  </div>


    <div class="container2">
      <p>&nbsp;</p>
      <input class="btn btn-primary" name="Imprimir" type="submit" class="Estilo2" id="Imprimir" value="Imprimir Reporte to CSV" onClick="download_table_as_csv('myreport');">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button class="btn btn-primary clearfix" name="generate_pdf" style="display:none;" type="hidden" class="Estilo2" id="exportToButton"><span class="fa fa-file-pdf"></span> Export to PDF</button>
        <input type="hidden" name="generate_pdf" class="btn btn-success" value="Generate PDF" onclick="<?php fetch_data($Anual, $Mes); ?>"/>  
      </form>
        <br><br>
        <p><a href="estadisticas.php" class="btn btn-info" role="button">volver</a></strong></p>
    </div>

</div>
</body>
<script type="text/javascript" src="js/csv_report.js"></script>
</html>