<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Productos</title>
  <link rel="stylesheet" href="css/master.css">
  <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="assets/js/ie-emulation-modes-warning.js"></script>

  <?php
  include 'conector.php';
  include 'crudControlador.php';

  $dConnect = new DatabaseConnect;
  $cdb = $dConnect->dbConnectSimple();

  ?>
</head>
<body>
  <section class="cabecera" style="background-color: blue;">
    <p> <hr> </p>
  </section>


  <center>
    <h1>ABC Productos</h1>
    <form class="datos" action="index.php" method="post">
      <!-- Datos-->
      <input type="text" name="idProducto" placeholder="Id Producto" size="35"> </br>
      <input type="text" name="Nombre" placeholder="Nombre" size="35"></br>
      <input type="text" name="Marca" placeholder="Marca" size="35"></br>
      <input type="text" name="Precio" placeholder="Precio" size="35"></br>
      <input type="text" name="Cantidad" placeholder="Cantidad" size="35"></br>
      <input type="text" name="Categoria" placeholder="Categoría" size="35"></br>
      <!-- Botones accion-->
      <input type="submit" name="btnRegistrar" value="Registrar">
      <input type="submit" name="btnEliminar" value="Elimar">
      <input type="submit" name="btnConsulta" value="Consulta">
      <input type="submit" name="btnActualizar" value="Actualizar"><br>

    </form>
    <hr>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoría</th>
          </tr>
        </thead>
        <?php
        $crudControlador = new productosControlador();
        $crudControlador->cdb = $cdb;

        if (isset($_POST["btnRegistrar"]) ) {
          $idProducto = $_POST['idProducto'];
          $Nombre     = $_POST['Nombre'];
          $Marca   = $_POST['Marca'];
          $Precio    = $_POST['Precio'];
          $Cantidad = $_POST['Cantidad'];
          $Categoria = $_POST['Categoria'];
          $crudControlador->create($idProducto, $Nombre, $Marca, $Precio, $Cantidad, $Categoria);
        }
        if (isset($_POST["btnEliminar"]) ) {
          $idProducto = $_POST['idProducto'];
          $crudControlador->delete($idProducto);
        }
        try {
          $query = "SELECT * FROM productos;";
          $statement = $cdb->prepare($query);
          $result = $statement->execute();
          $rows = $crudControlador->readAll();
          if (isset($_POST["btnConsulta"]) ) { //Si la consulta es 1 producto
            $id = $_POST['idProducto'];
            if ($id != ""){
              $rows = $crudControlador->search($id);
              if ($rows == null){
                echo "No se encontró el producto con el id = $id";
              }}

          }


          echo '<br />';
          foreach ($rows as $row) {
            ?>
            <tr>
              <td><?php print($row->idProducto); ?></td>
              <td><?php print($row->Nombre); ?></td>
              <td><?php print($row->Marca); ?></td>
              <td><?php print($row->Precio); ?></td>
              <td><?php print($row->Cantidad); ?></td>
              <td><?php print($row->Categoria); ?></td>
            </tr>
            <?php
          }
        } catch (Exception $exception) {
          echo 'Error hacer la consulta: ' . $exception;
        }
        ?>
      </table>
    </center>
  </body>
  </html>
