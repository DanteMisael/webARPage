<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ABC Peliculas</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="JavaScript" href="js\Funciones.js">
</head>
<body>
  <h2 class="sub-header">ABC Peliculas</h2>

  <button type="button"
  class="btn btn-lg btn-primary"
  data-toggle="modal"
  data-target="#myModal"
  onclick="newMovie()">NUEVO</button>



  <!--Formulario para ingresar nueva pelicula
  Create - Read - Update
  Creamos una ventana Modal que utilizaremos para crear un nuevo idioma, actualizarlo o mostrarlo.
  We create a modal window used to create a new language, update or display.-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Crear nueva pelicula</h4>
        </div>
        <form role="form" name="formCbLanguage" method="post" action="index.php">
          <div class="modal-body">
            <div class="input-group">
              <label for="idlanguage">Identificador</label>
              <input type="text" class="form-control" id="idMovie" name="idMovie" placeholder="1, 2, 3... n" >
              <small class="text-muted">Tiene la función de identificar a la pelicula. Es un número.</small>
            </div>
            <div class="input-group">
              <label for="namelanguage">Nombre</label>
              <input type="text" class="form-control" id="Name" name="Name" placeholder="'La toalla del mojado'" aria-describedby="sizing-addon2">
            </div>
            <div class="input-group">
              <label for="isactive">Duración</label>
              <input type="text" class="form-control" id="DurMin" name="DurMin" placeholder="Duración en minutos" aria-describedby="sizing-addon2">
            </div>
            <div class="input-group">
              <label for="isactive">Género</label>
              <input type="text" class="form-control" id="Genre" name="Genre" placeholder="Género de la pelicula" aria-describedby="sizing-addon2">
              <small class="text-muted">'Say my name'</small>
            </div>
          </div>
          <div class="modal-footer">
            <button id="save-language" name="save-language" type="submit" class="btn btn-primary">Guardar</button>

            <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <?php
  include './database/DatabaseConnect.php';
  include './database/crudControlador.php';

  $dConnect = new DatabaseConnect;
  $cdb = $dConnect->dbConnectSimple();

  ?>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Duración</th>
          <th>Género</th>
        </tr>
      </thead>

      <?php
      $crudControlador = new moviesControlador();
      $crudControlador->cdb = $cdb;

      if (isset($_POST["save-language"]) ) {
        $idMovie  = $_POST['idMovie'];
        $Name     = $_POST['Name'];
        $DurMin   = $_POST['DurMin'];
        $Genre    = $_POST['Genre'];
        $crudControlador->create($idMovie, $Name, $DurMin, $Genre);
      }


      try {
        $query = "SELECT * FROM movies;";
        $statement = $cdb->prepare($query);
        $result = $statement->execute();
        $rows = $crudControlador->readAll();

        echo '<br />';
        foreach ($rows as $row) {
          ?>
          <tr>
            <td><?php print($row->idMovie); ?></td>
            <td><?php print($row->Name); ?></td>
            <td><?php print($row->DurMin); ?></td>
            <td><?php print($row->Genre); ?></td>
          </tr>
          <?php
        }
      } catch (Exception $exception) {
        echo 'Error hacer la consulta: ' . $exception;
      }
      ?>
      ?>
    </table>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="assets/js/vendor/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
