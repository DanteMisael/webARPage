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
           $idMovie = intval($_GET['idMovie']);
			$sql = mysqli_query($Conector, "SELECT * FROM practicas WHERE idMovie='$idMovie'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

            <blockquote>
            Actualizar datos del cliente
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="idMovie" id="idMovie" value="<?php echo $row['idMovie']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre</label>
											<div class="controls">
												<input type="text" name="Nombre" id="Nombre" value="<?php echo $row['Nombre']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Duración</label>
											<div class="controls">
												<input type="text" name="DurMin" id="DurMin" value="<?php echo $row['DurMin']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Género</label>
											<div class="controls">
												<input name="Genre" id="Genre" value="<?php echo $row['Genre']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>

                                        <div class="control-group">
											<label class="control-label" for="basicinput">Registrado</label>
											<div class="controls">
												<input name="notelp" id="notelp" value="<?php echo $row['registrado']; ?>" class=" form-control span8 tip" type="text" disabled  />
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
