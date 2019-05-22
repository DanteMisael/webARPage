<?php
class productosControlador {
    var $cdb = null;
    public function readAll(){
        $query = "SELECT * FROM productos;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    public function consultaProducto($idProducto){
        $query = "SELECT * FROM productos where idProducto == $idProducto;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    function create($idProducto, $Nombre, $Marca, $Precio, $Cantidad, $Categoria){
        $sqlInsert = "INSERT INTO productos(idProducto, Nombre, Marca, Precio, Cantidad, Categoria)"
                 . "    VALUES ('".$idProducto."', '".$Nombre."', '".$Marca."', '".$Precio."', '".$Cantidad."', '".$Categoria."')";
        try {
            $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
            echo 'Error crear un nuevo elemento producto en create(...): '.$pdoException->getMessage();
            exit();
        }
    }
    function delete($id){
      $sqlDelete = "DELETE FROM productos WHERE idProducto = $id";
      try {
        $this->cdb->exec($sqlDelete);
      } catch (PDOException $pdoException) {
        echo 'Error ELIMINAR un nuevo elemento producto en delete(...): '.$pdoException->getMessage();
        exit();
      }
    }

    function search($id){
      $query = "SELECT * FROM productos WHERE idProducto = $id;";
      $statement = $this->cdb->prepare($query);
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
      return $rows;
    }
  }
