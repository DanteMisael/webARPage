<?php include "Conector.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>


                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
             if(isset($_GET['action']) == 'delete'){
				$id_delete = intval($_GET['id']);
				$query = mysqli_query($Conector, "SELECT * FROM practicas WHERE id='$idMovie'");
				if(mysqli_num_rows($query) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($Conector, "DELETE FROM practicas WHERE id='$idMovie'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-user"></i> DataTables procesando datos del lado del servidor</h3>

                        </div>

                        <div class="panel-body">
							<div class="pull-right">
								<a href="registro.php" class="btn btn-sm btn-primary">Nuevo cliente</a>
							</div><br>
							<hr>
                                    <table id="lookup" class="table table-bordered table-hover">
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>

                                        <th>ID</th>
	                                    <th>Nombres </th>
                                        <th>Duración </th>
                                        <th>Genero</th>
	                                    <th class="text-center"> Acciones </th>

                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->

        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href="http://obedalvarado.pw/"> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
            </div>
        </div>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {

				 "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},

					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");

						}
					}
				} );
			} );
        </script>


        <?php

         include "Conector.php";

        // storing  request (ie, get/post) global array to a variable
        $requestData= $_REQUEST;


        $columns = array(
        // datatable column index  => database column name
        	0 => 'idMovie',
            1 => 'Nombre',
        	2 => 'DurMin',
        	3 => 'Genre'
        );


        $sql = "SELECT idMovie, Nombre, DurMin, Genre";
        $sql.=" FROM practicas";
        $query=mysqli_query($Conector, $sql) or die("ajax-grid-data.php: get InventoryItems");
        $totalData = mysqli_num_rows($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


        if( !empty($requestData['search']['value']) ) {
        	// if there is a search parameter
        	$sql = "SELECT idMovie, Nombre, DurMin, Genre";
        	$sql.=" FROM practicas";
        	$sql.=" WHERE Nombre LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
        	$sql.=" OR DurMin LIKE '".$requestData['search']['value']."%' ";
        	$sql.=" OR Genre LIKE '".$requestData['search']['value']."%' ";
        	$query=mysqli_query($Conector, $sql) or die("ajax-grid-data.php: get PO");
        	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query

        	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
        	$query=mysqli_query($Conector, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

        } else {

        	$sql = "SELECT idMovie, Nombre, DurMin, Genre";
        	$sql.=" FROM practicas";
        	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        	$query=mysqli_query($Conector, $sql) or die("ajax-grid-data.php: get PO");

        }

        $data = array();
        while( $row=mysqli_fetch_array($query) ) {  // preparing an array
        	$nestedData=array();

        	$nestedData[] = $row["idMovie"];
            $nestedData[] = $row["Nombre"];
        	$nestedData[] = $row["DurMin"];
        	$nestedData[] = $row["Genre"];
            $nestedData[] = '<td><center>
                             <a href="editar.php?id='.$row['id'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="menu-icon icon-pencil"></i> </a>
                             <a href="index.php?action=delete&id='.$row['id'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
        				     </center></td>';

        	$data[] = $nestedData;

        }



        $json_data = array(
        			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
        			"recordsTotal"    => intval( $totalData ),  // total number of records
        			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
        			"data"            => $data   // total data array
        			);

        echo json_encode($json_data);  // send data as json format

        ?>
    </body>
</html>
