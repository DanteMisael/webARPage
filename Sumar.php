<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Suma</title>
  </head>
  <body>
    <?php echo "Ingresa un número: "; ?>
    <form action="Sumar.php" method="POST">
    <table>
      <tr>
        <td> <input type="text" name="num1"> <input type="text" name="num2">  <input type="submit" name="sumar" value="Enviar"></td>
      </tr>
    </table>
    </form>
    <?php
      if (isset($_REQUEST['sumar'])){
        $div=0;
        $n1=$_REQUEST['num1'];
        $n2=$_REQUEST['num2'];
        if ($n1 == "")
          $n1 = 0;
        if ($n2 == "")
          $n2 = 0;
        $suma = $n1 + $n2;
        $resta= $n1 - $n2;
        if ($n2 != 0)
          $div = $n1 / $n2;
        $mul =$n1 * $n2;
        echo "La suma es: ",$suma, "<br/>";
        echo "La resta es: ",$resta, "<br/>";
        echo "La división es: ", $div, "<br/>";
        echo "La multiplicación es: ", $mul;
      }  ?>
  </body>
</html>
