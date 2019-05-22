<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animales</title>
  </head>
  <body>
    <form action="Animales.php" method="POST">
    <table>
      <tr>
        <td><input type="radio" name="animal" value="Perro">Perro
            <input type="radio" name="animal" value="Gato">Gato
            <input type="radio" name="animal" value="Pajaro">Pajaro </br>
            <input type="submit" name="hablar">
        </td>
      </tr>
    </table>
    </form>

    <?php
    class animal{
        public function hablar(){
        }
    }
    class perro extends animal{
        public function hablar(){
            echo 'guau';
        }
    }
    class gato extends animal{
        public function hablar(){
            echo 'miau';
        }
    }
    class pajaro extends animal{
        public function hablar(){
            echo 'pio pio';
        }
    }
    class usuario{
        private $animal;
        function __construct($objeto){
            $this->animal=$objeto;
        }
        public function habla(){
            $this->animal->hablar();
        }
    }
    if(isset($_REQUEST['hablar'])){
      $animal = $_REQUEST['animal'];
      $usuario = new usuario(new $animal);
      $usuario->habla();
    }
    ?>

  </body>
</html>
