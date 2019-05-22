<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animales</title>
  </head>
  <body>
    <form action="Figuras1.php" method="POST">
    <table>
      <tr>
        <td><input type="radio" name="Figura" value="Cuadro">Cuadro
            <input type="radio" name="Figura" value="Triangulo">Triangulo
            <input type="radio" name="Figura" value="Circulo">Circulo </br>
            <input type="submit" name="Mostrar">
        </td>
      </tr>
    </table>
    </form>

    <?php
    class Figuras{
        public function Forma(){
        }
    }
    class Cuadro extends Figuras{
        public function Forma(){
            echo "<img src='Figuras\Cuadro.jpg'>";
        }
    }
    class Triangulo extends Figuras{
        public function Forma(){
            echo "<img src='Figuras\Triangulo.jpg'>";
        }
    }
    class Circulo extends Figuras{
        public function Forma(){
            echo "<img src='Figuras\Circulo.png'>";
        }
    }
    class usuario{
        private $figura;
        function __construct($objeto){
            $this->figura=$objeto;
        }
        public function Forma(){
            $this->figura->forma();
        }
    }
    if(isset($_REQUEST['Mostrar'])){
      $figura = $_REQUEST['Figura'];
      $usuario = new usuario(new $figura);
      $usuario->Forma();
    }
    ?>

  </body>
</html>
