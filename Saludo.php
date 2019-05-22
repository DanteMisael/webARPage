<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saludo</title>
  </head>
  <body>
    <?php echo "Ingresa tu nombre: "; ?>
    <form action="Saludo.php" method="POST">
    <table>
      <tr>
        <td> <input type="text" name="num1"> <input type="submit" name="nombre" value="Enviar"></td>
      </tr>
    </table>
    </form>
    <?php
      echo "Hola ";
      if (isset($_REQUEST['nombre'])){
        $n1=$_REQUEST['num1'];
        echo $n1;
      }  ?>
  </body>
</html>