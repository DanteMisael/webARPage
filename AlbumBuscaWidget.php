<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- 1. Link to jQuery (1.8 or later), -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->


  <!-- fotorama.css & fotorama.js. -->
  <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <meta charset="utf-8">
  <title>Implementando utilidades</title>
  <link rel="stylesheet" href="practica5.css">
  <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
</head>
<body>

    <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="txtNombreCiudad">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnCiudad">Search</button>
      </form>

    <section class="WidgetClima">
      <?php
      if (isset($_REQUEST['btnCiudad'])) {
        $ciudad = $_REQUEST['txtNombreCiudad'];
        if ($ciudad == 'Los Mochis'){
          echo '<a target="_blank" href="https://hotelmix.es/weather/los-mochis-2063">
              <img src="https://w.bookcdn.com/weather/picture/32_2063_1_4_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=582&anc_id=79123" alt="booked.net"/></a>';
        }
      }
      ?>
    </section>

    <!-- Galeria -->
    <div class="content fotorama">
      <img src="Imagenes2\3.png">
        <img src="Imagenes2\1.png">
        <img src="Imagenes\10.jpg">
        <img src="Imagenes2\4.png">
        <img src="Imagenes2\5.jpg">
        <img src="Imagenes\8.png">
        <img src="Imagenes\9.jpg">
    </div>

    </div>

  </body>

  </html>
