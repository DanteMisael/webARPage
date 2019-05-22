<?php
include "Conector.php";
if(isset($_POST['update'])){
				$idMovie			= intval($_POST['idMovies']);
				$Nombre	= mysqli_real_escape_string($Conector,(strip_tags($_POST['Nombre'], ENT_QUOTES)));
				$DurMin  	= mysqli_real_escape_string($Conector,(strip_tags($_POST['DurMin'], ENT_QUOTES)));
				$Genre 		= mysqli_real_escape_string($Conector,(strip_tags($_POST['Genre'], ENT_QUOTES)));


				$update = mysqli_query($Conector, "UPDATE movies SET nombres='$Nombre', telefono='$DurMin', email='$Genre' WHERE idMovie='$idMovie'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
  ?>
