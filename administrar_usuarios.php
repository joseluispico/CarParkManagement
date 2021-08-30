<?php 
// Include config file
require_once "config.php";
include ("seguridad.php");
include ("banner.php");
include ("menu.php");



?>
<script type='text/javascript'>
	document.oncontextmenu = function(){return false}
    </script>
   
      <style>
        thead input {
        width: 100%;
    }
      </style>
     	
      

<br>
<br>
<br>
<div class ="container">
    <!--<table class ="mx-auto my-auto" width="774" height="31" border="0" cellpadding="3" cellspacing="1"> -->
<div class="row">
    <div class="col-lg-12">
    <div class="table-responsive">
	<table class ="table table-striped table-bordered" id="data" class="display" style="width:100%" cellspacing="0">
	<thead>
      <tr>
        <th class="cellcolor"><span>ID</span></th> 
        <th class="cellcolor"><span>Nombre</span></th> 
        <th class="cellcolor"><span>Apellido</span></th>
        <th class="cellcolor"><span>Tipo Usuario</span></th>
        <th class="cellcolor"><span>Status</span></th> 
        <th class="cellcolor"><span>Action</span></th> 
    </tr> 
	</thead>
    <tbody>
<?php
//include "registro_usuario.php";

//Preparaci�n y ejecuci�n de la consulta
$consulta = "SELECT * FROM usuarios";
$resultado = mysqli_query($mysqli, $consulta);
if(mysqli_num_rows($resultado) > 0)
{
//Recorrido del cursor de fila en fila
while ($fila = mysqli_fetch_array($resultado)){
   //Proceso de cada una de las filas
   $status = ($fila['status'])?"Active":"Inactive";
   echo "<tr align='center'>"; 
   echo "<td class='tablestyle'>". $fila['id']. "</td>";
   echo "<td class='tablestyle'>". $fila['nombre']. "</td>";
   echo "<td class='tablestyle'>". $fila['apellido']. "</td>";
   echo "<td class='tablestyle'>". $fila['tipousuario']. "</td>";
   echo "<td class='tablestyle'>". $status. "</td>";
   echo "<td class='tablestyle'><a href='eliminar.php?id=".$fila['id']."'>Delete</a></td>";
   echo "</tr>\n";
    
   }

} else
{

    echo '<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">Empty Registers</td></tr>';

}

// Liberamos los recursos de las consultas	
mysqli_free_result($resultado); 
// Se cierra la conexi�n
mysqli_close($mysqli); 
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<br>

	<div class="container2">
	<input class="btn btn-primary"  name="Registrar" type="button" class="Estilo2" id="Registrar" value="Registrar Cuenta" onClick="location.href='registrousuario.php'">
	<input class="btn btn-secondary"  name="Borrar" type="hidden" class="Estilo2" id="Borrar" value="Eliminar usuario" onClick="location.href='eliminar.php'"></p></td>
	</div>   
		
	<script type="text/javascript">
$(document).ready(function() {

    $('#data').DataTable( {
		responsive: "true",
        dom:'Bfrtilp',
        pageLength: 10,
        orderCellsTop: true,
        fixedHeader: true,
        buttons:[
            {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i>',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success'
        }, 
        {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i>',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger'
        }, 
        {
            extend:    'print',
            text:      '<i class="fas fa-print"></i>',
            titleAttr: 'Imprimir',
            className: 'btn btn-info'
        }, 
        
        ]
    } );
//    // Setup - add a text input to each footer cell
//     $('#data thead tr').clone(true).appendTo( '#data thead' );
//     $('#data thead tr:eq(1) th').each( function (i) {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
//         $( 'input', this ).on( 'keyup change', function () {
//             if ( table.column(i).search() !== this.value ) {
//                 table
//                     .column(i)
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );
 
  
} );
</script>
</body>
</html>
