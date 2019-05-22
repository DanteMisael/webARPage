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
			if(isset($_POST['input'])){
				$Nombre	= mysqli_real_escape_string($Conector,(strip_tags($_POST['Nombre'], ENT_QUOTES)));
				$DurMin  	= mysqli_real_escape_string($Conector,(strip_tags($_POST['DurMin'], ENT_QUOTES)));
				$Genres 		= mysqli_real_escape_string($Conector,(strip_tags($_POST['Genre'], ENT_QUOTES)));

				$insert = mysqli_query($Conector, "INSERT INTO movies(idMovie, Nombre, DurMin, Genre)
															VALUES(NULL,'$Nombre', '$DurMiN', '$Genre')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}

			}
			?>

            <blockquote>
            Agregar peliculas
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="nombres">Nombre</label>
											<div class="controls">
												<input type="text" name="Nombre" id="Nombre" placeholder="Nombres de la pelcia" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="DurMin">Duración</label>
											<div class="controls">
												<input type="text" name="DurMin" id="DurMin" placeholder="Teléfono del minuto" class="form-control span8 tip" required>
											</div>
										</div>

                    <div class="control-group">
											<label class="control-label" for="Genre">Duración</label>
											<div class="controls">
												<input type="text" name="Genre" id="Genre" placeholder="Género" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
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

    </body>
