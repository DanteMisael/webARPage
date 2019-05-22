<?php
class DatabaseConnect {
    public function dbConnectSimple(){
        $dbsystem='mysql';        //Nombre de el tipo de la base de datos
        $host='127.0.0.1';        //localhost o IP de la máquina
        $dbname='practicas';      //Nombre de la base de datos
        $username='root';         //Usuario de la base de datos
        $passwd='My719337915_';   //Contraseña
        return $this->dbConnect($dbsystem, $host, $dbname, $username, $passwd);
    }
    public function dbConnect($dbsystem, $host, $dbname, $username, $passwd){
        $dsn=$dbsystem.':host='.$host.';dbname='.$dbname;
        try {
            $connection = new PDO($dsn, $username, $passwd);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pdoExcetion) {
            $connection = null;
            echo 'Error al establecer la conexión: '.$pdoExcetion;
            exit();
        }
        echo 'Conectado a la base de datos: '.$dbname;
        return $connection;
    }
  }
