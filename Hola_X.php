<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saludo</title>
  </head>
  <body>
    <?php echo "Ingresa tu nombre: "; ?>
    <form action="Hola_X.php" method="POST">
    <table>
      <tr>
        <td> <input type="text" name="nombre"> </td>
      </tr>
    </table>
    </form>
    <?php
    function saludar(){
      echo "Hola ";
      if($_POST){
        $saludos = $_POST['nombre'];
        echo $saludos;
      }} saludar()?>
  </body>
</html>
