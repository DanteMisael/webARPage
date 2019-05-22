<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tablas de multiplicar</title>
  </head>
  <body>
    <?php echo "Ingresa el número : "; ?>
    <form action="TablaMultiplicar.php" method="POST">
    <table>
      <tr>
        <td> <input type="text" name="num"> <input type="submit" name="btnNum"
          value="Enviar"> <br/>
        <input type="submit" name="btnTodos" value="Tabla entera"></td>
      </tr>
    </table>
    </form>
    <!-- Un sólo número-->
    <?php
      if (isset($_REQUEST['btnNum'])){
        $n1=$_REQUEST['num'];
        if ($n1 == "")
          $n1 = 0;
        echo "<p> <font color=blue> TABLA DEL $n1<?php </p>";
        echo "<p> <font color=black></p>";
        for ($i=0; $i <11 ; $i++) {
          echo $n1, " x ", $i, " = ", ($n1 * $i), "<br/>";
        }
      }  ?>
      <!-- Tablas del 1 al 10-->
      <?php
        if (isset($_REQUEST['btnTodos'])){
          for ($i=1; $i <11 ; $i++) {
            echo "<p> <font color=blue> TABLA DEL $i<?php </p>", "<br/>";
            echo "<p> <font color=black></p>";
            for ($t=0; $t <11 ; $t++) {
              echo $i, " x ", $t, " = ", ($i * $t), "<br/>";
            }
          }
        }  ?>
  </body>
</html>
