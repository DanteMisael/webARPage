<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Número</title>
  </head>
  <body>
    <?php echo "Ingresa el número : "; ?>
    <form action="NumeroCaracteristicas.php" method="POST">
    <table>
      <tr>
        <td> <input type="text" name="num"> <input type="submit" name="btnNum"
          value="Enviar"> <br/>
      </tr>
    </table>
    </form>

    <?php
    //Negativo o no
      if (isset($_REQUEST['btnNum'])){
        $n1=$_REQUEST['num'];
        echo "<h1> El número $n1<?php </h1><br/>";
        echo "<h2></h2>";
        if ($n1 > 0)
          echo "Es positivo.<br/>";
        else {
          echo "Es negativo.<br/>";
        }

        //Es primo
        $cont=0;
        for ($i=1; $i < $n1; $i++) {
          $result = $n1 / $i;
          if (is_integer($result) == true)
            $cont++;
        }
        if ($cont>2)
          echo "No es primo.<br/>";
        else {
          echo "Es primo.<br/>";
        }

        //Es par
        if ($n1 % 2 == 0)
          echo "Es par.<br/>";
        else {
          echo "No es par.<br/>";
        }
        //Fibonacci
        $x = 2;
        $fib = 0;
        while (true) {
          $fib = (($x-1) + ($x-2));
          if ($fib == $n1 || ($n1 > 0 && $n1 <= 2) ){
            echo "Pertenece a la serie Fibonacci.<br/>";
            break;
          }
          elseif ($fib > $n1) {
            echo "No pertenece a la serie Fibonacci.<br/>";
            break;
          }
          $x++;
          $fib=+$n1;
        }

      }  ?>
  </body>
</html>
