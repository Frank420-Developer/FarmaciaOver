<?php
  class ConexionPDO{
    Protected $servername;
    Protected $username;
    Protected $password;
    Protected $dbname;
    Protected $conexion;

    function __construct(){
       //------ASIGNAMOS LOS VALORES A LAS VARIABLES PARA REALIZAR CONEXION PDO A LA BASE DE DATOS----//
        $this->servername = 'localhost';
        $this->username = 'Francisco Vera';
        $this->password = '';
        $this->dbname = 'farmacia over';
    }

    function conectar(){
        try {
            $this->conexion =new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            write_log('Conexion Exitosa!');
        } catch (PDOException $e) {
            write_log('Conexion a la BD fallida. \nERROR: ' . $e->getMessage());
        }   
    }

    function desconectar(){
        write_log('Se ha desconectado de la BD');
        $this->conexion = null;
    }
  }
    // class MySQL_Object{
    //     /* ...:: PROPIEDADES ::... */
    //     Protected $servername;
    //     Protected $username;
    //     Protected $password;
    //     Protected $dbname;
    //     Protected $conexion;
    
    //     /* ...:: MÉTODOS ::... */
    //     // Constructor
    //     function __construct() {
    //       $this->servername = "localhost";   // Colocar aquí el nombre del servidor
    //       $this->username = "Francisco Vera";     // Colocar aquí el nombre del usuario (De la base de datos)
    //       $this->password = "";     // Colocar aquí la contraseña del usuario (De la base de datos)
    //       $this->dbname = "farmacia over";
    //     }
    //     // Conectar a la BD
    //     function conectar() {
    //       $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    //       // Check connection
    //       if ($this->conn->connect_error) {
    //         write_log("ERROR al conectar a la BD: '" . $this->conn->connect_error ."'");
    //         die("Connection failed: " . $this->conn->connect_error);
    //       }else{
    //           write_log('conexion exitosa');
    //       }
    //     }
    //     // Desconectar de la BD
    //     function desconectar(){
    //       write_log('se desconecto de la bd');
    //       $this->conn->close();
    //     }
    //   }
 
?>