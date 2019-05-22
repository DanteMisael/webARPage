<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saludo</title>
  </head>
  <body>
    <?php echo "Ingresa tu nombre: "; ?>
    <form class="" action="Hola_X.php" method="post">
    <table>
      <tr>
        <td> <input type="text" name="nombre"> </td>
      </tr>
    </table>
    </form>
    <?php echo "Hola ";
      if($_post){
        $this = $_post('texto');
        echo = $this;
      }?>
  </body>
</html>
