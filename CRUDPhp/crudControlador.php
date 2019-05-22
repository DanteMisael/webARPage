<?php
class moviesControlador {
    var $cdb = null;
    public function readAll(){
        $query = "SELECT * FROM movies;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    public function consultaPelicula($idMovie){
        $query = "SELECT * FROM movies where idMovie == $idMovie;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;
    }

    function create($idMovie, $Name, $DurMin, $Genre){
        $sqlInsert = "INSERT INTO movies(idMovie, Name, Genre, DurMin)"
                 . "    VALUES ('".$idMovie."', '".$Name."', '".$Genre."', '".$DurMin."')";
        try {
            $this->cdb->exec($sqlInsert);
        } catch (PDOException $pdoException) {
            echo 'Error crear un nuevo elemento movie en create(...): '.$pdoException->getMessage();
            exit();
        }
    }
  }
