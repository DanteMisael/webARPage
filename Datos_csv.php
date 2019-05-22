<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saludo</title>
  </head>
  <body>
    <form action="Datos_csv.php" method="POST">
    <table>
      <tr>
        <td>Ingresa tu nombre: <input type="text" name="nombre"> <br/>
          Ingresa tu número de celular: <input type="text" name="numero"> <br/>
            Ingresa tu correo electronico: <input type="text" name="correo"> <br/>
              Ingresa tu otro dato: <input type="text" name="otro"> <br/>
          <input type="sub  mit" name="enviar" value="Enviar"></td>
      </tr>s
    </table>
    </form>


    <?php
      if (isset($_REQUEST['enviar'])){
        $archivo=fopen("Datos_csv.csv",'a+');
        echo "Se están guardando los datos... ";
        $datos=[$_REQUEST['nombre'], $_REQUEST['numero'], $_REQUEST['correo'], $_REQUEST['otro']];
        fputcsv($archivo, $datos);
        echo "Se han guardado los datos.";
      }  ?>
  </body>
</html>
