<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saludo</title>
  </head>
  <body>
    <?php echo "CALCULADORA DE MATRICES"; ?>
    <form action="Saludo.php" method="POST">
    <table>
      <tr>
        <td> M1 <input type="text" name="matriz11"> + <input type="text" name="matriz12"> <br/>
          M2 <input type="text" name="matriz21"> + <input type="text" name="matriz22"> <br/>
          <input type="submit" name="nombre" value="Enviar">
          <select name="Operaciones">
            <option value="">Suma</option>
            <option value="">Resta</option>
            <option value="">Multiplicación</option>
            <option value="">Divisón</option>
          </select>
        </td>
      </tr>
    </table>
    </form>


    </form>
    <?php
      if (isset($_REQUEST['nombre'])){
        echo "<form method=""POST""> <INPUT name=""Uno""> </form>";
        $n1=$_REQUEST['num1'];
        echo $n1;
      }  ?>
  </body>
</html>
